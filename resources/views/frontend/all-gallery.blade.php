@extends('frontend.layouts.index') 
@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
@include('frontend.layouts.banner')
<!-- END SECTION BANNER -->
<section class="bg_light_navy background_bg " data-img-src="{{asset( 'public/frontend/images/pattern_bg2.png')}} " style="background-image: url({{asset( 'public/frontend/images/pattern_bg2.png')}}); background-position: center center; background-size: cover; ">
    <div class="container "> 
        <div class="row justify-content-center ">
            <div class="col-xl-12 col-lg-12 ">
                <div class="text-center animation " data-animation="fadeInUp " data-animation-delay="0.01s ">
                    <div class="heading_s1 text-center ">
                        <h2 class="text-white ">Gallery</h2>
                    </div>
                    <p class="title text-white "></p>
                    <div class="small_divider "></div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12 ">
                <ul class="grid_container gutter_medium grid_col3 animation " data-animation="fadeInUp " data-animation-delay="0.03s ">
                    <li class="grid-sizer "></li>
                    <!-- START PORTFOLIO ITEM -->
                    @foreach($gallery as $g)
                    <li class="grid_item ">
                        <div class="gallery_item radius_all_10 ">
                            <a href="# " class="image_link ">
                                <img src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="image ">
                            </a>
                            <div class="gallery_content ">
                                <div class="link_container ">
                                    <a href="{{asset( 'public/upload/gallery/'.$g['image'])}} " class="image_popup "><span class="ripple "><i class="ion-image "></i></span></a>
                                </div>
                                <div class="text_holder text_white ">
                                    <h5>{{$g['title']}}</h5>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                    <!-- END PORTFOLIO ITEM -->
                </ul>
            </div>
            <!-- <div class="col-12 ">
                    <div class="text-center animation animated fadeInUp " data-animation="fadeInUp " data-animation-delay="0.07s " style="animation-delay: 0.07s; opacity: 1; ">
                        <div class="medium_divider "></div>
                        <a href="{{route('more.gallery')}}" class="btn btn-default ">More Gallery <i class="ion-ios-arrow-thin-right ml-1 "></i></a>
                    </div>
                </div> -->
        </div>
    </div>
</section>

<!-- START FOOTER -->
@include('frontend.layouts.footer')
<!-- END FOOTER -->
@endsection