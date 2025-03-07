<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\OurResearch;
use App\Model\ResearchBackground;

class OurResearchController extends Controller
{
    public function index()
    {
        $data['ourResearches'] = OurResearch::orderBy('sort_order','asc')->get();
        return view('backend.our_research.our_research-list')->with($data);
    }

    public function addOurResearch()
    {
        return view('backend.our_research.our_research-add');
    }

    public function storeOurResearch(Request $request)
    {
        $request->validate([
    		'title' => 'required',
    		'sort_order' => 'unique:our_researches',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_research'), $filename);
            $params['image']= $filename;
        }

        OurResearch::create($params);
        
    	return redirect()->route('site-setting.our_research')->with('info','Our Research add Successfully.');
    }

    public function editOurResearch($id)
    {
        $data['editData'] = OurResearch::find($id);
    	return view('backend.our_research.our_research-add')->with($data);
    }

    public function updateOurResearch(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = OurResearch::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/our_research/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_research'), $filename);
            $params['image']= $filename;
        }
    	$data->update($params);

    	return redirect()->route('site-setting.our_research')->with('info','Our Research Update Successfully');
    }

    public function deleteOurResearch(Request $request)
    {
        $data = OurResearch::find($request->id);
        @unlink(public_path('upload/our_research/'.$data->image));
    	$data->delete();
    }

    public function storeResearchBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = ResearchBackground::first();
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
        $params['show_section'] = $request->show_section ?? 0;
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/our_research/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/our_research'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            ResearchBackground::create($params);
        }
        
        return redirect()->route('site-setting.our_research')->with('info','Updated successfully.');
    }

}
