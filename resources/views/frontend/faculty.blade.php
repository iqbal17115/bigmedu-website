@extends('frontend.layouts.index') @section('content') 
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
@include('frontend.layouts.banner')
<!-- END SECTION BANNER -->

<style type="text/css">
    span.color{
        color: black;
    }
    nav > .nav.nav-tabs {
        border: none;
        color: #fff;
        background: #272e38;
        border-radius: 0;
    }
    
    nav > div a.nav-item.nav-link,
    nav > div a.nav-item.nav-link.active {
        border: none;
        padding: 18px 25px;
        color: #fff;
        background: #272e38;
        border-radius: 0;
    }
    
    nav > div a.nav-item.nav-link.active:after {
        content: "";
        position: relative;
        bottom: -56px;
        left: -10%;
        border: 15px solid transparent;
        border-top-color: #7b0100;
    }
    
    .tab-content {
        background: #fdfdfd;
        line-height: 25px;
        border: 1px solid #ddd;
        border-top: 5px solid #7b0100;
        border-bottom: 5px solid #7b0100;
        padding: 30px 25px;
        margin-top: 0px !important;
    }
    
    nav > div a.nav-item.nav-link:hover,
    nav > div a.nav-item.nav-link:focus {
        border: none;
        background: #7b0100;
        color: #fff;
        border-radius: 0;
        transition: background 0.20s linear;
    }
