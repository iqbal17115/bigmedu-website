<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\QuickLink;

class QuickLinksController extends Controller
{
    //
    public function index()
    {
        $data['quickLinks'] = QuickLink::all();
        return view('backend.quick_links.quick_links-list')->with($data);
    }

    public function addQuickLinks()
    {
        return view('backend.quick_links.quick_links-add');
    }

    public function storeQuickLinks(Request $request)
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


    	QuickLink::create($params);
    	return redirect()->route('footer-menu.quick.links')->with('info','New Quick Link add Successfully.');
    }

    public function editQuickLinks($id)
    {
        $data['editData'] = QuickLink::find($id);
    	return view('backend.quick_links.quick_links-add')->with($data);
    }

    public function updateQuickLinks(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = QuickLink::find($id);
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

    	return redirect()->route('footer-menu.quick.links')->with('info','Quick Link Update Successfully');
    }

    public function deleteQuickLinks(Request $request)
    {
        $data = QuickLink::find($request->id);
    	$data->delete();
    }
}
