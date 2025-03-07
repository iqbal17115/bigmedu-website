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
    <section id="teacher">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="title">
                        <p>FIND All <span>MEMBERS</span></p>
                        <h3>The distinguished <b>Members</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-12"> --}}
                    {{-- <div class="owl-carousel owl-theme"> --}}
                        @foreach($all as $single)
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="item">
                                <img data-src="{{ asset('public/upload/members/'.$single->image) }}" class="lazyload w-100" style="height: 250px;"/>
                                <div class="content" style="text-align: center;">
                                <a href="{{ route('member.profile',$single->id) }}" style="color: black;"><h5 style="margin-top: 3%;margin-bottom: 3%;color: black;">{{ $single->name }}</h5></a>
                                </div>
                                    
                                </a>
                            </div>
                        </div>
                        @endforeach
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </section>
@include('frontend.layouts.footer')
@endsection