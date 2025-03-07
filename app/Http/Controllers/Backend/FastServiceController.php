<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FastService;

class FastServiceController extends Controller
{
    //
    public function index()
    {
        $data['fastServices'] = FastService::all();
        return view('backend.fast_service.fast_service-list')->with($data);
    }

    public function addFastService()
    {
        return view('backend.fast_service.fast_service-add');
    }

    public function storeFastService(Request $request)
    {
        $request->validate([
    		'title' => 'required',
    	]);
        $params = $request->all();
        
        if($request->link =='#'){
            $params['link'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->link;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['link'] = $imgName;
        }else{
            $params['link'] = $request->link;
        }
        $params['url_link_type'] = $request->url_link_type;

    	FastService::create($params);
    	return redirect()->route('footer-menu.fast.service')->with('info','New Fast Service add Successfully.');
    }

    public function editFastService($id)
    {
        $data['editData'] = FastService::find($id);
    	return view('backend.fast_service.fast_service-add')->with($data);
    }

    public function updateFastService(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = FastService::find($id);
        $params = $request->all();
        
        if($request->link =='#'){
            $params['link'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->link;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['link'] = $imgName;
        }else{
            $params['link'] = $request->link;
        }
        $params['url_link_type'] = $request->url_link_type;
        
    	$data->update($params);

    	return redirect()->route('footer-menu.fast.service')->with('info','Fast Service Update Successfully');
    }

    public function deleteFastService(Request $request)
    {
        $data = FastService::find($request->id);
    	$data->delete();
    }
}
