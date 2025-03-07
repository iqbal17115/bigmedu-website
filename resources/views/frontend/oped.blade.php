@extends('frontend.layouts.index')

@section('extra_css_files')
    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
@include('frontend.layouts.header')
{{-- @php dd(@$fmenu); @endphp --}}
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
<section id="partnership" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 75px; @endif">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3 class="text-center">Op-ed of BIGM
                    </b></h3>
                    <hr>
                </div>
            </div>
        </div>
        @php
        $opeds = \App\Model\Oped::orderBy('date','DESC')->get();
        @endphp
        <div class="container">
            <h5><p style="text-align: left;"><b>Recent Op-ed</b></p></h5>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($opeds as $oped)
                            {{-- <a href="{{ route('blog.details',$oped->id) }}" style="color: black !important;text-decoration: none !important;"> --}}
                                <div class="facility">
                                    
                                    <img src="{{asset('public/upload/oped/'.@$oped->image)}}" class="w-100" height="200px;" alt="" />
                                    <a target="_blank" href="{{ @$oped->url }}"><b style="text-align: center;display: block;margin-top: 10px;margin-bottom: 10px;">{{ @$oped->title }}</b></a>
                                    <span style="text-align: justify;">{!! strip_tags(substr($oped->description,0,250)) !!}</span>
                                
                                    <small style="display: block;margin-top: 15px;">{{ @$oped->author_name }}</small>
                                    <small style="display: block;margin-top: 10px;">{{ @$oped->newspaper_name }}</small>
                                    <small style="display: block;margin-top: 10px;">{{ date('d M, Y',strtotime(@$oped->date)) }}</small>
                                </div>
                            {{-- </a> --}}
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- @php dd($opedYears); @endphp --}}
            @foreach($opedYears as $key => $opedYear)
            @php
             $currentYearOpeds = \App\Model\Oped::whereYear('date',@$opedYear->year)->orderBy('date','DESC')->get();
            @endphp
            <p><h5 style="text-align: center;margin-top: 50px;">Op-eds Published in {{ $opedYear->year }}</h5></p>
            <table id="dataTable{{$key}}" class="table table-sm table-striped table-borderless table-info" style="">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Newspaper</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($currentYearOpeds as $currentYearOped)	
                    <tr>		                  	                 
                        <td> {{$loop->iteration}}</td>
                        <td> {{@$currentYearOped['title']}}</td>
                        <td> 
                            <span>{{@$currentYearOped['newspaper_name']}}</span><br>
                            <span>{{ date('d M, Y',strtotime(@$currentYearOped->date)) }}</span>
                        </td>
                        <td> 
                            @if(@$currentYearOped['url'])
                                <a target="_blank" href="{{ @$currentYearOped['url'] }}">See More</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach                
                </tbody>                
            </table>
            @endforeach
            {{-- @php
            $prevYearOpeds = \App\Model\Oped::whereYear('date',now()->subYear()->year)->orderBy('date','DESC')->get();
            @endphp
            <p><h5 style="text-align: center;">Op-eds Published in {{ date('Y',strtotime("-1 year")) }}</h5></p>
            <table id="dataTable2" class="table table-sm table-striped table-borderless table-info" style="">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Newspaper</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prevYearOpeds as $prevYearOped)	
                    <tr>		                  	                 
                        <td> {{$loop->iteration}}</td>
                        <td> {{@$prevYearOped['title']}}</td>
                        <td>
                            <span>{{@$prevYearOped['newspaper_name']}}</span><br>
                            <span>{{ date('d M, Y',strtotime(@$prevYearOped->date)) }}</span>
                        </td>
                        <td> 
                            @if(@$prevYearOped['url'])
                                <a target="_blank" href="{{ @$prevYearOped['url'] }}">See More</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach                
                </tbody>                
            </table> --}}
        </div>

    </div>
</section>

    @include('frontend.layouts.footer')

    @section('extra_script_files')
        <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
        <script>
            $('#dataTable0').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
            });
            $('#dataTable1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
            });
            $('#dataTable2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.owl-carousel').owlCarousel({
                    loop: false,
                    autoplay:false,
                    margin: 10,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 2,
                            nav: false
                        },
                        1000: {
                            items: 3,
                            nav: true,
                            loop: false,
                            margin: 20
                        }
                    }
                })
            });
        </script>
    @endsection



@endsection