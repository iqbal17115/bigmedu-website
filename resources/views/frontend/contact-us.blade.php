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
                    <div class="heading_s1 text-center">
                        <h3 style="color: green">{!! Session::has('notify') ? Session::get("notify") : '' !!}</h3>
                        <h2>Contact Us</h2>
                    </div>
                    <p></p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="box_shadow1 radius_all_10">
                	<div class="row no-gutters">
                    	<div class="col-md-12 animation animated fadeInLeft" data-animation="fadeInLeft" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">
                        	<div class="padding_eight_all">
                                <div class="field_form">
                                    <form method="post" action="{{ route('contact.message.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <input name="name" required="required" placeholder="Full Name *" id="first-name" class="form-control" name="name" type="text">
                                             </div><br><br><br>
                                            <div class="form-group col-12">
                                                <input name="email" required="required" placeholder="Email *" id="email" class="form-control" name="email" type="email">
                                            </div><br><br><br>
                                            <div class="form-group col-12">
                                                <input name="phone" required="" placeholder="Phone" id="phone" class="form-control" name="phone" type="tel">
                                            </div><br><br><br>
                                            <div class="form-group col-12">
                                                <input name="subject" placeholder="Subject *" id="subject" class="form-control" name="subject" type="text">
                                            </div><br><br><br>
                                            <div class="form-group col-lg-12">
                                                <textarea name="message" required="required" placeholder="Message *" id="description" class="form-control" name="message" rows="3"></textarea>
                                            </div><br><br><br><br><br>
                                            <div class="col-lg-12">
                                                <button class="btn btn-success" type="submit"  value="Submit">Submit</button>
                                            </div><br><br><br>
                                            {{-- <div class="col-lg-12 text-center">
                                                <div id="alert-msg" class="alert-msg text-center"></div>
                                            </div> --}}
                                        </div>
                                    </form>		
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







@include('frontend.layouts.footer')
<!-- END FOOTER -->
@endsection