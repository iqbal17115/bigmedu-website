<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::all();
        return view('backend.project.project-list')->with($data);
    }

    public function addProject()
    {
        return view('backend.project.project-add');
    }

    public function storeProject(Request $request)
    {
        $request->validate([
    		'project_name' => 'required',
        ]);
        
        $params = $request->all();

        Project::create($params);
        
    	return redirect()->route('user.project')->with('info','New Project add Successfully.');
    }

    public function editProject($id)
    {
        $data['editData'] = Project::find($id);
    	return view('backend.project.project-add')->with($data);
    }

    public function updateProject(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required',
        ]);
    	$data = Project::find($id);
        $params = $request->all();
    	$data->update($params);

    	return redirect()->route('user.project')->with('info','Project Update Successfully');
    }

    public function deleteProject(Request $request)
    {
        $data = Project::find($request->id);
    	$data->delete();
    }

}
