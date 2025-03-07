<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Model\ContactMessage;
use App\Http\Controllers\Controller;
use App\Model\AskLibrarian;
use App\Model\ControlTopLeftMenu;
use App\Model\JournalPaper;

class ContactMessageController extends Controller
{
    //
    public function index()
    {
    	$data['message'] = ContactMessage::orderBy('created_at','DESC')->get();
    	return view('backend.contact_message.contact-message-view')->with($data);
    }

    public function askLibrarian()
    {
    	$data['message'] = AskLibrarian::orderBy('created_at','DESC')->get();
    	return view('backend.library.ask_librarian.ask_librarian')->with($data);
    }

    public function bigmJournalPolicy()
    {
    	$data['journalPapers'] = JournalPaper::orderBy('created_at','DESC')->get();
    	return view('backend.bigm_journal_policy.bigm_journal_policy')->with($data);
    }

    public function controlTopLeftMenu()
    {
    	$data['message'] = AskLibrarian::orderBy('created_at','DESC')->get();
    	return view('backend.control_top_left_menu.control_top_left_menu')->with($data);
    }

    public function storeControlTopLeftMenu(Request $request)
    {
        $request->validate([

        ]);

        $data = ControlTopLeftMenu::first();
        $params = $request->all();
        $params['status'] = $request->status ?? 0;
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            ControlTopLeftMenu::create($params);
        }
        
        return redirect()->back()->with('info','Saved successfully.');
    }
}
