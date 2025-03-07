@extends('frontend.layouts.index') 
@section('content')
@include('frontend.layouts.header')
@include('frontend.layouts.slider')
<style type="text/css">
    @media (max-width: 320px) {
        .video_div{
            display: none;
        }
        #search .search form input{
            width: 100%;
            display: inline-block;
            border: 0;
            border-radius: 0;
        }

        #search .search form button {
            border-radius: 0;
            border: 0;
            margin-top: 2px;
            margin-left: 0px;
            /* margin-left: -4px; */
            width: 100%;
            background: #ff0aca;
        }
}
</style>
<section id="partnership">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    @php
                     $partnershipTagline = DB::table('taglines')->where('module_name','Partnership')->first();
                    @endphp
                    <h5><p style="text-transform: uppercase;">{{ $partnershipTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $partnershipTagline->first_line_second_part }}</b></p></h5>
                    <h3>{{ $partnershipTagline->second_line_first_part }} <b>{{ $partnershipTagline->second_line_second_part }}</b></h3>
                </div>
            </div>
        </div>
        <div class="partner">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($partnership as $list)
                        
                            <a href="{{ route('partnership',$list->id) }}"> <img src="{{asset('public/upload/partnership/'.$list->image)}}" alt="Partner" /> </a>
                       
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="offer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    @php
                     $offerTagline = DB::table('taglines')->where('module_name','Offer')->first();
                    @endphp
                    <h5><p style="text-transform: uppercase;">{{ $offerTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $offerTagline->first_line_second_part }}</b></p></h5>
                    <h3>{{ $offerTagline->second_line_first_part }} <b>{{ $offerTagline->second_line_second_part }}</b></h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($offer as $key => $list)
            @if($key % 2 == 0)
            <div class="col-sm-12 col-md-4 col-lg-4">
                @endif
                <div class="offer">
                    <div class=""><img src="{{asset('public/upload/offer/'.$list->image)}}" alt="Offer" style="width: 70px;height: 70px;" /></div>
                    <h3>{{$list->title}}</h3>
                    <p style="margin-bottom: auto;">{!! $list->short_description !!}</p>
                    <a class="read-more" href="{{ !empty($list->offer_url) ? route('offer_url',['url'=>$list->offer_url,'id'=>$list->id]) : route('offer',$list->id)}}">Read More ...</a>
                    {{-- <li><a href="{{($getInTouch->link)?route('get_in_touch',['url'=>$getInTouch->link,'id'=>$getInTouch->id]):'#'}}">{{ $getInTouch->title }}</a></li> --}}
                    <style>
                        a:hover {
                            color: #1d68a7;
                            text-decoration: none;
                        }
                    </style>
                </div>
                @if($key % 2 != 0)
            </div>
            @endif
            @endforeach
            <div class="col-sm-12 col-md-4 col-lg-4 video_div">
                <div class="video">
                    <button hidden class="btn" id="play-button">play</button>
                    <button hidden class="btn" id="pause-button">pause</button>
                    {{--<i class="fas fa-play"></i></i> --}}
                    @php
                    $offerVideo = \App\Model\OfferBackgroundVideo::first();
                    // if(!empty($offerVideo->youtube_link))
                    // {
                    //     $str = $offerVideo->youtube_link;
                    //     $exp = explode('/',$str);
                    //     $len = count($exp);
                    //     // dd($exp[$len-1]);
                    // }
                    
                    // $sliderVideo = DB::table('slider_videos')->first();
                    
                    @endphp
                    
                    <video id="videoTagVideo" loop autoplay muted style="width: 100%;border-top-left-radius: 5000px;border-bottom-left-radius: 5000px" > 
                        <source src="{{!empty($offerVideo->offer_video)? asset('public/upload/offer_video/'.$offerVideo->offer_video) : '' }}">
                        Your browser does not support the video tag.
                    </video>
                    {{-- <a> --}}
                        {{-- <iframe id="myVideo" preload="none" style="border-top-left-radius: 5000px;border-bottom-left-radius: 5000px;" width="450vw" height="350vw" src="https://www.youtube.com/embed/Fb57AZ8wBtU?playlist=Fb57AZ8wBtU&loop=1&enablejsapi=1&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                        {{-- @if(!empty($offerVideo->youtube_link))
                        <iframe id="myVideo" preload="none" style="border-top-left-radius: 5000px;border-bottom-left-radius: 5000px;pointer-events:none;" width="100%;" height="350vw" src="{{ !empty($offerVideo->youtube_link) ? $offerVideo->youtube_link : '' }}?playlist={{ !empty($exp) ? $exp[$len-1] : '' }}&loop=1&enablejsapi=1&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow=""></iframe> --}}
                        {{-- <iframe id="myVideo" preload="none" style="border-top-left-radius: 5000px;border-bottom-left-radius: 5000px;pointer-events:none;" width="100%;" height="350vw" src="https://www.youtube.com/embed/Fb57AZ8wBtU?playlist=Fb57AZ8wBtU&loop=1&enablejsapi=1&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow=""></iframe> --}}
                        {{-- @endif --}}
                    {{-- </a> --}}
                </div>
                {{-- <video id="videoTag" width="320" height="240" controls src="https://www.youtube.com" preload="auto" autoplay loop>
                    Your browser does not support the video tag.
                  </video> --}}
                <style>
                    /* #offer .video {
                        background: url(../images/offer-video.png) !important;
                    } */
                    #offer .video {
                        position: absolute;
                        top: 0;
                        right: 0;
                        /* background: url({{ asset('public/frontend/images/visit-bigm.png') }}); */
                        background: url(https://www.youtube.com/watch?v=Fb57AZ8wBtU&t=2s);
                        background-position: right;
                        background-position-y: 58%;
                        background-repeat: no-repeat;
                        background-size: contain;
                        /* width: 33%;
                        height: 100%; */
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                    }
                </style>
            </div>
        </div>
    </div>
</section>
<section id="feature">
    <div class="container-flutter">
        <div class="row m-0 p-0">
            {{-- @php
                $features = DB::table('features')->get();
            @endphp --}}
            @foreach($features as $key => $feature)
            <a href="{{ $feature->feature_url ? route('feature_url',['url'=>$feature->feature_url,'id'=>$feature->id]) : '#' }}" class="col-sm-12 col-md-3 col-lg-3 m-0 p-0">
                <div>
                    <div class="feature @if((($key+1) % 4 == 1 )) left @elseif((($key+1) % 4 == 2)) mid1 @elseif((($key+1) % 4 == 3)) mid2 @elseif((($key+1) % 4 == 0)) right @endif">
                        <div class="icon"><img src="{{asset('public/upload/features/'.$feature->image)}}" alt="Programs" /></div>
                        <h3>{{ $feature->title }}</h3>
                        <p>{!! $feature->description !!}</p>
                    </div>
                </div>
            </a>
            @endforeach
            {{-- <div class="col-sm-12 col-md-3 col-lg-3 m-0 p-0">
                <div class="feature left">
                    <div class="icon"><img src="{{asset('public/frontend/')}}/images/education.png" alt="Addmission" /></div>
                    <h3>Addmission</h3>
                    <p>We have students coming from different backgrounds, cultures, and nationalities as well. More than 500 international students are enrolled in various programs.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 m-0 p-0">
                <div class="feature mid1">
                    <div class="icon"><img src="{{asset('public/frontend/')}}/images/book.png" alt="Programs" /></div>
                    <h3>Programs</h3>
                    <p>We have students coming from different backgrounds, cultures, and nationalities as well. More than 500 international students are enrolled in various programs.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 m-0 p-0">
                <div class="feature mid2">
                    <div class="icon"><img src="{{asset('public/frontend/')}}/images/knowledge.png" alt="Tuition Fees" /></div>
                    <h3>Tuition Fees</h3>
                    <p>We have students coming from different backgrounds, cultures, and nationalities as well. More than 500 international students are enrolled in various programs.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 m-0 p-0">
                <div class="feature right">
                    <div class="icon"><img src="{{asset('public/frontend/')}}/images/scholarship.png" alt="Scholarship" /></div>
                    <h3>Scholarship</h3>
                    <p>We have students coming from different backgrounds, cultures, and nationalities as well. More than 500 international students are enrolled in various programs.</p>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<section id="training">
    @php
        $trainingBackground = App\Model\TrainingBackground::first();
    @endphp
    <style>
        #training {
            /* background: url(../images/traning.png);
            background-image: url(../images/traning.png); */
            /* background: url({{asset('public/upload/training_enroll/'.@$trainingBackground->image)}}); */
             background-image: url({{asset('public/upload/training_enroll/'.@$trainingBackground->image)}}); 
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="title text-white">
                    @php
                     $trainingTagline = DB::table('taglines')->where('module_name','Training')->first();
                    @endphp
                    <h5><p style="text-transform: uppercase;">{{ $trainingTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $trainingTagline->first_line_second_part }}</b></p></h5>
                    <h3>{{ $trainingTagline->second_line_first_part }} <b>{{ $trainingTagline->second_line_second_part }}</b></h3>
                </div>
            </div>
            <style>
                #training_read_more_button:hover {
                    color: #fff !important;
                    background-color: #0b5ed7 !important;
                    border-color: #0a58ca !important;
                }
            </style>
            <div class="col-4 read-more">
            <a id="training_read_more_button" href="{{ route('training_enroll_all') }}" style="color: white !important;background-color: #00000033;" class="btn btn-sm btn-primary" type="submit">READ MORE <i class="fas fa-angle-right"></i></a>
            </div>
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
<section id="search">
    <div class="container">
        <div class="category-search">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 text-white">
                    <h2>If you didn’t find your choose<br/>
                    category search here</h2>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 text-white">
                    <div class="search">
                        {{-- <form action="{{ route('search') }}" class="form-inline" method="GET">
                                <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-primary" type="submit">Search</button>
                        </form> --}}
                        <form action="{{ route('search') }}" method="GET" class="form-inline">
                            <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-7">
                <img src="{{asset('public/upload/about/'.@$about->image)}}" class="w-100" alt="About" />
                <div class="title mt-3 mb-0">
                    <p>About <b>BIGM</b></p>
                    <h3><b>{{@$about->title}}</b></h3>
                </div>
                <p><?php echo @$about->short_description;?></p>
                <a class="btn btn-sm btn-primary" href="{{route('about',$about->id)}}">READ MORE <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5">
                @foreach($director as $list)
                <h5 class="p-2 bg-light mb-3">{{$list->title}}</h5>
                <div class="director-info">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{asset('public/upload/director/'.$list->image)}}" class="w-100" alt="Director" />
                        </div>
                        <div class="col-7">
                            <p><?php echo $list->short_description; ?></p>
                            <a href="{{route('director',$list->id)}}">READ MORE</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @php
    $ourResearches = \App\Model\OurResearch::orderBy('sort_order')->get();
    $researchBackground = \App\Model\ResearchBackground::first();
    @endphp
    @if(@$researchBackground->show_section == 1)
    <section id="facilities" class="our_research">
        @if(@$researchBackground->show_status == 1)
            <style>
                .our_research {
                    background-image: url({{asset('public/upload/our_research/'.@$researchBackground->image)}});
                }
            </style>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @php
                            $researchTagline = DB::table('taglines')->where('module_name','Our Research')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $researchTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $researchTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $researchTagline->second_line_first_part }} <b>{{ $researchTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($ourResearches as $ourResearch)
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="facility">
                        <img src="{{asset('public/upload/our_research/'.@$ourResearch->image)}}" class="w-100" height="150px;" alt="" />
                        <h3>{{ @$ourResearch->title }}</h3>
                        <a class="btn btn-sm btn-primary" href="{{ route('our_research',@$ourResearch->id) }}">Read More <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
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
    <section id="news-event-notice">
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
                    {{-- <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                            @foreach($news as $list)
                            <p class="content">{{$list->title}}</p>
                            <p class="date">{{date('d-M-Y',strtotime($list->date))}}</p>
                            <a class="read-more" href="{{route('news',$list->id)}}">Read More ...</a>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                            <a class="btn btn-outline-success" href="{{route('news-all')}}">VIEW ALL NEWS</a>
                        </div>
                        <div class="tab-pane fade" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
                            @foreach($event as $list)
                            <p class="content">{{$list->title}}</p>
                            <p class="date">{{date('d-M-Y',strtotime($list->date))}}</p>
                            <a class="read-more" href="{{route('event',$list->id)}}">Read More ...</a>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                            <a class="btn btn-outline-primary" href="{{route('event-all')}}">VIEW ALL EVENT</a>
                        </div>
                        <div class="tab-pane fade" id="pills-notice" role="tabpanel" aria-labelledby="pills-notice-tab">
                            @foreach($notice as $list)
                            <p class="content">{{$list->title}}</p>
                            <p class="date">{{date('d-M-Y',strtotime($list->date))}}</p>
                            <a class="read-more" href="{{route('notice',$list->id)}}">Read More ...</a>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                            <a class="btn btn-outline-warning" href="{{route('notice-all')}}">VIEW ALL NOTICE</a>
                        </div>
                    </div> --}}
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                            @foreach($news as $list)
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{asset('public/upload/news/'.$list->image)}}" style="width: 100%;" alt=""/>
                                </div>
                                <div class="col-md-9">
                                    <p class="">{{$list->title}}</p>
                                    <p class="" style="font-size: 12px;">{{$list->short_description}}</p>
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
                                    <p class="" style="font-size: 12px;">{{$list->short_description}}</p>
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
                                    <p class="" style="font-size: 12px;">{!!$list->short_description!!}</p>
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
    <section id="facilities">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @php
                        $facilitiesTagline = DB::table('taglines')->where('module_name','Facilities')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $facilitiesTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $facilitiesTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $facilitiesTagline->second_line_first_part }} <b>{{ $facilitiesTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($facility as $list)
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="facility">
                        <img src="{{asset('public/upload/facility/'.@$list->image)}}" class="w-100" alt="BIGM Facilities" />
                        <h3>{{@$list->title}}</h3>
                        @if(@$list['short_description'])
                            <div style="text-align: justify;" style="max-width: 100%;width: 100%;">
                            {!! @$list['short_description'] !!}
                            </div>
                        @endif
                        <a class="btn btn-sm btn-primary" href="{{route('facility',$list->id)}}">READ MORE <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <section id="number-counter">
        @php
        $counterBackground = App\Model\CounterBackground::first();
        @endphp
        @if(@$counterBackground->show_status == 1)
            <style>
                #number-counter {
                    background: url({{asset('public/upload/counter/'.@$counterBackground->image)}});
                }
            </style>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="video mt-3">
                        {{-- <a target="_blank" href="https://www.youtube.com/watch?v=KGUUWufvu6E"><i class="fas fa-play"></i></i></a> --}}
                        <a target="_blank"><i class="fas fa-play"></i></i></a>
                    </div>
                    <a href="{{ route('alumni') }}"><h3>Bangladesh Institute of Governance and Management</h3></a>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <a href="{{ route('alumni') }}">
                    <div class="row"  id="counter">
                        @foreach($counterBox as $counter)
                        <div class="col-md-6">
                            <div class="counter-box">
                                <span class="counter counter-value" data-count="{{ $counter->counter_number }}">0</span>
                                <p>{{ $counter->counter_title }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @php
    $ourDevelopments = \App\Model\OurDevelopment::orderBy('sort_order')->get();
    $developmentBackground = \App\Model\DevelopmentBackground::first();
    @endphp
    @if(@$developmentBackground->show_section == 1)
    <section id="facilities" class="our_development">
        @if(@$developmentBackground->show_status == 1)
            <style>
                .our_development {
                    background-image: url({{asset('public/upload/our_development/'.@$developmentBackground->image)}});
                }
            </style>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @php
                            $developmentTagline = DB::table('taglines')->where('module_name','Our Development')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $developmentTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $developmentTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $developmentTagline->second_line_first_part }} <b>{{ $developmentTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($ourDevelopments as $ourDevelopment)
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="facility">
                        <img src="{{asset('public/upload/our_development/'.@$ourDevelopment->image)}}" class="w-100" height="176px;" alt="BIGM DEVELOPMENT" />
                        <h3>{{ @$ourDevelopment->title }}</h3>
                        <a class="btn btn-sm btn-primary" href="{{ route('our_development',@$ourDevelopment->id) }}">Read More <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section id="activities">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @php
                        $activitiesTagline = DB::table('taglines')->where('module_name','Activities')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $activitiesTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $activitiesTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $activitiesTagline->second_line_first_part }} <b>{{ $activitiesTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($activity as $list)
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="activity">
                        <img src="{{asset('public/upload/activity/'.$list->image)}}" class="w-100" alt="Activities" style="height: 146px;" />
                        <p style="color: black !important;">{{date('d M Y',strtotime($list->date))}}</p>
                        <a style="text-decoration: none; color: black;" href="{{route('activity',$list->id)}}">
                            <h3>{{$list->title}}</h3>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @php
    $ourLibraries = \App\Model\OurLibrary::orderBy('sort_order')->get();
    $libraryBackground = \App\Model\LibraryBackground::first();
    @endphp
    @if(@$libraryBackground->show_section == 1)
    <section id="facilities" class="our_library">
        @if(@$libraryBackground->show_status == 1)
            <style>
                .our_library {
                    background-image: url({{asset('public/upload/our_library/'.@$libraryBackground->image)}});
                }
            </style>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @php
                            $libraryTagline = DB::table('taglines')->where('module_name','Our Library')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $libraryTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $libraryTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $libraryTagline->second_line_first_part }} <b>{{ $libraryTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($ourLibraries as $ourLibrary)
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="facility">
                        <img src="{{asset('public/upload/our_library/'.@$ourLibrary->image)}}" class="w-100" height="174px" alt="BIGM LIBRARY" />
                        <h3>{{ @$ourLibrary->title }}</h3>
                        <a class="btn btn-sm btn-primary" href="{{ route('our_library',@$ourLibrary->id) }}">Read More <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <section id="teacher">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="title">
                        @php
                        $advisorTagline = DB::table('taglines')->where('module_name','Advisor')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $advisorTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $advisorTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $advisorTagline->second_line_first_part }} <b>{{ $advisorTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        {{-- @php dd($advisor); @endphp --}}
                        {{-- style="background: unset;"
                        style="border-bottom: unset;" --}}
                        @foreach($advisor as $list)
                        <div class="item">
                            <a href="{{route('member.profile',$list['member']['id'])}}" style="text-decoration: none; color: black;">
                            <img style="height: 300px" src="{{asset('public/upload/members/'.$list['member']['image'])}}" class="w-100" alt="Teacher" />
                            <div class="content">
                                <h4 style="height: 50px;">{{$list['member']['name']}}</h4>
                                <p style="height: 60px;">{{$list['member']['member_designation']}}, {{$list['member']['work_place']}}</p>
                            </div>
                                
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
    $ourCampuses = \App\Model\OurCampus::orderBy('sort_order')->get();
    $campusBackground = \App\Model\CampusBackground::first();
    @endphp
    @if(@$campusBackground->show_section == 1)
    <section id="partnership" class="our_campus">
        @if(@$campusBackground->show_status == 1)
            <style>
                .our_campus {
                    background-image: url({{asset('public/upload/our_campus/'.@$campusBackground->image)}});
                }
            </style>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @php
                            $campusTagline = DB::table('taglines')->where('module_name','Our Campus')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $campusTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $campusTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $campusTagline->second_line_first_part }} <b>{{ $campusTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="partner">
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            {{-- @foreach($partnership as $list)
                            
                                <a href="{{ route('partnership',$list->id) }}"> <img src="{{asset('public/upload/partnership/'.$list->image)}}" alt="Partner" /> </a>
                           
                            @endforeach --}}
                            @foreach($ourCampuses as $ourCampus)
                            <a href="{{ route('our_campus',$ourCampus->id) }}"> <img src="{{asset('public/upload/our_campus/'.@$ourCampus->image)}}" alt="" /> </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @php
    $alumniBackground = App\Model\AlumniBackground::first();
    @endphp
    @if(@$alumniBackground->show_section == 1)
    <section id="alumni">
        @if(@$alumniBackground->show_status == 1)
            <style>
                #alumni {
                    background: url({{asset('public/upload/alumni/'.@$alumniBackground->image)}});
                    background-repeat: no-repeat;
                    background-size: cover;
                    /* padding-top: 80px;
                    padding-bottom: 50px;
                    background: #002D67;
                    color: #fff; */
                }
            </style>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @php
                    $alumniTagline = DB::table('taglines')->where('module_name','Alumni')->first();
                    @endphp
                    <div class="title text-center">
                        <h3>Alumni</h3>
                        <p>{{ $alumniTagline->first_line_first_part }} 
                        <br>{{ $alumniTagline->second_line_first_part }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($alumnies as $alumni)
                        {{-- <div class="col-sm-12 col-md-3 col-lg-3"> --}}
                            <div class="alumni">
                                <img src="{{ asset('public/upload/alumni/'.$alumni->image) }}" class="w-100" height="300px;" alt="Activities" />
                                <h3>{{ $alumni->title }}</h3>
                                <p>{{ $alumni->subtitle }} </p>
                            </div>
                        {{-- </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @php
    $feedbackBackground = App\Model\FeedbackBackground::first();
    @endphp
    @if(@$feedbackBackground->show_section == 1)
    <section id="student-say">
        @if(@$feedbackBackground->show_status == 1)
            <style>
                #student-say {
                    background-image: url({{asset('public/upload/student_feedbacks/'.@$feedbackBackground->image)}});
                }
            </style>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @php
                        $feedbacksTagline = DB::table('taglines')->where('module_name','Feedbacks')->first();
                        @endphp
                        <h5><p style="text-transform: uppercase;">{{ $feedbacksTagline->first_line_first_part }} <b style="text-transform: uppercase;">{{ $feedbacksTagline->first_line_second_part }}</b></p></h5>
                        <h3>{{ $feedbacksTagline->second_line_first_part }} <b>{{ $feedbacksTagline->second_line_second_part }}</b></h3>
                    </div>
                </div>
            </div>
            @foreach($studentFeedbacks as $studentFeedback)
            <script>
                function open_feedback_custom_modal_{{ $studentFeedback->id }}() {
                    var element = document.getElementById("feedback-custom-modal-{{ $studentFeedback->id }}");
                    element.style.cssText += '-webkit-transition:-webkit-transform .7s ease;transition:-webkit-transform .7s ease;transition:transform .7s ease;transition:transform .7s ease,-webkit-transform .7s ease';
                    element.classList.add("show");
                }
                function close_feedback_custom_modal_{{ $studentFeedback->id }}() {
                    var element = document.getElementById("feedback-custom-modal-{{ $studentFeedback->id }}");
                    element.classList.remove("show");
                }
            </script>
            <div class="custom-modal" id="feedback-custom-modal-{{ $studentFeedback->id }}">
                <div class="container-fluid">
                    <div class="custom-modal-body">
                        <button onclick="close_feedback_custom_modal_{{ $studentFeedback->id }}()" type="button" class="btn btn-sm shadow-none">{{--<i class="mdi mdi-24px mdi-close"></i>--}}<i class="far fa-window-close fa-2x"></i></button> <!----> <!----> <!----> 
                        <div>
                            <h4 class="text-center">
                                <span class="text-success">{{ $studentFeedback->title }}</span>
                                <p>{{ $studentFeedback->subtitle }} </p>
                            </h4> 
                            <p>{!! $studentFeedback->long_description??'Do not have any Description' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($studentFeedbacks as $studentFeedback)
                        
                        <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 82px;">
                            <div class="student">
                                <div class="head">
                                    <img src="{{ asset('public/upload/student_feedbacks/'.$studentFeedback->image) }}" alt="Activities" />
                                    <div class="icon"><i class="fas fa-quote-right"></i></div>
                                </div>
                                <div class="content">
                                    <p>{!! $studentFeedback->description !!}
                                        {{-- <a class="read-more text-center" role="button" title="{!! strip_tags($studentFeedback->long_description) !!}" data-toggle="popover" data-container="body" data-placement="top" data-trigger="focus" data-html="true" data-content="hlw">Read More ...</a> --}}
                                        {{-- <a tabindex="0" class="read-more text-center" role="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true"  data-bs-placement="top" data-bs-trigger="focus" data-bs-content="{!! strip_tags($studentFeedback->long_description??'Do not have any Description') !!}">
                                          Read More ...
                                        </a> --}}
                                        <a onclick="open_feedback_custom_modal_{{ $studentFeedback->id }}()" class="read-more text-center" role="button">
                                            Read More ...
                                        </a>
                                      {{-- <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Dismissible popover" data-bs-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a> --}}
                                    </p>
                                    <style>
                                        a:hover {
                                            color: #1d68a7;
                                            text-decoration: none;
                                        }
                                    </style>
                                    <h3>{{ $studentFeedback->title }}</h3>
                                    <p class="designation">{{ $studentFeedback->subtitle }} </p>

                                    {{-- <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span> --}}
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @include('frontend.layouts.footer')

    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                html: true,
                container: 'body',
            });
        });
    </script>

    <script>
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5,
        };
        let callback = (entries, observer)=>{
            entries.forEach(entry => {
                console.log(entry.target.id);
                if(entry.target.id == 'videoTagVideo')
                {
                    console.log(entry.target);
                    if(entry.isIntersecting){
                        entry.target.play();
                    }
                    else {
                        entry.target.pause();
                    }
                }
            });
        }
        let observer = new IntersectionObserver(callback, options);
        observer.observe(document.querySelector('#videoTagVideo'));
    </script>
    {{-- <script>
        // Inject YouTube API script
        var tag = document.createElement('script');
        tag.src = "//www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;

        function onYouTubePlayerAPIReady() {
            // create the global player from the specific iframe (#video)
            player = new YT.Player('myVideo', {
                events: {
                // call this function when player is ready to use
                'onReady': onPlayerReady
                }
            });
        }
        function onPlayerReady(event) {
  
            // bind events
            var playButton = document.getElementById("play-button");
            playButton.addEventListener("click", function() {
                player.playVideo();
            });
            
            var pauseButton = document.getElementById("pause-button");
            pauseButton.addEventListener("click", function() {
                player.pauseVideo();
            });
        }
        setTimeout(function(){
            //alert("pause video!"); 
            document.getElementById("pause-button").click();
        }, 3000);//wait 3 seconds

        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1,
        };
        let callback = (entries, observer)=>{
            entries.forEach(entry => {
                //console.log(entry.target.id);
                if(entry.target.id == 'myVideo')
                {
                    //console.log(entry.target);
                    // alert(entry.intersectionRatio);
                    if(entry.isIntersecting){
                        //alert("shown");
                        //entry.target.play();
                        document.getElementById("play-button").click();
                    }
                    else {
                        //alert("gone");
                        //entry.target.pause();
                        document.getElementById("pause-button").click();
                    }
                }
            });
        }
        let observer = new IntersectionObserver(callback, options);
        observer.observe(document.querySelector('#myVideo'));
    </script> --}}

    <style>
        /*! CSS Used from: /public/css/frontend_app.css */
h4{margin-top:0;margin-bottom:.5rem;}
p{margin-top:0;margin-bottom:1rem;}
button{border-radius:0;}
button:focus{outline:1px dotted;outline:5px auto -webkit-focus-ring-color;}
button{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
button{overflow:visible;}
button{text-transform:none;}
[type=button],button{-webkit-appearance:button;}
[type=button]::-moz-focus-inner,button::-moz-focus-inner{padding:0;border-style:none;}
h4{margin-bottom:.5rem;font-weight:500;line-height:1.2;}
h4{font-size:1.5rem;}
.container-fluid{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto;}
.btn{display:inline-block;font-weight:400;color:#212529;text-align:center;vertical-align:middle;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem;-webkit-transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
@media (prefers-reduced-motion:reduce){
.btn{-webkit-transition:none;transition:none;}
}
.btn:hover{color:#212529;text-decoration:none;}
.btn:focus{outline:0;box-shadow:0 0 0 .2rem rgba(109,200,190,.25);}
.btn:disabled{opacity:.65;}
.btn-sm{padding:.25rem .5rem;font-size:.875rem;}
.shadow-none{box-shadow:none!important;}
.text-center{text-align:center!important;}
.text-success{color:#007f3d!important;}
@media print{
*,:after,:before{text-shadow:none!important;box-shadow:none!important;}
p{orphans:3;widows:3;}
}
.mdi:before{display:inline-block;font:normal normal normal 24px/1 Material Design Icons;font-size:inherit;text-rendering:auto;line-height:inherit;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
.mdi-close:before{content:"\F156";}
.mdi-24px.mdi:before{font-size:24px;}
*,:after,:before{padding:0;margin:0;box-sizing:border-box;}
:focus{outline:none;}
.btn-sm{padding:.25rem .5rem!important;font-size:.875rem!important;line-height:1.5;border-radius:.2rem;}
button:focus{outline:none;}
@media (max-width:768px){
.btn-sm{padding:5px 3px!important;margin-left:3px!important;}
}
.custom-modal{top:0;left:0;display:-webkit-box;display:flex;-webkit-box-align:center;align-items:center;-webkit-box-pack:center;justify-content:center;}
.custom-modal{position:fixed;right:0;bottom:0;z-index:9999;width:100%;height:100vh;-webkit-transform:scale(0);transform:scale(0);/*-webkit-transition:-webkit-transform .7s ease;transition:-webkit-transform .7s ease;transition:transform .7s ease;transition:transform .7s ease,-webkit-transform .7s ease;*/}
.custom-modal.show{-webkit-transform:scale(1);transform:scale(1);}
.custom-modal .custom-modal-body{position:relative;max-width:980px;max-height:100vh;overflow-y:auto;overflow-x:hidden;background:#f4f4f4;border:5px solid #007f3d;border-radius:10px;padding:1rem;margin:1rem auto;}
/*! CSS Used from: Embedded */
.text-center{text-align:center;}
/*! CSS Used from: Embedded */
p{padding:0;}
/*! CSS Used from: Embedded */
p{margin:0;}
.text-center{text-align:center;}
/*! CSS Used from: Embedded */
.custom-modal-body button{float:right;}
/*! CSS Used from: Embedded */
p{padding:0;}
/*! CSS Used from: Embedded */
p{padding:0;}
    </style>

    @endsection