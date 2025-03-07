<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SocialMediaLink;

class SocialMediaLinkController extends Controller
{
    public function index()
    {
        $data['link'] = SocialMediaLink::first();
        return view('backend.social_media_link.social_media_link-list')->with($data);
    }

    public function addSocialMediaLink()
    {

    	return view('backend.social_media_link.social_media_link-add');
    }

    public function storeSocialMediaLink(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);
       //dd($request->date);
       $params = $request->all();
       $params['facebook_status'] = $request->facebook_status ?? 0;
       $params['twitter_status'] = $request->twitter_status ?? 0;
       $params['instagram_status'] = $request->instagram_status ?? 0;
       $params['linkedin_status'] = $request->linkedin_status ?? 0;
       $params['youtube_status'] = $request->youtube_status ?? 0;
       $params['whatsapp_status'] = $request->whatsapp_status ?? 0;
       $params['pinterest_status'] = $request->pinterest_status ?? 0;
       $params['mail_status'] = $request->mail_status ?? 0;
       //dd($params);
       SocialMediaLink::create($params);

        return redirect()->route('footer-menu.social_media_links')->with('info', 'Social Media Link store successfully.');
    }

    public function editSocialMediaLink()
    {
        $data['editData'] = SocialMediaLink::first();
        return view('backend.social_media_link.social_media_link-add')->with($data);

    }

    public function updateSocialMediaLink(Request $request)
    {
            // dd($request->all());
        $request->validate([

        ]);
        $params = $request->all();
        $data = SocialMediaLink::first();
        $params['facebook_status'] = $request->facebook_status ?? 0;
        $params['twitter_status'] = $request->twitter_status ?? 0;
        $params['instagram_status'] = $request->instagram_status ?? 0;
        $params['linkedin_status'] = $request->linkedin_status ?? 0;
        $params['youtube_status'] = $request->youtube_status ?? 0;
        $params['whatsapp_status'] = $request->whatsapp_status ?? 0;
        $params['pinterest_status'] = $request->pinterest_status ?? 0;
        $params['mail_status'] = $request->mail_status ?? 0;
        $data->update($params);
        return redirect()->back()->with('info','Social Media Link update successfully.');

    }

    public function deleteSocialMediaLink(Request $request)
    {
            // dd($id);
        $id = $request->id;
        $deleteData = SocialMediaLink::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        return redirect()->route('footer-menu.social_media_links');
    }
}
