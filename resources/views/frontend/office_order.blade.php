@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')
@php
$urll = request()->fullUrl();
if($urll) {
    $url = explode('=',$urll);
    if(sizeOf($url) >= 3)
    {
        $ur = $url[2];
        $fmenu = DB::table('frontend_menus')->where('id', $ur)->first();
    }
}
//dd($fmenu);
@endphp
    <section id="career" style="@if(@$fmenu) margin-top: 0; @else margin-top: 6%; @endif">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <b>NOC/Office Orders</b>
                    <div class="tab-content">
                        
                        <div class="tab-pane fade show active">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead style="background: #559cb9;">
                                <tr>
                                <th>SI</th>
                                <th>Title</th>
                                <th>Publish Date</th>
                                <th>Attachments</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($officeOrders as $officeOrder)  
                            <tr>    
                              <td>{{ $loop->iteration }}</td>                                     
                              <td>{{$officeOrder['title']}}</td>
                              <td>{{date('d/m/Y',strtotime($officeOrder['publish_date']))}}</td>
                              <td style="text-align: center;">
                                  @php $attachments = \App\Model\OfficeOrderAttachment::where('office_order_id',$officeOrder->id)->get(); @endphp
                                  @foreach($attachments as $attachment)
                                  {{-- <img src="{{ asset('public/frontend/images/pdf_icon.png') }}" height="40"> --}}
                                  @php 
                                    if($attachment->attachment != Null)
                                    {
                                        $ext = explode('.',$attachment->attachment);
                                        //dd($ext[1]);
                                    }
                                  @endphp
                                  @if($attachment->attachment != Null && $ext[1] == 'pdf') <a target="_blank" href="{{ asset('public/upload/office_order/'.$attachment->attachment) }}"><img src="{{ asset('public/frontend/images/pdf_icon.png') }}" height="40"></a>@endif
                                  @if($attachment->attachment != Null && ($ext[1] == 'doc' || $ext[1] == 'docm' || $ext[1] == 'docx')) <a target="_blank" href="{{ asset('public/upload/office_order/'.$attachment->attachment) }}"><img src="{{ asset('public/frontend/images/doc_icon.png') }}" height="40"></a>@endif
                                  {{-- <img src="{{ asset('public/frontend/images/doc_icon.png') }}" height="40"> --}}
                                  @endforeach
                              </td>
                            </tr>
                            @endforeach    
                                 
                                              
                                </tbody>                
                              </table>
                        </div>
                    </div>
                    @php
                    $last = \App\Model\OfficeOrder::latest()->first();
                    // dd($last);
                    @endphp
                    @if(@$last['updated_at'])
                    <div style="margin-top: 2px;color: #070101;margin-bottom: 5px;text-align: right;">
                        Updated at {{date('d-M-Y',strtotime(@$last['updated_at']))}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
@include('frontend.layouts.footer')
@endsection