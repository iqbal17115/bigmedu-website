<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GetInTouch;

class GetInTouchController extends Controller
{
    //
    public function index()
    {
        $data['getInTouches'] = GetInTouch::all();
        return view('backend.get_in_touch.get_in_touch-list')->with($data);
    }

    public function addGetInTouch()
    {
        return view('backend.get_in_touch.get_in_touch-add');
    }

    public function storeGetInTouch(Request $request)
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

    	GetInTouch::create($params);
    	return redirect()->route('footer-menu.get.in.touch')->with('info','New Get in Touch add Successfully.');
    }

    public function editGetInTouch($id)
    {
        $data['editData'] = GetInTouch::find($id);
    	return view('backend.get_in_touch.get_in_touch-add')->with($data);
    }

    public function updateGetInTouch(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = GetInTouch::find($id);
        $params = $request->all();
        
        if($request->url_link =='#'){
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

    	return redirect()->route('footer-menu.get.in.touch')->with('info','Get in Touch Update Successfully');
    }

    public function deleteGetInTouch(Request $request)
    {
        $data = GetInTouch::find($request->id);
    	$data->delete();
    }
}
