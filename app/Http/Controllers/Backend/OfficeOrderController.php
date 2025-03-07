<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\OfficeOrder;
use App\Model\OfficeOrderAttachment;

class OfficeOrderController extends Controller
{
    public function frontend()
    {
        $data['officeOrders'] = OfficeOrder::where('publish_date','<=',date('Y-m-d'))->where('status',1)->orderBy('publish_date','desc')->get();
        // dd(OfficeOrder::first()->publish_date);
        // dd(date('Y-m-d'));
        return view('frontend.office_order')->with($data);
    }

    public function list()
    {
        $data['officeOrders'] = OfficeOrder::orderBy('publish_date','desc')->get();
        return view('backend.office_order.office_order-list')->with($data);
    }

    public function add()
    {
        // $data['editData'] = NULL;
        return view('backend.office_order.office_order-add');
    }

    public function store(Request $request)
    {
        $request->validate([
    		'title' => 'required',
    		'publish_date' => 'required',
        ]);
        
        $params = $request->all();
        $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
        $params['status'] = $request->status ?? 0;

        $officeOrder = OfficeOrder::create($params);
        //$params['member_id'] = $member->id;
        
        foreach($file = $request->file('attachment') as $key => $val){
            $store = new OfficeOrderAttachment();
            $store->office_order_id = $officeOrder->id;
            // $store->attachment = $request->attachment[$key];
            $filename[$key] = time() . '.' . $file[$key]->getClientOriginalExtension();
            $file[$key]->move(public_path('upload/office_order'), $filename[$key]);
            $store->attachment= $filename[$key];
            $store->save();
        }
        
    	return redirect()->route('footer-menu.office.order')->with('info','NOC/ Office Order add Successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = OfficeOrder::find($id);
        $data['editDataAttachments'] = OfficeOrderAttachment::where('office_order_id',$data['editData']->id)->get();
    	return view('backend.office_order.office_order-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
    		'title' => 'required',
    		'publish_date' => 'required',
        ]);
    	$data = OfficeOrder::find($id);
        $params = $request->except(['_token']);
        $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
        $params['status'] = $request->status ?? 0;
        
        $data->update($params);

        $officeOrder = OfficeOrder::find($id);
        $editDataAttachments = OfficeOrderAttachment::where('office_order_id',$officeOrder->id)->get();
        if($request->hasFile('attachment'))
        {
            foreach($file = $request->file('attachment') as $key => $val){
                $store = new OfficeOrderAttachment();
                $store->office_order_id = $officeOrder->id;
                    $filename[$key] = time() . '.' . $file[$key]->getClientOriginalExtension();
                    $file[$key]->move(public_path('upload/office_order'), $filename[$key]);
                    $store->attachment= $filename[$key];
                $store->save();
            }
        }
        // else
        // {
        //     $paramsAttachment = array();
        //     foreach($file = $request->file('attachment') as $key => $val)
        //     {
        //         if($key >= 5000)
        //         {
        //             if($request->file('attachment')[$key] == NULL)
        //             {
                        
        //             }
        //             else
        //             {
        //                 $store = new OfficeOrderAttachment();
        //                 $store->office_order_id = $officeOrder->id;
        //                     $filename[$key] = time() . '.' . $file[$key]->getClientOriginalExtension();
        //                     $file[$key]->move(public_path('upload/office_order'), $filename[$key]);
        //                     $store->attachment= $filename[$key];
        //                 $store->save();
        //             }
        //         }
        //         else
        //         {
        //             $paramsAttachment = array();
        //             $paramsAttachment['office_order_id'] = $officeOrder->id;
        //             $filename[$key] = time() . '.' . $file[$key]->getClientOriginalExtension();
        //             $file[$key]->move(public_path('upload/office_order'), $filename[$key]);
        //             $paramsAttachment['attachment']= $filename[$key];
        //             OfficeOrderAttachment::where('id',$request->attachment_id[$key])->update($paramsAttachment);
        //         }
        //     }
        // }
        return redirect()->route('footer-menu.office.order')->with('info','NOC/ Office Order Update Successfully');
    }

    public function delete(Request $request)
    {
        $data = OfficeOrder::find($request->id);
    	$data->delete();
    }

    public function officeOrderAttachmentRemove($id)
    {
        $data = OfficeOrderAttachment::find($id);
        @unlink(public_path('upload/office_order/'.$data->image));
        $data->delete();
        return redirect()->back()->with('info','Attachment Deleted Successfully');
    }

}
