<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LibraryTimeSchedule;

class LibraryTimeScheduleController extends Controller
{
    public function index()
    {
        $data['editData'] = LibraryTimeSchedule::first();
        return view('backend.library.time_schedule.time_schedule-add')->with($data);
    }

    public function storeSchedule(Request $request)
    {
        $data = LibraryTimeSchedule::first();
        $params = $request->all();
        if(!empty($data))
        {
            $data->update($params);
            return redirect()->route('library-management.time_schedule')->with('info','Time Schedule Update Successfully.');
        }
        else
        {
            LibraryTimeSchedule::create($params);
            return redirect()->route('library-management.time_schedule')->with('info','Time Schedule add Successfully.');
        }
    }
}
