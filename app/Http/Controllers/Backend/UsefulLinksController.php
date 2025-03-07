<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UsefulLink;

class UsefulLinksController extends Controller
{
    //
    public function index()
    {
        $data['usefulLinks'] = UsefulLink::all();
        return view('backend.useful_links.list')->with($data);
    }

    public function addUsefulLinks()
    {
        return view('backend.useful_links.add');
    }

    public function storeUsefulLinks(Request $request)
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


    	UsefulLink::create($params);
    	return redirect()->route('footer-menu.useful.links')->with('info','New Useful Link add Successfully.');
    }

    public function editUsefulLinks($id)
    {
        $data['editData'] = UsefulLink::find($id);
    	return view('backend.useful_links.add')->with($data);
    }

    public function updateUsefulLinks(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = UsefulLink::find($id);
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

    	return redirect()->route('footer-menu.useful.links')->with('info','Useful Link Update Successfully');
    }

    public function deleteUsefulLinks(Request $request)
    {
        $data = UsefulLink::find($request->id);
    	$data->delete();
    }
}
