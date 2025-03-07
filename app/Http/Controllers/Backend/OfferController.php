<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Offer;
use App\Model\OfferBackgroundVideo;
use Image;

class OfferController extends Controller
{
    public function index()
    {
    	$data['offer'] = Offer::orderBy('sort_order','asc')->get();
    	return view('backend.offer.offer-view')->with($data);

    }

    public function addOffer()
    {

    	return view('backend.offer.offer-add');
    }

    public function storeOffer(Request $request)
    {
        // dd($request->all());
       $request->validate([
            'title' => 'required',
            // 'image' => 'required',
        ]);

        $params = $request->all();
        $params['date'] = date('Y-m-d',strtotime($request->date));
        // dd($params);
        if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/offer'), $filename);
            $image=Image::make(public_path('upload/offer/').$filename);
            $image->resize(643,360)->save(public_path('upload/offer/').$filename);
            $params['image']= $filename;
        }

        if($request->offer_url =='#'){
            $params['offer_url'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->offer_url;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['offer_url'] = $imgName;
        }else{
            $params['offer_url'] = $request->offer_url;
        }
        $params['url_link_type'] = $request->url_link_type;

        Offer::create($params);

        return redirect()->back()->with('info', 'Offer store successfully.');
    }

    public function editOffer($id)
    {
        $data['editData'] = Offer::find($id);
        return view('backend.offer.offer-add')->with($data);

    }

    public function updateOffer(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([
            'title' => 'required'
            // 'image' => 'required',
        ]);
        $params = $request->all();
        $data = Offer::find($id);

        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/offer/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/offer'), $filename);
            $image=Image::make(public_path('upload/offer/').$filename);
            $image->resize(200,200)->save(public_path('upload/offer/').$filename);
            $params['image']= $filename;
        }

        if($request->offer_url =='#'){
            $params['offer_url'] = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->offer_url;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/useful_file'), 0777, true);
            }
            file_put_contents('public/backend/useful_file/'.$imgName, @$file_link_decode);
            $params['offer_url'] = $imgName;
        }else{
            $params['offer_url'] = $request->offer_url;
        }
        $params['url_link_type'] = $request->url_link_type;
        
        $data->update($params);
        return redirect()->route('site-setting.offer')->with('info','Offer updated successfully.');

    }

    public function deleteOffer(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = Offer::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('site-setting.offer');
    }

    public function storeOfferVideo(Request $request)
    {
        
        // $data = OfferBackgroundVideo::first();
        // $params = $request->all();
        // if(!empty($data))
        // {
        //     $data->update($params);
        // }
        // else
        // {
        //     OfferBackgroundVideo::create($params);
        // }
        // return redirect()->back()->with('info','Saved Successfully.');
        // End offer youtube video
        
        $data = OfferBackgroundVideo::first();
        $params = $request->all();
        if($request->hasFile('offer_video'))
        {
            // if(!empty($data))
            // {
            //     @unlink(public_path('upload/offer_video/'.$data->offer_video));
            // }
            $path = $request->file('offer_video')->store('videos', ['disk' => 'offer_video']);
            $params['offer_video'] = $path;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            OfferBackgroundVideo::create($params);
        }
    	return redirect()->back()->with('info','Saved Successfully.');
    }
}
