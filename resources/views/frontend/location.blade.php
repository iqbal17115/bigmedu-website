@extends('frontend.layouts.index')
@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
{{-- @include('frontend.layouts.banner') --}}
<!-- END SECTION BANNER -->
<section class="small_pb">
	<div class="container">	
    	<div class="row justify-content-center" style="margin-top: 30px;">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    {{-- <div class="heading_s1 text-center">
                        <h3 style="color: green">{!! Session::has('notify') ? Session::get("notify") : '' !!}</h3>
                        <h2>Location</h2>
                    </div> --}}
                    <p></p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="box_shadow1 radius_all_10">
                	<div class="row no-gutters">
                    	<div class="col-md-4 container">	
                            {{-- <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="text-center animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                                        <div class="heading_s1 text-center">
                                            <h2>Address</h2>
                                            
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- @php $contact = DB::table('contact_us')->first(); @endphp --}}
                            <div class=" ">
                                <div class="">
                                    <div class="overlay_bg_danger_90 icon_box text_white radius_all_10 background_bg animation animated fadeInUp">
                                        
                                        <div class="intro_desc">
                                            <b style="font-size: 20px;">Address</b>
                                            {!! $location->address !!}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="">
                                    <div class="overlay_bg_light_green_90 icon_box  text_white radius_all_10 background_bg animation animated fadeInUp">
                                        
                                        <div class="intro_desc">
                                            <h5>Call Us</h5>
                                            <p style="margin-bottom: 23px;">{{ $contact->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="overlay_bg_default_90 icon_box  text_white radius_all_10 background_bg animation animated fadeInUp">
                                        
                                        <div class="intro_desc">
                                            <h5>Email</h5>
                                            <p style="margin-bottom: 23px;">{{ $contact->email }}</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-8 animation animated fadeInRight" data-animation="fadeInRight" data-animation-delay="0.4s" style="animation-delay: 0.4s; opacity: 1;">
                            <b style="font-size: 16px;">Find us on map</b>
                            {{-- <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.578430063007!2d90.38622601498089!3d23.726744084600977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9216af99d31fde46!2sDepartment%20of%20Electrical%20and%20Electronic%20Engineering%20BUET!5e0!3m2!1sen!2sbd!4v1574858123671!5m2!1sen!2sbd" width="800" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div> --}}
                            <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                                <iframe src="https://maps.google.com/maps?q={{$location->latitude}},{{$location->longitude}}&hl=en&z=14&amp;output=embed" width="800" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                             </div>
                            
                             
                        </div>
                    </div><br><br>
                </div>
            </div>
        </div>
    </div>
</section>





@include('frontend.layouts.footer')
<!-- END FOOTER -->
@endsection