</style>
<!-- START SECTION TEACHER -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link {{(Route::current()->getName()=='faculty.onleave')
                        ?(''):'active'}}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Present</a>
                        <a class="nav-item nav-link {{(Route::current()->getName()=='faculty.onleave')
                        ?('active'):''}}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">On Leave</a>
                        <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                          <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>-->
                      </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade {{(Route::current()->getName()=='faculty.onleave')
                        ?(''):'show active'}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container">
                            @foreach($active_designation as $designation) 
                            @foreach($designation['teacher'] as $key => $p) 
                            @if($designation['name'] == 'Professor')
                            @if($key == 0)
                            <section>
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-8">
                                        <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">

                                            <div class="heading_s1 text-center milumax-border-faculty">
                                                <h2 class="post__title has-no-space-below"><span>Professors</span></h2>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </section>
                            <div class="row">
                                @endif
                                <div class="col-lg-3 col-sm-6">
                                    <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                        <div class="team_img">
                                            <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                @if(file_exists('public/upload/faculty/'.$p->image))
                                                src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                @else
                                                src="{{asset('public/frontend/images/profile.jpg')}}"
                                                @endif
                                                @else
                                                src="{{asset('public/frontend/images/profile.jpg')}}"
                                                @endif alt="team3"></a>
                                            </div>
                                            <div class="team_title radius_lbrb_10 text-center">
                                                <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                <span class="color">{{$designation['name']}}</span>
                                            </div>
                                            <div style="border-bottom: 1px solid #ddd;"></div>
                                            <div class="team_single_info">
                                                <h6 class="text-center">Contact info</h6>
                                                <ul class="contact_info list_none">

                                                    <li>
                                                        <span><i class="fa fa-envelope"></i></span>
                                                        <a href="">{{$p['email']}}</a>
                                                    </li>
                                                    {{--  @if($p->room) --}}
                                                    <li>
                                                        <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                        <p>{{$p->room}}</p>

                                                    </li>
                                                    {{-- @endif --}}
                                                    <li>
                                                        <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                        <p>{{$p['phone']}}</p>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-globe"></i></span>
                                                        <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                    </li>
                                                    <li>
                                                        <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                        <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                    </li>

                                                </ul>
                                                {{-- <ul class="list_none social_icons text-center">
                                                    <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                    <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                    <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                    <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                </ul> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif @endforeach @endforeach
                                </div>
                                @foreach($active_designation as $designation) 
                                @foreach($designation['teacher'] as $key => $p) 
                                @if($designation['name'] == 'Associate Professor')
                                @if($key == 0)
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                                                <div class="heading_s1 text-center milumax-border-faculty">
                                                    <h2 class="post__title has-no-space-below"><span>Associate Professors</span></h2>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                                <div class="row">

                                    @endif
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                            <div class="team_img">
                                                <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                    @if(file_exists('public/upload/faculty/'.$p->image))
                                                    src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                    @else
                                                    src="{{asset('public/frontend/images/profile.jpg')}}"
                                                    @endif
                                                    @else
                                                    src="{{asset('public/frontend/images/profile.jpg')}}"
                                                    @endif alt="team3"></a>
                                                </div>
                                                <div class="team_title radius_lbrb_10 text-center">
                                                    <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                    <span class="color">{{$designation['name']}}</span>
                                                </div>
                                                <div style="border-bottom: 1px solid #ddd;"></div>
                                                <div class="team_single_info">
                                                    <h6 class="text-center">Contact info</h6>
                                                    <ul class="contact_info list_none">

                                                        <li>
                                                            <span><i class="fa fa-envelope"></i></span>
                                                            <a href="">{{$p['email']}}</a>
                                                        </li>
                                                        {{--  @if($p->room) --}}
                                                        <li>
                                                            <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                            <p>{{$p->room}}</p>

                                                        </li>
                                                        {{-- @endif --}}
                                                        <li>
                                                            <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                            <p>{{$p['phone']}}</p>
                                                        </li>
                                                        <li>
                                                            <span><i class="fa fa-globe"></i></span>
                                                            <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                        </li>
                                                        <li>
                                                            <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                            <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                        </li>

                                                    </ul>
                                                    {{-- <ul class="list_none social_icons text-center">
                                                        <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                        <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                        <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                        <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                    </ul> --}}
                                                </div>
                                            </div>
                                        </div>
                                        @endif 
                                        @endforeach 
                                        @endforeach
                                    </div>
                                    @foreach($active_designation as $designation) 
                                    @foreach($designation['teacher'] as $key => $p)
                                    @if($designation['name'] == 'Assistant Professor')
                                    @if($key == 0)
                                    <section>
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">

                                                    <div class="heading_s1 text-center milumax-border-faculty">
                                                        <h2 class="post__title has-no-space-below"><span>Assistant Professors</span></h2>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </section>
                                    <div class="row">

                                        @endif
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                                <div class="team_img">
                                                    <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                        @if(file_exists('public/upload/faculty/'.$p->image))
                                                        src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                        @else
                                                        src="{{asset('public/frontend/images/profile.jpg')}}"
                                                        @endif
                                                        @else
                                                        src="{{asset('public/frontend/images/profile.jpg')}}"
                                                        @endif alt="team3"></a>
                                                    </div>
                                                    <div class="team_title radius_lbrb_10 text-center">
                                                        <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                        <span class="color">{{$designation['name']}}</span>
                                                    </div>
                                                    <div style="border-bottom: 1px solid #ddd;"></div>
                                                    <div class="team_single_info">
                                                        <h6 class="text-center">Contact info</h6>
                                                        <ul class="contact_info list_none">

                                                            <li>
                                                                <span><i class="fa fa-envelope"></i></span>
                                                                <a href="">{{$p['email']}}</a>
                                                            </li>
                                                            {{--  @if($p->room) --}}
                                                            <li>
                                                                <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                                <p>{{$p->room}}</p>

                                                            </li>
                                                            {{-- @endif --}}
                                                            <li>
                                                                <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                                <p>{{$p['phone']}}</p>
                                                            </li>
                                                            <li>
                                                                <span><i class="fa fa-globe"></i></span>
                                                                <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                            </li>
                                                            <li>
                                                                <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                                <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                            </li>

                                                        </ul>
                                                        {{-- <ul class="list_none social_icons text-center">
                                                            <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                            <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                            <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                            <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            @endif @endforeach @endforeach
                                        </div>

                                        @foreach($active_designation as $designation) 
                                        @foreach($designation['teacher'] as $key=>$p) 
                                        @if($designation['name'] == 'Lecturer')
                                        @if($key==0)
                                        <section>
                                            <div class="row justify-content-center">
                                                <div class="col-xl-8 col-lg-8">
                                                    <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                                                        <div class="heading_s1 text-center milumax-border-faculty">
                                                            <h2 class="post__title has-no-space-below"><span>Lecturer</span></h2>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </section>
                                        <div class="row">
                                            @endif
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                                    <div class="team_img">
                                                        <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                            @if(file_exists('public/upload/faculty/'.$p->image))
                                                            src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                            @else
                                                            src="{{asset('public/frontend/images/profile.jpg')}}"
                                                            @endif
                                                            @else
                                                            src="{{asset('public/frontend/images/profile.jpg')}}"
                                                            @endif alt="team3"></a>
                                                        </div>
                                                        <div class="team_title radius_lbrb_10 text-center">
                                                            <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                            <span class="color">{{$designation['name']}}</span>
                                                        </div>
                                                        <div style="border-bottom: 1px solid #ddd;"></div>
                                                        <div class="team_single_info">
                                                            <h6 class="text-center">Contact info</h6>
                                                            <ul class="contact_info list_none">

                                                                <li>
                                                                    <span><i class="fa fa-envelope"></i></span>
                                                                    <a href="">{{$p['email']}}</a>
                                                                </li>
                                                                {{--  @if($p->room) --}}
                                                                <li>
                                                                    <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                                    <p>{{$p->room}}</p>

                                                                </li>
                                                                {{-- @endif --}}
                                                                <li>
                                                                    <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                                    <p>{{$p['phone']}}</p>
                                                                </li>
                                                                <li>
                                                                    <span><i class="fa fa-globe"></i></span>
                                                                    <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                                </li>
                                                                <li>
                                                                    <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                                    <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                                </li>

                                                            </ul>
                                                            {{-- <ul class="list_none social_icons text-center">
                                                                <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                                <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                                <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                                <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                            </ul> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif 
                                                @endforeach 
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{(Route::current()->getName()=='faculty.onleave')
                        ?('show active'):''}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="container">
                                           @foreach($in_active_designation as $designation) 
                                           @foreach($designation['teacher'] as $key => $p)
                                           @if($designation['name'] == 'Professor')
                                           @if($key == 0)
                                           <section>
                                            <div class="row justify-content-center">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">

                                                        <div class="heading_s1 text-center milumax-border-faculty">
                                                            <h2 class="post__title has-no-space-below"><span> Professors</span></h2>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </section>
                                        <div class="row">

                                         @endif
                                         <div class="col-lg-3 col-sm-6">
                                            <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                                <div class="team_img">
                                                    <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                        @if(file_exists('public/upload/faculty/'.$p->image))
                                                        src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                        @else
                                                        src="{{asset('public/frontend/images/profile.jpg')}}"
                                                        @endif
                                                        @else
                                                        src="{{asset('public/frontend/images/profile.jpg')}}"
                                                        @endif alt="team3"></a>
                                                    </div>
                                                    <div class="team_title radius_lbrb_10 text-center">
                                                        <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                        <span class="color">{{$designation['name']}}</span>
                                                    </div>
                                                    <div style="border-bottom: 1px solid #ddd;"></div>
                                                    <div class="team_single_info">
                                                        <h6 class="text-center">Contact info</h6>
                                                        <ul class="contact_info list_none">

                                                            <li>
                                                                <span><i class="fa fa-envelope"></i></span>
                                                                <a href="">{{$p['email']}}</a>
                                                            </li>
                                                            {{--  @if($p->room) --}}
                                                            <li>
                                                                <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                                <p>{{$p->room}}</p>

                                                            </li>
                                                            {{-- @endif --}}
                                                            <li>
                                                                <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                                <p>{{$p['phone']}}</p>
                                                            </li>
                                                            <li>
                                                                <span><i class="fa fa-globe"></i></span>
                                                                <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                            </li>
                                                            <li>
                                                                <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                                <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                            </li>

                                                        </ul>
                                                                {{-- <ul class="list_none social_icons text-center">
                                                                    <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                                    <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                                    <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                                    <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                                </ul> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif @endforeach @endforeach
                                                </div>

                                                @foreach($in_active_designation as $designation) 
                                                @foreach($designation['teacher'] as $key=>$p) 
                                                @if($designation['name'] == 'Associate Professor')
                                                @if($key==0)
                                                <section>
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">

                                                                <div class="heading_s1 text-center milumax-border-faculty">
                                                                    <h2 class="post__title has-no-space-below"><span>Associate Professors</span></h2>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </section>
                                                <div class="row">
                                                    @endif
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                                            <div class="team_img">
                                                                <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                                    @if(file_exists('public/upload/faculty/'.$p->image))
                                                                    src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                                    @else
                                                                    src="{{asset('public/frontend/images/profile.jpg')}}"
                                                                    @endif
                                                                    @else
                                                                    src="{{asset('public/frontend/images/profile.jpg')}}"
                                                                    @endif alt="team3"></a>
                                                                </div>
                                                                <div class="team_title radius_lbrb_10 text-center">
                                                                    <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                                    <span class="color">{{$designation['name']}}</span>
                                                                </div>
                                                                <div style="border-bottom: 1px solid #ddd;"></div>
                                                                <div class="team_single_info">
                                                                    <h6 class="text-center">Contact info</h6>
                                                                    <ul class="contact_info list_none">

                                                                        <li>
                                                                            <span><i class="fa fa-envelope"></i></span>
                                                                            <a href="">{{$p['email']}}</a>
                                                                        </li>
                                                                        {{--  @if($p->room) --}}
                                                                        <li>
                                                                            <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                                            <p>{{$p->room}}</p>

                                                                        </li>
                                                                        {{-- @endif --}}
                                                                        <li>
                                                                            <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                                            <p>{{$p['phone']}}</p>
                                                                        </li>
                                                                        <li>
                                                                            <span><i class="fa fa-globe"></i></span>
                                                                            <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                                        </li>
                                                                        <li>
                                                                            <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                                            <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                                        </li>

                                                                    </ul>
                                                                    {{-- <ul class="list_none social_icons text-center">
                                                                        <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                                        <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                                        <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                                        <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                                    </ul> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif 
                                                        @endforeach 
                                                        @endforeach
                                                    </div>


                                                    @foreach($in_active_designation as $designation) 
                                                    @foreach($designation['teacher'] as $key=> $p) 
                                                    @if($designation['name'] == 'Assistant Professor')
                                                    @if($key==0)
                                                    <section>
                                                        <div class="row justify-content-center">
                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">

                                                                    <div class="heading_s1 text-center milumax-border-faculty">
                                                                        <h2 class="post__title has-no-space-below"><span>Assistant Professors</span></h2>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </section>
                                                    <div class="row">
                                                        @endif
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                                                <div class="team_img">
                                                                    <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                                        @if(file_exists('public/upload/faculty/'.$p->image))
                                                                        src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                                        @else
                                                                        src="{{asset('public/frontend/images/profile.jpg')}}"
                                                                        @endif
                                                                        @else
                                                                        src="{{asset('public/frontend/images/profile.jpg')}}"
                                                                        @endif alt="team3"></a>
                                                                    </div>
                                                                    <div class="team_title radius_lbrb_10 text-center">
                                                                        <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                                        <span class="color">{{$designation['name']}}</span>
                                                                    </div>
                                                                    <div style="border-bottom: 1px solid #ddd;"></div>
                                                                    <div class="team_single_info">
                                                                        <h6 class="text-center">Contact info</h6>
                                                                        <ul class="contact_info list_none">

                                                                            <li>
                                                                                <span><i class="fa fa-envelope"></i></span>
                                                                                <a href="">{{$p['email']}}</a>
                                                                            </li>
                                                                            {{--  @if($p->room) --}}
                                                                            <li>
                                                                                <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                                                <p>{{$p->room}}</p>

                                                                            </li>
                                                                            {{-- @endif --}}
                                                                            <li>
                                                                                <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                                                <p>{{$p['phone']}}</p>
                                                                            </li>
                                                                            <li>
                                                                                <span><i class="fa fa-globe"></i></span>
                                                                                <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                                            </li>
                                                                            <li>
                                                                                <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                                                <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                                            </li>

                                                                        </ul>
                                                                        {{-- <ul class="list_none social_icons text-center">
                                                                            <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                                            <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                                            <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                                            <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                                        </ul> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif 
                                                            @endforeach 
                                                            @endforeach
                                                        </div>
                                                        {{-- @if(in_array('Lecturer', array_column($in_active_designation, 'name'))) --}}


                                                        @foreach($in_active_designation as $designation) 
                                                        @foreach($designation['teacher'] as $key=> $p) 
                                                        @if($designation['name'] == 'Lecturer')
                                                        @if($key==0)
                                                        <section>
                                                            <div class="row justify-content-center">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">

                                                                        <div class="heading_s1 text-center milumax-border-faculty">
                                                                            <h2 class="post__title has-no-space-below"><span>Lecturer</span></h2>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </section>
                                                        {{-- @endif --}}
                                                        <div class="row">
                                                            @endif
                                                            <div class="col-lg-3 col-sm-6">
                                                                <div class="team_box team_style3 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                                                                    <div class="team_img">
                                                                        <a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}"><img @if(!empty($p->image))
                                                                            @if(file_exists('public/upload/faculty/'.$p->image))
                                                                            src="{{asset('public/upload/faculty/'.$p->image)}}"
                                                                            @else
                                                                            src="{{asset('public/frontend/images/profile.jpg')}}"
                                                                            @endif
                                                                            @else
                                                                            src="{{asset('public/frontend/images/profile.jpg')}}"
                                                                            @endif alt="team3"></a>
                                                                        </div>
                                                                        <div class="team_title radius_lbrb_10 text-center">
                                                                            <h5 style="height: 50px"><a href="{{route('faculty.details',!empty($p->faculty_slug)? $p->faculty_slug : '')}}">{{$p['name']}}</a></h5>
                                                                            <span class="color">{{$designation['name']}}</span>
                                                                        </div>
                                                                        <div style="border-bottom: 1px solid #ddd;"></div>
                                                                        <div class="team_single_info">
                                                                            <h6 class="text-center">Contact info</h6>
                                                                            <ul class="contact_info list_none">

                                                                                <li>
                                                                                    <span><i class="fa fa-envelope"></i></span>
                                                                                    <a href="">{{$p['email']}}</a>
                                                                                </li>
                                                                                {{--  @if($p->room) --}}
                                                                                <li>
                                                                                    <span style="max-width: 86"><i class="fas fa-home"></i></span>
                                                                                    <p>{{$p->room}}</p>

                                                                                </li>
                                                                                {{-- @endif --}}
                                                                                <li>
                                                                                    <span><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                                                                                    <p>{{$p['phone']}}</p>
                                                                                </li>
                                                                                <li>
                                                                                    <span><i class="fa fa-globe"></i></span>
                                                                                    <a href="{{$p->website}}" target="_blank">{{$p->website}}</a>
                                                                                </li>
                                                                                <li>
                                                                                    <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                                                                                    <a href="@if($p->scholar_url) {{$p->scholar_url}} @else https://scholar.google.com/ @endif"  target="_blank">Google Scholar Link</a>                  
                                                                                </li>

                                                                            </ul>
                                                                            
                                                                            {{-- <ul class="list_none social_icons text-center">
                                                                                <li><a href="{{$p['facebook_url']}}" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                                                <li><a href="{{$p['twitter_url']}}" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                                                <li><a href="{{$p['googleplus_url']}}" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                                                <li><a href="{{$p['instagram_url']}}" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                                                            </ul> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif 
                                                                @endforeach 
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </section>

                                <!-- START FOOTER -->
                                @include('frontend.layouts.footer')
                                <!-- END FOOTER -->
                                @endsection