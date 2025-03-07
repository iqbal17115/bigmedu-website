<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TeacherAdvisor;
use App\Model\Member;

class AdvisorController extends Controller
{
    //
    public function index()
    {
    	// dd('test');
    	$data['advisor'] = TeacherAdvisor::with('member')->orderBy('sort_order')->get();
        // return response()->json($data);
    	return view('backend.advisor.advisor-view')->with($data);
    }

    public function addAdvisor()
    {
		$data['editData'] = NULL;
        $data['members'] = Member::all();
    	return view('backend.advisor.advisor-add')->with($data);
    }

    public function storeAdvisor(Request $request)
    {
    	$request->validate([
    		'member_id' => 'required',
    	]);
    	$params = $request->all();
    	TeacherAdvisor::create($params);
    	return redirect()->route('site-setting.advisor')->with('info','New advisor Upload Successfully.');


    }

    public function editAdvisor($id)
    {
        $data['members'] = Member::all();
    	$data['editData'] = TeacherAdvisor::find($id);
    	return view('backend.advisor.advisor-add')->with($data);
    }

    public function updateAdvisor(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required',
            // 'image' => 'required',

        ]);
    	$data = TeacherAdvisor::find($id);
    	$params = $request->all();
    	$data->update($params);

    	return redirect()->route('site-setting.advisor')->with('info','advisor Update Successfully');

    }

    public function deleteAdvisor(Request $request)
    {
    	$data = TeacherAdvisor::find($request->id);
    	$data->delete();
    	
    }

}
