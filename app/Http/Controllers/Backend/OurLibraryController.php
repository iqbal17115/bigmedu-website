<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\OurLibrary;
use App\Model\LibraryBackground;

class OurLibraryController extends Controller
{
    public function index()
    {
        $data['ourLibraries'] = OurLibrary::orderBy('sort_order','asc')->get();
        return view('backend.our_library.our_library-list')->with($data);
    }

    public function addOurLibrary()
    {
        return view('backend.our_library.our_library-add');
    }

    public function storeOurLibrary(Request $request)
    {
        $request->validate([
    		'title' => 'required',
    		'sort_order' => 'unique:our_libraries',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_library'), $filename);
            $params['image']= $filename;
        }

        OurLibrary::create($params);
        
    	return redirect()->route('site-setting.our_library')->with('info','Our Library add Successfully.');
    }

    public function editOurLibrary($id)
    {
        $data['editData'] = OurLibrary::find($id);
    	return view('backend.our_library.our_library-add')->with($data);
    }

    public function updateOurLibrary(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = OurLibrary::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/our_library/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_library'), $filename);
            $params['image']= $filename;
        }
    	$data->update($params);

    	return redirect()->route('site-setting.our_library')->with('info','Our Library Update Successfully');
    }

    public function deleteOurLibrary(Request $request)
    {
        $data = OurLibrary::find($request->id);
        @unlink(public_path('upload/our_library/'.$data->image));
    	$data->delete();
    }

    public function storeLibraryBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = LibraryBackground::first();
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
        $params['show_section'] = $request->show_section ?? 0;
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/our_library/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_library'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            LibraryBackground::create($params);
        }
        
        return redirect()->route('site-setting.our_library')->with('info','Updated successfully.');
    }

}

