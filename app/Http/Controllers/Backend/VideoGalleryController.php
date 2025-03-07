<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\VideoGallery;
use App\Model\Gallery;

class VideoGalleryController extends Controller
{
    public function videoGallery()
    {
        // $data['title_page'] = 'Gallery';
        // $data['page'] = 'Gallery';
        // $data['gallery'] = Gallery::orderBy('created_at','DESC')->paginate(20);
        // return view('frontend.all-gallery')->with($data);
        $data['videoGalleries'] = VideoGallery::where('status',1)->orderBy('publish_date','desc')->get();

        return view('frontend.video-gallery')->with($data);
    }

    public function index()
    {
        $data['videoGalleries'] = VideoGallery::orderBy('publish_date','desc')->get();
        return view('backend.video_gallery.video_gallery-list')->with($data);
    }

    public function addVideoGallery()
    {

    	return view('backend.video_gallery.video_gallery-add');
    }

    public function storeVideoGallery(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'publish_date' => 'required'
        ]);
       //dd($request->date);
       $params = $request->all();
       $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
       $params['status'] = $request->status ?? 0;
       //dd($params);
       VideoGallery::create($params);

        return redirect()->route('top-menu.video_gallery')->with('info', 'Video Gallery store successfully.');
    }

    public function editVideoGallery($id)
    {
        $data['editData'] = VideoGallery::find($id);
        return view('backend.video_gallery.video_gallery-add')->with($data);

    }

    public function updateVideoGallery(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([
            'title' => 'required',
            'publish_date' => 'required'
        ]);
        $params = $request->all();
        $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
        $params['status'] = $request->status ?? 0;
        $data = VideoGallery::find($id);
        $data->update($params);
        return redirect()->route('top-menu.video_gallery')->with('info','Video Gallery update successfully.');

    }

    public function deleteVideoGallery(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = VideoGallery::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('top-menu.video_gallery');
    }
}
