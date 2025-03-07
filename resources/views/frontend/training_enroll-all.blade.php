@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

    <section id="training">
        @php
        $trainingBackground = App\Model\TrainingBackground::first();
        @endphp
        <style>
            #training {
                background-image: url({{asset('public/upload/training_enroll/'.$trainingBackground->image)}}) !important;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="title text-white">
                        <p>FIND PERFECT <span>TRAINING</span></p>
                        <h3>Check All <b>Training & Enroll</b></h3>
                    </div>
                </div>
                {{-- <div class="col-4 read-more">
                <a href="{{ route('training_enroll_all') }}" class="btn btn-sm btn-primary" type="submit">READ MORE <i class="fas fa-angle-right"></i></a href="">
                </div> --}}
            </div>
            <div class="row">
                {{-- @php
                    $trainingEnrolls = DB::table('training_enrolls')->get();
                @endphp --}}
                @foreach($trainingEnrolls as $trainingEnroll)
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <a href="{{ $trainingEnroll->training_url ? route('training_url',['url'=>$trainingEnroll->training_url,'id'=>$trainingEnroll->id]) : '#' }}" style="color: #212529 !important;">
                        <div class="enroll text-center">
                            <div class="icon"><img src="{{ asset('public/upload/training_enroll/'.$trainingEnroll->image) }}" alt="" /></div>
                            <h3>{{ $trainingEnroll->title }}</h3>
                            <p>{{ $trainingEnroll->subtitle }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
    
        </div>
    </section>
@include('frontend.layouts.footer')
@endsection