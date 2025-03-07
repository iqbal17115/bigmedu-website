<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Partnership;
use Image;

class PartnershipController extends Controller
{
    public function index()
    {
    	$data['partnership'] = Partnership::orderBy('sort_order','asc')->get();
    	return view('backend.partnership.partnership-view')->with($data);

    }

    public function addPartnership()
    {
    	return view('backend.partnership.partnership-add');

    }

    public function storePartnership(Request $request)
    {
        
    	// $data = new partnership;
         $request->validate([
            // 'name' => 'required',
            // 'designation_id' => 'required',
            'image' => 'required',
        ]);
        $params = $request->all();
    	 if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/partnership'), $filename);
            //$image=Image::make(public_path('upload/partnership/').$filename);
            // $image->resize(1900,1051)->save(public_path('upload/partnership/').$filename);
            $params['image']= $filename;
            
        }

        Partnership::create($params);
        return redirect()->back()->with('info','partnership store successfully.');
        
    }

    public function editPartnership($id)
    {
        $data['editData'] = Partnership::find($id);
        // dd($editData->toArray( ));
        return view('backend.partnership.partnership-add')->with($data);



    }

    public function updatePartnership(Request $request,$id)
    {
    	// dd($request->all());
                 $request->validate([
            // 'name' => 'required',
            // 'designation_id' => 'required',
            // 'image' => 'required',
        ]);
        $params = $request->all();
        $data = Partnership::find($id);

        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/partnership/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/partnership'), $filename);
            $image=Image::make(public_path('upload/partnership/').$filename);
            $image->resize(1900,1051)->save(public_path('upload/partnership/').$filename);
            $params['image']= $filename;
            
        }
        $data->update($params);
        return redirect()->route('site-setting.partnership')->with('info','partnership update successfully.');
        

    }

    public function deletePartnership(Request $request)
    {
    	// dd($id);
        $id = $request->id;
        $deleteData = Partnership::find($id);
        // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.partnership');
    }
}
