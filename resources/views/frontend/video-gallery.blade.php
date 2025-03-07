@extends('frontend.layouts.index') 
@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
{{-- @include('frontend.layouts.banner') --}}
<!-- END SECTION BANNER -->
<section class="bg_light_navy background_bg " data-img-src="{{asset( 'public/frontend/images/pattern_bg2.png')}} " style="background-image: url({{asset( 'public/frontend/images/pattern_bg2.png')}}); background-position: center center; background-size: cover; ">
    <div class="container" style="margin-bottom: 5px;"> 
        <div class="row justify-content-center " style="margin-top: 50px;">
            <div class="col-xl-12 col-lg-12 ">
                <div class="text-center animation " data-animation="fadeInUp " data-animation-delay="0.01s ">
                    <div class="heading_s1 text-center ">
                        <a href=" {{ route('gallery') }} " class="btn active" style="margin-right: 5px;background-color:  #becea9;">Picture Gallery</a><a href="" class="btn" style="background-color:#8AC53C;">Video Gallery</a>
                    </div>
                    <p class="title text-white "></p>
                    <div class="small_divider "></div>
                </div>
            </div>
        </div>
        <style>
            div.col-md-12 {
              box-sizing: unset !important;
            }
            @media (max-width: 768px) {
                .row .col-md-12 .gallery {
                    float: none;
                    width: 100%;
                    max-width: 100%;
                }
            }
        </style>
        <div class="row text-center" style="width: 100%; max-width: 100%;">
            <div class="col-md-12 col-sm-12" style="width: 100%; max-width: 100%;">
                @foreach($videoGalleries as $videoGallery)
                    <div class="gallery">
                        <div class="desc" style="font-weight: bold;">{{$videoGallery['title']}}</div>
                        <a target="_blank" href="{{ $videoGallery['youtube_link'] }}" >
                        <iframe class="lazyload" data-src="{{ $videoGallery['youtube_link'] }}" max-width="90%" width="100%;" height="" frameborder="0" style="border:0;max-width: 100%;" allowfullscreen=""></iframe>
                        </a>
                        <div class="desc" style="text-align: justify;">{!! $videoGallery['description'] !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    div.gallery {
      margin: 5px;
      border: 1px solid #ccc;
      float: left;
      width: 31.8%;
      /* width: 50%; */
      display: block;
    }
    
    div.gallery:hover {
      border: 1px solid #777;
    }
    
    div.gallery iframe {
      width: 100%;
      height: 100%;
    }
    
    div.desc {
      padding: 15px;
      text-align: center;
    }
</style>

<!-- START FOOTER -->
@include('frontend.layouts.footer')
<!-- END FOOTER -->
@endsection