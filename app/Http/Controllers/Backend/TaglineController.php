<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tagline;

class TaglineController extends Controller
{
    public function index()
    {
        $data['taglines'] = Tagline::all();
        return view('backend.tagline.tagline-list')->with($data);
    }

    public function addTagline()
    {

    	return view('backend.tagline.tagline-add');
    }

    public function storeTagline(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
       $params = $request->all();
       //dd($params);
       Tagline::create($params);

        return redirect()->route('site-setting.tagline')->with('info', 'Tag lines store successfully.');
    }

    public function editTagline($id)
    {
        $data['editData'] = Tagline::find($id);
        return view('backend.tagline.tagline-add')->with($data);

    }

    public function updateTagline(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $data = Tagline::find($id);
        $data->update($params);
        return redirect()->back()->with('info','Tag lines update successfully.');

    }

    public function deleteTagline(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = Tagline::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.tagline');
    }
}
