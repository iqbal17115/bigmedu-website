<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TrainingEnroll;
use App\Model\TrainingBackground;
use Image;

class TrainingEnrollController extends Controller
{
    public function index()
    {
        $data['trainingEnrolls'] = TrainingEnroll::orderBy('sort_order','asc')->get();
        return view('backend.training_enroll.training_enroll-list')->with($data);
    }

    public function addTrainingEnroll()
    {
        return view('backend.training_enroll.training_enroll-add');
    }

    public function storeTrainingEnroll(Request $request)
    {
        $request->validate([
    		'title' => 'required',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/training_enroll'), $filename);
            //$image=Image::make(public_path('upload/training_enroll/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            // $image->save(public_path('upload/training_enroll/').$filename);
            $params['image']= $filename;
        }

        if($request->training_url =='#'){
            $params['training_url'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->training_url;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['training_url'] = $imgName;
        }else{
            $params['training_url'] = $request->training_url;
        }
        $params['url_link_type'] = $request->url_link_type;

        TrainingEnroll::create($params);
        
    	return redirect()->route('site-setting.training_enroll')->with('info','New Training and Enroll add Successfully.');
    }

    public function editTrainingEnroll($id)
    {
        $data['editData'] = TrainingEnroll::find($id);
    	return view('backend.training_enroll.training_enroll-add')->with($data);
    }

    public function updateTrainingEnroll(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = TrainingEnroll::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/training_enroll/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/training_enroll'), $filename);
            // $image=Image::make(public_path('upload/training_enroll/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            // $image->save(public_path('upload/training_enroll/').$filename);
            $params['image']= $filename;
        }

        if($request->training_url =='#'){
            $params['training_url'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->training_url;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['training_url'] = $imgName;
        }else{
            $params['training_url'] = $request->training_url;
        }
        $params['url_link_type'] = $request->url_link_type;

    	$data->update($params);

    	return redirect()->route('site-setting.training_enroll')->with('info','Training and Enroll Update Successfully');
    }

    public function deleteTrainingEnroll(Request $request)
    {
        $data = TrainingEnroll::find($request->id);
        @unlink(public_path('upload/training_enroll/'.$data->image));
    	$data->delete();
    }

    public function storeTrainingBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = TrainingBackground::first();
        $params = $request->all();
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/training_enroll/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/training_enroll'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            TrainingBackground::create($params);
        }
        
        return redirect()->route('site-setting.training_enroll')->with('info','Background image set successfully.');
    }

}
