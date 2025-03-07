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

<style>
    @media only screen and (min-width: 768px)
    {
      #news-event-notice #pills-tabContent img{
        height: 20vw !important;
      }
    }
    @media only screen and (max-width: 768px)
    {
      #news-event-notice #pills-tabContent img{
        height: 40vw !important;
      }
    }
  </style>
  
    <section id="news-event-notice" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 75px; @endif">
    <div class="container">
        <div class="row-">
            <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item news" role="presentation">
                        <button style="background: #00214D;" class="nav-link active" id="pills-news-tab" data-bs-toggle="pill" data-bs-target="#pills-news" type="button" role="tab" aria-controls="pills-news" aria-selected="true">Latest News</button>
                    </li>
                    <li class="nav-item event" role="presentation">
                        <button style="background: #004299;" class="nav-link" id="pills-event-tab" data-bs-toggle="pill" data-bs-target="#pills-event" type="button" role="tab" aria-controls="pills-event" aria-selected="false">Event</button>
                    </li>
                    <li class="nav-item notice" role="presentation">
                        <button style="background: #0058CC;" class="nav-link" id="pills-notice-tab" data-bs-toggle="pill" data-bs-target="#pills-notice" type="button" role="tab" aria-controls="pills-notice" aria-selected="false">Notice Board</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                        @foreach($news as $list)
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{asset('public/upload/news/'.$list->image)}}" style="width: 100%;" alt=""/>
                            </div>
                            <div class="col-md-9">
                                <p class="">{{$list->title}}</p>
                                <p class="">{{date('d-M-Y',strtotime($list->date))}}</p>
                                <a class="" href="{{route('news',$list->id)}}">Read More ...</a>
                            </div>
                        </div>
                        <hr/>
                        @endforeach
                        <div class="clearfix"></div>
                        <a class="btn btn-outline-success" href="{{route('news-all')}}">VIEW ALL NEWS</a>
                    </div>
                    <div class="tab-pane fade" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
                        @foreach($event as $list)
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{asset('public/upload/news/'.$list->image)}}" style="width: 100%;" alt=""/>
                            </div>
                            <div class="col-md-9">
                                <p class="">{{$list->title}}</p>
                                <p class="">{{date('d-M-Y',strtotime($list->date))}}</p>
                                <a class="" href="{{route('event',$list->id)}}">Read More ...</a>
                            </div>
                        </div>
                        <hr/>
                        @endforeach
                        <div class="clearfix"></div>
                        <a class="btn btn-outline-primary" href="{{route('event-all')}}">VIEW ALL EVENT</a>
                    </div>
                    <div class="tab-pane fade" id="pills-notice" role="tabpanel" aria-labelledby="pills-notice-tab">
                        @foreach($notice as $list)
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{asset('public/upload/news/'.$list->image)}}" style="width: 100%;" alt=""/>
                            </div>
                            <div class="col-md-9">
                                <p class="">{{$list->title}}</p>
                                <p class="">{{date('d-M-Y',strtotime($list->date))}}</p>
                                <a class="" href="{{route('notice',$list->id)}}">Read More ...</a>
                            </div>
                        </div>
                        <hr/>
                        @endforeach
                        <div class="clearfix"></div>
                        <a class="btn btn-outline-warning" href="{{route('notice-all')}}">VIEW ALL NOTICE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection