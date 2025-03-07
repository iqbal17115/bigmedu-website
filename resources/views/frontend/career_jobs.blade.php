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
    <section id="career" style="@if(@$fmenu) margin-top: 0; @else margin-top: 5%; @endif">
        <div class="container">
            <div class="row-">
                <div class="col-12">
                    <b>Career/Jobs</b>
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <table id="datatable" class="table table-sm table-bordered table-striped ">
                                <thead style="background: #becea9;">
                                    <tr>
                                        <th>SI</th>
                                        <th>Job Title</th>
                                        <th>Date of Publish</th>
                                        <th>Last Date to Apply</th>
                                        <th width="80">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               @foreach($careers as $career)  
                            <tr>    
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $career['title'] }}</td>
                                <td>{{ date('d.m.Y',strtotime($career['start_date'])) }}</td>
                                <td>{{ date('d.m.Y',strtotime($career['end_date'])) }}</td>
                                <td>
                                  <a href="{{ route('career_jobs_view',$career->id) }}" class="btn btn-link btn-flat btn-sm" data-type="image">View</a>
                                </td>
                            </tr>
                            @endforeach    
                                 
                                              
                                </tbody>                
                              </table>
                        </div>
                    </div>
                    @php
                    $last = \App\Model\Career::latest()->first();
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