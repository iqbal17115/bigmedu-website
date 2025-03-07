<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StudentFeedback;
use App\Model\FeedbackBackground;
use Image;

class StudentFeedbackController extends Controller
{
    public function index()
    {
        $data['studentFeedbacks'] = StudentFeedback::orderBy('sort_order','asc')->get();
        return view('backend.student_feedbacks.student_feedbacks-list')->with($data);
    }

    public function addStudentFeedback()
    {
        return view('backend.student_feedbacks.student_feedbacks-add');
    }

    public function storeStudentFeedback(Request $request)
    {
        $request->validate([
    		'title' => 'required',
    		'sort_order' => 'unique:student_feedbacks',
        ]);
        
        $params = $request->all();

        if ($file = $request->file('image'))
        {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/student_feedbacks'), $filename);
            $image=Image::make(public_path('upload/student_feedbacks/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            $image->save(public_path('upload/student_feedbacks/').$filename);
            $params['image']= $filename;
        }

        StudentFeedback::create($params);
        
    	return redirect()->route('site-setting.student_feedbacks')->with('info','New Student Feedback add Successfully.');
    }

    public function editStudentFeedback($id)
    {
        $data['editData'] = StudentFeedback::find($id);
    	return view('backend.student_feedbacks.student_feedbacks-add')->with($data);
    }

    public function updateStudentFeedback(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
    	$data = StudentFeedback::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/student_feedbacks/'.$data->image));
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/student_feedbacks'), $filename);
            $image=Image::make(public_path('upload/student_feedbacks/').$filename);
            //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
            $image->save(public_path('upload/student_feedbacks/').$filename);
            $params['image']= $filename;
        }
    	$data->update($params);

    	return redirect()->route('site-setting.student_feedbacks')->with('info','Student Feedback Update Successfully');
    }

    public function deleteStudentFeedback(Request $request)
    {
        $data = StudentFeedback::find($request->id);
        @unlink(public_path('upload/student_feedbacks/'.$data->image));
    	$data->delete();
    }

    public function storeFeedbackBackground(Request $request)
    {
        $request->validate([

        ]);

        $data = FeedbackBackground::first();
        $params = $request->all();
        $params['show_status'] = $request->show_status ?? 0;
        $params['show_section'] = $request->show_section ?? 0;
        if($file = $request->file('image'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/student_feedbacks/'.$data->image));
            }
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/student_feedbacks'), $filename);
            $params['image']= $filename;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            FeedbackBackground::create($params);
        }
        
        return redirect()->route('site-setting.student_feedbacks')->with('info','Updated successfully.');
    }

}
