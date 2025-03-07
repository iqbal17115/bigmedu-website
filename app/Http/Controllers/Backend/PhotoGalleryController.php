<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PhotoGallery;
use App\Model\PhotoGalleryImage;
use App\Model\Gallery;
use Image;

class PhotoGalleryController extends Controller
{
    public function photoGallery()
    {
        // $data['title_page'] = 'Gallery';
        // $data['page'] = 'Gallery';
        // $data['gallery'] = Gallery::orderBy('created_at','DESC')->paginate(20);
        // return view('frontend.all-gallery')->with($data);
        $data['photoGalleries'] = PhotoGallery::where('status',1)->orderBy('publish_date','desc')->get();
        return view('frontend.photo-gallery')->with($data);
    }

    public function index()
    {
        $data['photoGalleries'] = PhotoGallery::orderBy('publish_date','desc')->get();
        return view('backend.photo_gallery.photo_gallery-list')->with($data);
    }

    public function addPhotoGallery()
    {

    	return view('backend.photo_gallery.photo_gallery-add');
    }

    public function storePhotoGallery(Request $request)
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
       $photoGallery = PhotoGallery::create($params);
       
        if($request->hasfile('image'))
        {
            // dd($request->hasfile('image'));
            foreach($request->file('image') as $key => $image)
            {
                $filename = time() . '.' . $key . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/photo_gallery'), $filename);
                $image=Image::make(public_path('upload/photo_gallery/').$filename);
                //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
                $image->save(public_path('upload/photo_gallery/').$filename);
                $data['image']= $filename;
                $data['photo_gallery_id'] = $photoGallery->id;
                PhotoGalleryImage::create($data);
            }
        }

        return redirect()->route('top-menu.photo_gallery')->with('info', 'Photo Gallery store successfully.');
    }

    public function editPhotoGallery($id)
    {
        $data['editData'] = PhotoGallery::find($id);
        return view('backend.photo_gallery.photo_gallery-add')->with($data);

    }

    public function updatePhotoGallery(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([
            'title' => 'required',
            'publish_date' => 'required'
        ]);
        $params = $request->all();
        $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
        $params['status'] = $request->status ?? 0;
        $photoGallery = PhotoGallery::find($id);
        if($request->hasfile('image'))
        {
            // dd($request->hasfile('image'));
            foreach($request->file('image') as $key => $image)
            {
                $filename = time() . '.' . $key . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/photo_gallery'), $filename);
                $image=Image::make(public_path('upload/photo_gallery/').$filename);
                //$image->resize(643,360)->save(public_path('upload/activity/').$filename);
                $image->save(public_path('upload/photo_gallery/').$filename);
                $data['image']= $filename;
                $data['photo_gallery_id'] = $photoGallery->id;
                PhotoGalleryImage::create($data);
            }
        }
        $photoGallery->update($params);
        return redirect()->route('top-menu.photo_gallery')->with('info','Photo Gallery update successfully.');

    }

    public function deletePhotoGallery(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = PhotoGallery::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $del = $deleteData->delete();
        if($del)
        {
            $images = PhotoGalleryImage::where('photo_gallery_id',$id)->get();
            foreach($images as $image)
            {
                @unlink(public_path('upload/photo_gallery/'.$image->image));
            }
            PhotoGalleryImage::where('photo_gallery_id',$id)->delete();
        }
        return redirect()->route('top-menu.video_gallery');
    }

    public function removeImageFromPhotoGallery($id)
    {
        // $id = $request->id;
        $deleteData = PhotoGalleryImage::find($id);
        @unlink(public_path('upload/photo_gallery/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->back();
    }
}
