<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ForStudent;

class ForStudentsController extends Controller
{
    //
    public function index()
    {
        $data['forStudents'] = ForStudent::all();
        return view('backend.for_students.for_students-list')->with($data);
    }

    public function addForStudents()
    {
        return view('backend.for_students.for_students-add');
    }

    public function storeForStudents(Request $request)
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

    	ForStudent::create($params);
    	return redirect()->route('footer-menu.for.students')->with('info','New For Student add Successfully.');
    }

    public function editForStudents($id)
    {
        $data['editData'] = ForStudent::find($id);
    	return view('backend.for_students.for_students-add')->with($data);
    }

    public function updateForStudents(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = ForStudent::find($id);
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

    	return redirect()->route('footer-menu.for.students')->with('info','For Student Update Successfully');
    }

    public function deleteForStudents(Request $request)
    {
        $data = ForStudent::find($request->id);
    	$data->delete();
    }
}
