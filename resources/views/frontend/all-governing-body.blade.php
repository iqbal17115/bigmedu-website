@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

    {{-- <section id="training">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="title text-white">
                        <p>FIND PERFECT <span>TRAINING</span></p>
                        <h3>Check All <b>Training & Enroll</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($trainingEnrolls as $trainingEnroll)
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="enroll text-center">
                        <div class="icon"><img src="{{ asset('public/upload/training_enroll/'.$trainingEnroll->image) }}" alt="" /></div>
                        <h3>{{ $trainingEnroll->title }}</h3>
                        <p>{{ $trainingEnroll->subtitle }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}
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
    <section id="teacher" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 75px; @endif">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="title">
                        <p>FIND All <span>GOVERNING BODY</span></p>
                        <h3>The distinguished members of <b>Governing Body</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-12"> --}}
                    {{-- <div class="owl-carousel owl-theme"> --}}
                        @foreach($all as $single)
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="item">
                                <a href="{{ route('member.profile',$single->member->id) }}" style="text-decoration: none; color: black;">
                                    <img data-src="{{asset('public/upload/members/'.$single->member->image)}}" class="lazyload w-100" style="height: 250px;"/>
                                    <div class="content" style="text-align: center;">
                                        <h5>{{ $single->member->name }}</h5>
                                        <p>{{ $single->designation }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    {{-- </div>
                </div> --}}
            </div>
            @php
            $last = \App\Model\GoverningBody::latest()->first();
            // dd($last);
            @endphp
            @if(@$last['updated_at'])
            <div style="margin-top: 2px;color: #070101;">
                Updated at {{date('d-M-Y',strtotime(@$last['updated_at']))}}
                </div>
            </div>
            @endif
        </div>
    </section>
@include('frontend.layouts.footer')
@endsection