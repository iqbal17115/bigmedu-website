@extends('frontend.layouts.index')
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
      {{-- @php dd(@$find_post->getTable()); @endphp --}}
      {{-- <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">{{@$find_post['title']}}</li>
      </ol> --}}

        <div class="row">
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
        </div>

        {{-- @if(@$find_post['file'])
          <div class="container">
            <div style="text-align: center;margin-top: 0px;margin-bottom: 10px;">
              <b style="font-size: 30px;">Download&nbsp;&nbsp;</b><a style="margin-bottom: 0px;" target="_blank" href="{{ asset('public/upload/news/'.@$find_post['file']) }}"><i class="fas fa-file-pdf fa-2x"></i></a>
            </div>
          </div>
        @endif --}}

        @if(@$find_post['image'])
        <div class="container">
          <div style="text-align: center;">
            @if(@$find_post->getTable() == 'directors')
            <img src="{{asset('public/upload/director/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'news')
            <img src="{{asset('public/upload/news/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'facilities')
            <img src="{{asset('public/upload/facility/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'activities')
            <img src="{{asset('public/upload/activity/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_researches')
            <img src="{{asset('public/upload/our_research/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_developments')
            <img src="{{asset('public/upload/our_development/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_libraries')
            <img src="{{asset('public/upload/our_library/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @elseif(@$find_post->getTable() == 'our_campuses')
            <img src="{{asset('public/upload/our_campus/'.@$find_post->image)}}" style="max-width: 80%;" alt=""/>
            @endif
          </div>
        </div>
        @endif
        @if(@$find_post['date'])
        <div class="container">
          <div style="text-align: center;margin-top: 2px;">
            {{date('d-M-Y',strtotime(@$find_post['date']))}}
            </div>
        </div>
        @endif
        {{-- <br> --}}

        

        @if(@$find_post['description'])
        <div class="container" style="max-width: 100%;width: 100%;">
          <div style="text-align: justify;" style="max-width: 100%;width: 100%;">
          {!! @$find_post['description'] !!}
          </div>
        </div>
        @endif

        {{-- @if(@$find_post['short_description'])
        <div class="container" style="max-width: 100%;width: 100%;">
          <div style="text-align: justify;" style="max-width: 100%;width: 100%;">
          {!! @$find_post['short_description'] !!}
          </div>
        </div>
        @endif --}}

        @if(@$find_post['long_description'])
        <div class="container">
          <div style="text-align: justify;">
          {!! @$find_post['long_description'] !!}
          </div>
        </div>
        @endif
        @if(@$find_post['file'])
          <div class="container">
            <div style="text-align: left;margin-top: 0px;margin-bottom: 10px;">
              <a style="margin-bottom: 0px;text-decoration: none;" target="_blank" href="{{ asset('public/upload/news/'.@$find_post['file']) }}"><b style="font-size: 30px;">Download&nbsp;&nbsp;</b><i class="fas fa-file-pdf fa-2x"></i></a>
            </div>
          </div>
          {{-- <a target="_blank" href="{{ asset('public/upload/news/'.@$find_post['file']) }}"><i class="fas fa-eye fa-2x"></i></a> --}}
        @endif

        @if(@$find_post['updated_at'])
        <div class="container">
          <div style="margin-top: 2px;color: #070101;text-align: right;">
            Updated at {{date('d-M-Y',strtotime(@$find_post['updated_at']))}}
            </div>
        </div>
        @endif

    </div>
</section>

@include('frontend.layouts.footer')
@endsection