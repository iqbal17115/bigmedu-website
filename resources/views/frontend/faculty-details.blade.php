@extends('frontend.layouts.index')
<style type="text/css">
    h2.d {
       -webkit-text-decoration-line: underline; /* Safari */
       text-decoration-line: underline; 
       .image_size{

        padding-top: 50;
        padding-left: 50;
    }
}

.text-justify{
    margin: 0 !important;
    margin-bottom: 0 !important;
}
</style>

@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
@include('frontend.layouts.banner')
<!-- END SECTION BANNER -->
<!-- START SECTION TEACHER -->
<section>
	<div class="container">
        <div style="padding-left: 100">
            <h2 style="color:red" class="d">{{$faculty->name}}  </h2>
            <h3>{{$faculty['designations']['name']}}</h3>
        </div>
        {{-- <div style="padding-bottom: 20"></div> --}}
        <div class="row">
            <div class="col-lg-1 col-md-6"></div>
            <div class="col-lg-4 col-md-5">
               <div class="team_single radius_all_10 box_shadow1">
                   <div class="">
                       <img class="radius_ltrt_10 image_size" style="width: 87%; padding-top: 50;padding-left: 50;"  
                       @if(!empty($faculty->image))
                       @if(file_exists('public/upload/faculty/'.$faculty->image))
                       src="{{asset('public/upload/faculty/'.$faculty->image)}}"
                       @else
                       src="{{asset('public/frontend/images/profile.jpg')}}"
                       @endif
                       @else
                       src="{{asset('public/frontend/images/profile.jpg')}}"
                       @endif alt="team_img_big" >
                   </div>
                   <div class="team_single_info">
                    @if($faculty->degree)
                    <div class="team_name" style="" >
                        <h6 class="mb-0" style="color: red;padding-bottom: 10px;" style="">Academic Background</h6>
                        {!! $faculty->degree !!}
                    </div>
                    @endif
                    
                    {{-- <div style="padding-top: 1px"></div> --}}
                    @if($faculty->email)
                    <h6 class="mb-0" style="color: red">Contact Info</h6>
                    <ul class="contact_info list_none">
                        @if($faculty->email)
                        <li>
                            <span style="max-width: 86"><i class="fa fa-envelope"></i></span>
                            <p>   {{$faculty->email}}</p>
                        </li>
                        @endif
                        @if($faculty->room)
                        <li>
                            <span style="max-width: 86"><i class="fas fa-home"></i></span>
                            <p>{{$faculty->room}}</p>
                            
                        </li>
                        @endif
                        @if($faculty->phone)
                        <li>
                            <span style="max-width: 86"><i class="fa fa-mobile-alt" style="padding-left: 2px;"></i></span>
                            <p>{{$faculty->phone}}</p>
                        </li>
                        @endif
                        
                    </ul>
                    @endif
                    {{-- <div style="padding-top: 10"></div> --}}
                    @if($faculty->website)
                    {{-- <h6 class="mb-0" style="color: red;">Personal Website</h6> --}}
                    <ul class="contact_info list_none">
                        <li>
                            <span style="max-width: 86"><i class="fa fa-globe"></i></span>
                            <a href="{{$faculty->website}}" target="_blank">{{$faculty->website}}</a>                  
                        </li>
                    </ul>
                    @endif
                    
                    {{-- <h6 class="mb-0" style="color: red;">Google Scholar Link</h6> --}}
                    <ul class="contact_info list_none">
                        <li>
                            <span style="max-width: 86"><i class="ai ai-google-scholar-square ai-1x"></i></span>
                            <a href="@if($faculty->scholar_url) {{$faculty->scholar_url}} @else https://scholar.google.com/ @endif" target="_blank">Google Scholar Link</a>                  
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            @if($faculty->description)
            <div class="teacher_desc mt-4 mt-md-0 ">
                <p class="text-justify">{!! $faculty->description !!}
                </p>
            </div>
            @endif
            {{-- <div style="padding-bottom: 20"></div> --}}
            @if($faculty->research)
            <div class="teacher_desc mt-0 mt-md-0">
                <h5 style="color: red; margin-bottom: 1px !important;">Keywords/ Research Interest </h5>
                <p class="text-justify">{!! $faculty->research !!}
                </p>
            </div>
            @endif
            {{-- <div style="padding-bottom: 10"></div> --}}
            @if($faculty->award)
            <div class="teacher_desc mt-0 mt-md-0">
                <h5 class="mb-3" style="color: red; margin-bottom: 1px !important;">Awards/Honors </h5>
                <p class="text-justify">{!! $faculty->award !!}
                </p>
            </div>
            @endif
            {{-- <div style="padding-bottom: 20"></div> --}}
            @if($faculty->patent)
            <div class="teacher_desc mt-0 mt-md-0">
                <h5 class="mb-3" style="color: red; margin-bottom: 1px !important;">Patents </h5>
                <p class="text-justify">{!! $faculty->patent !!}
                </p>
            </div>
            @endif
            {{-- <div style="padding-bottom: 20"></div> --}}
            @if($faculty->publication)
            <div class="teacher_desc mt-4 mt-md-0">
                <h5 class="mb-3" style="color: red; margin-bottom: 1px !important;">Recent/Selected Publications </h5>
                <p class="text-justify">
                    {!! $faculty->publication !!}
                </div>
                @endif


            </div>
        </div>
    </div>
</section>
<!-- END SECTION TEACHER -->

<!-- END SECTION CALL TO ACTION -->

<!-- END SECTION CALL TO ACTION -->



<!-- START FOOTER -->
@include('frontend.layouts.footer')
<!-- END FOOTER -->


@endsection