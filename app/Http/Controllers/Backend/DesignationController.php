<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Designation;

class DesignationController extends Controller
{
    public function index()
   {
    $data['designation'] = Designation::all();
    return view('backend.designation.designation-view')->with($data);
}

public function addDesignation()
{
   return view('backend.designation.designation-add');
}

public function storeDesignation(Request $request)
{
  $request->validate([
    'name' => 'required',
]);
  $data = $request->all();
  // dd($data);
  Designation::create($data);
  return redirect()->route('site-setting.designation')->with('info','Designation store successfully.');
}

public function editDesignation($id)
{
    $data['editData'] = Designation::find($id);
    return view('backend.designation.designation-add')->with($data);
}

public function updateDesignation(Request $request, $id)
{
   $request->validate([
    'name' => 'required',
]);
   $data = Designation::find($id);
   $data->update($request->all());
   return redirect()->route('site-setting.designation')->with('info','Designation update successfully.');
}

public function deleteDesignation(Request $request)
{
    $data = Designation::find($request->id);
    $data->delete();
    return redirect()->route('site-setting.designation');
}

}
