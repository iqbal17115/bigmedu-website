@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<section id="partnership">
    <div class="container">
      {{-- @php dd(@$find_post->getTable()); @endphp --}}
        

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

        @if(@$find_post['image'])
        <div class="container">
          <div style="text-align: center;">
            @if(@$find_post->getTable() == 'directors')
            <img src="{{asset('public/upload/director/'.$find_post->image)}}" alt=""/>
            @elseif(@$find_post->getTable() == 'news')
            <img src="{{asset('public/upload/news/'.$find_post->image)}}" alt=""/>
            @elseif(@$find_post->getTable() == 'facilities')
            <img src="{{asset('public/upload/facility/'.$find_post->image)}}" alt=""/>
            @elseif(@$find_post->getTable() == 'activities')
            <img src="{{asset('public/upload/activity/'.$find_post->image)}}" alt=""/>
            @elseif(@$find_post->getTable() == 'library_news')
            <img src="{{asset('public/upload/library/library_news/'.$find_post->image)}}" alt=""/>
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
        <br>

        

        @if(@$find_post['description'])
        <div class="container">
          <div style="text-align: justify;">
          {!! @$find_post['description'] !!}
          </div>
        </div>
        @endif

        @if(@$find_post['long_description'])
        <div class="container">
          <div style="text-align: justify;">
          {!! @$find_post['long_description'] !!}
          </div>
        </div>
        @endif

    </div>
</section>

@include('frontend.layouts.footer')
@endsection