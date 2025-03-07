@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

    <section id="career" style="margin-top:5%;">
        <div class="container">
            <div class="row-">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                        <a id="setter" href="{{ route('career_jobs') }}" class="btn btn-link float-right" style="margin-bottom:10px;padding:0;">Back to Career/Jobs</a>
                            <table id="datatable" class="table table-sm table-bordered" style="border-color: #69626263;">
        
                                <tbody>
                                    <tr>
                                        <th id="getter" style="background: #6d7aaf7d" style="width: 15%;">Job Title</th>
                                        <td style="width: 85%;">{{ $career['title'] }}</td>
                                    </tr>
                                    {{-- <script>
                                        $(document).ready(function(){

                                            var $setter = $("#setter");
                                            var $getter = $("#getter");
                                            console.log($getter.width());
                                            $setter.css("margin-left", $getter.width()+"px");
                                        });
                                    </script> --}}
                                    <tr>
                                        <th style="background: #6d7aaf7d">Job Post Date</th>
                                        <td>{{ date('d.m.Y',strtotime($career['start_date'])) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="background: #6d7aaf7d">Job Description</th>
                                        <td>{!! $career['description'] !!}</td>
                                    </tr>
                                    <tr>
                                        <th style="background: #6d7aaf7d">Attachment</th>
                                        <td>
                                            <iframe src="{{ asset('public/upload/career/'.$career['attachment']) }}" width="70%;" height="500px;"></iframe>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th style="background: #6d7aaf7d">Attachment</th>
                                        <td>
                                            <div class="link">
                                                @if($career->attachment)
                                                <a href="{{ asset('public/upload/career/'.$career->attachment) }}" target="_blank"><i class="flaticon-pdf"></i>View </a>
                                                
                                                @else
                                                <center><h4>N/A</h4></center>
                                                @endif
                                            </div>
                                            <div class="link">
                                                @if($career->attachment)
                                                <a href="{{ asset('public/upload/career/'.$career->attachment) }}" download><i class="flaticon-pdf">Download</i> </a>
                                                
                                                @else
                                                <center><h4>N/A</h4></center>
                                                @endif
                                            </div>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th style="background: #6d7aaf7d">Last Date to Apply</th>
                                        <td>{{ date('d.m.Y',strtotime($career['end_date'])) }}</td>
                                    </tr>      
                                </tbody>                
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@include('frontend.layouts.footer')
@endsection