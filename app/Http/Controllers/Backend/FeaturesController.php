<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Feature;
use Image;

class FeaturesController extends Controller
{
    public function index()
    {
        $data['features'] = Feature::orderBy('sort_order','asc')->get();
        return view('backend.features.features-list')->with($data);
    }

    public function addFeatures()
    {
        return view('backend.features.features-add');
    }

    public function storeFeatures(Request $request)
    {
        $request->validate([
    		'title' => 'required',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/features'), $filename);
            $image=Image::make(public_path('upload/features/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            $image->save(public_path('upload/features/').$filename);
            $params['image']= $filename;
        }

        if($request->feature_url =='#'){
            $params['feature_url'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->feature_url;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['feature_url'] = $imgName;
        }else{
            $params['feature_url'] = $request->feature_url;
        }
        $params['url_link_type'] = $request->url_link_type;


        Feature::create($params);
        
    	return redirect()->route('site-setting.features')->with('info','New Feature add Successfully.');
    }

    public function editFeatures($id)
    {
        $data['editData'] = Feature::find($id);
    	return view('backend.features.features-add')->with($data);
    }

    public function updateFeatures(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = Feature::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/features/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/features'), $filename);
            $image=Image::make(public_path('upload/features/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            $image->save(public_path('upload/features/').$filename);
            $params['image']= $filename;
        }

        if($request->feature_url =='#'){
            $params['feature_url'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->feature_url;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['feature_url'] = $imgName;
        }else{
            $params['feature_url'] = $request->feature_url;
        }
        $params['url_link_type'] = $request->url_link_type;

    	$data->update($params);

    	return redirect()->route('site-setting.features')->with('info','Feature Update Successfully');
    }

    public function deleteFeatures(Request $request)
    {
        $data = Feature::find($request->id);
        @unlink(public_path('upload/features/'.$data->image));
    	$data->delete();
    }

}
