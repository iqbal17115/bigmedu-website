<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoverningBody;
use App\Model\Member;

class GoverningBodyController extends Controller
{
    public function frontend()
    {
        $data['all'] = GoverningBody::with('member')->orderBy('sort_order','ASC')->get();
        return view('frontend.all-governing-body')->with($data);
    }

    public function list()
    {
        $data['governingBodies'] = GoverningBody::with('member')->orderBy('sort_order','ASC')->get();
        //dd($data['trustees']);
        return view('backend.governing_body.governing_body-list')->with($data);
    }

    public function add()
    {
        $data['editData'] = NULL;
        $data['members'] = Member::all();
        return view('backend.governing_body.governing_body-add')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
    		'designation' => 'required',
        ]);
        
        $params = $request->all();

        $memberCheck = GoverningBody::where('member_id',$request->member_id)->first();
        if($memberCheck)
        {
            return redirect()->back()->with('error','This member already exists in the list');
        }

        $member = GoverningBody::create($params);
        
    	return redirect()->route('governing_body.list')->with('info','Governing Body Information add Successfully.');
    }

    public function edit($id)
    {
        $data['members'] = Member::all();
        $data['editData'] = GoverningBody::find($id);
    	return view('backend.governing_body.governing_body-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => 'required',
        ]);

        $memberCheck = GoverningBody::where('member_id',$request->member_id)->where('id','!=',$id)->first();
        if($memberCheck)
        {
            return redirect()->back()->with('error','This member already exists in the list.');
        }

    	$data = GoverningBody::find($id);
        $params = $request->except(['_token']);
        $data->update($params);

    	return redirect()->route('governing_body.list')->with('info','Governing Body Information Update Successfully');
    }

    public function destroy(Request $request)
    {
        $data = GoverningBody::find($request->id);
        @unlink(public_path('upload/governing_body/'.$data->image));
    	$data->delete();
    }
}
