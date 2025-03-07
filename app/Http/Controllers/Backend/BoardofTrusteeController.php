<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BoardofTrustee;
use App\Model\Member;
use Image;

class BoardofTrusteeController extends Controller
{

    public function frontend()
    {
        $data['all'] = BoardofTrustee::with('member')->orderBy('sort_order','ASC')->get();
        return view('frontend.all-board-of-trustee')->with($data);
    }

    public function list()
    {
        $data['trustees'] = BoardofTrustee::with('member')->orderBy('sort_order','ASC')->get();
        //dd($data['trustees']);
        return view('backend.board_of_trustee.board_of_trustee-list')->with($data);
    }

    public function add()
    {
        $data['editData'] = NULL;
        $data['members'] = Member::all();
        return view('backend.board_of_trustee.board_of_trustee-add')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
    		'designation' => 'required',
        ]);
        
        $params = $request->all();

        $memberCheck = BoardofTrustee::where('member_id',$request->member_id)->first();
        if($memberCheck)
        {
            return redirect()->back()->with('error','This member already exists in the list');
        }

        $member = BoardofTrustee::create($params);
        
    	return redirect()->route('board_of_trustee.list')->with('info','Board of Trustee Information add Successfully.');
    }

    public function edit($id)
    {
        $data['members'] = Member::all();
        $data['editData'] = BoardofTrustee::find($id);
    	return view('backend.board_of_trustee.board_of_trustee-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => 'required',
        ]);

        $memberCheck = BoardofTrustee::where('member_id',$request->member_id)->where('id','!=',$id)->first();
        if($memberCheck)
        {
            return redirect()->back()->with('error','This member already exists in the list.');
        }

    	$data = BoardofTrustee::find($id);
        $params = $request->except(['_token']);
        $data->update($params);

    	return redirect()->route('board_of_trustee.list')->with('info','Board of Trustee Information Update Successfully');
    }

    public function destroy(Request $request)
    {
        $data = BoardofTrustee::find($request->id);
        @unlink(public_path('upload/board_of_trustee/'.$data->image));
    	$data->delete();
    }
}
