@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<section id="partnership">
    <div class="container">
        {{-- <div class="row">
            <div class="col-12">
                <div class="title">
                  @if(@$singleOffer['title'])
                  <h3 class="text-center">{{@$singleOffer['title']}}</b></h3>
                  @endif
                  @if(@$singleOffer['title_en'])
                  <h3 class="text-center">{{@$singleOffer['title_en']}}</b></h3>
                  @endif
                    <hr>
                </div>
            </div>
        </div> --}}

        {{-- @if(@$singleOffer['date'])
        <div class="container">
          <div style="text-align: justify;">
          {{date('d-M-Y',strtotime(@$singleOffer['date']))}}
          </div>
        </div>
        <br>
        @endif --}}

        {{-- @if(@$singleOffer['description'])
        <div class="container">
          <div style="text-align: justify;">
          {!! @$singleOffer['description'] !!}
          </div>
        </div>
        @endif --}}

        @if(@$singleOffer['long_description'])
        <div class="container">
          <div style="text-align: justify;">
            {{-- <div class=""><img src="{{asset('public/upload/offer/'.$singleOffer->image)}}" alt="Offer" style="width: 70px;height: 70px;" /></div> --}}
            <h3>{{$singleOffer->title}}</h3>
            {!! @$singleOffer['long_description'] !!}
          </div>
        </div>
        @endif

    </div>
</section>

@include('frontend.layouts.footer')
@endsection