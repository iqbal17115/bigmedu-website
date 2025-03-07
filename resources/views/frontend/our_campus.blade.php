@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<section id="partnership">
    <div class="container">
        {{-- <div class="row">
            <div class="col-12">
                <div class="title">
                  @if(@$find_post['title'])
                  <h3 class="text-center">{{@$find_post['title']}}</b></h3>
                  @endif
                  @if(@$find_post['title_en'])
                  <h3 class="text-center">{{@$find_post['title_en']}}</b></h3>
                  @endif
                    <hr>
                </div>
            </div>
        </div> --}}

        {{-- @if(@$singlePartnership['image'])
          <div class="partner" style="display: block; margin-left: auto; margin-right: auto;">
            <div class="col-sm-12 col-md-2 col-lg-2">
              <img src="{{asset('public/upload/partnership/'.$singlePartnership->image)}}" alt="Partner"/>
            </div>
          </div>
        <br>
        @endif --}}

        {{-- @if(@$find_post['description'])
        <div class="container">
          <div style="text-align: justify;">
          {!! @$find_post['description'] !!}
          </div>
        </div>
        @endif --}}

        @if(@$ourCampus['description'])
        <div class="container">
          <div style="text-align: justify;">
          {!! @$ourCampus['description'] !!}
          </div>
        </div>
        @endif 

    </div>
</section>

@include('frontend.layouts.footer')
@endsection