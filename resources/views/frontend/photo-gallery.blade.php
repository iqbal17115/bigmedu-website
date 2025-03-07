@extends('frontend.layouts.index') 
@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
{{-- @include('frontend.layouts.banner') --}}
<!-- END SECTION BANNER -->
<link href="{{asset('public/lightgallery/')}}/dist/css/lightgallery.css" rel="stylesheet">
<section class="bg_light_navy background_bg " data-img-src="{{asset( 'public/frontend/images/pattern_bg2.png')}} " style="background-image: url({{asset( 'public/frontend/images/pattern_bg2.png')}}); background-position: center center; background-size: cover; ">
  <div class="container "> 
    <div class="row justify-content-center " style="margin-top: 50px;">
      <div class="col-xl-12 col-lg-12 ">
        <div class="text-center animation " data-animation="fadeInUp " data-animation-delay="0.01s ">
          <div class="heading_s1 text-center ">
            <a href="" class="btn active" style="margin-right: 5px;background-color: #8AC53C;">Picture Gallery</a><a href="{{ route('video.gallery') }}" class="btn" style="background-color: #becea9;">Video Gallery</a>
          </div>
          <p class="title text-white "></p>
          <div class="small_divider "></div>
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12 ">
        <style>
          div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            height: fit-content;
            width: 100%;
          }

          div.gallery:hover {
            border: 1px solid #777;
          }

          div.gallery img {
            height: 215px;
            padding: 1px;
          }

          div.desc {
            padding: 15px;
            text-align: center;
          }
        </style>
        @foreach($photoGalleries as $photo_gallery_key => $photoGallery)
        <div class="gallery">
          <div class="desc" style="font-weight: bold;">{{$photoGallery['title']}}</div>
          <div class="text-center">
            @php
            $images = \App\Model\PhotoGalleryImage::where('photo_gallery_id',$photoGallery->id)->get();
            @endphp
            <div id="aniimated-thumbnials{{$photo_gallery_key}}">
             @foreach($images as $image)
             <a href="{{ asset( 'public/upload/photo_gallery/'.$image['image']) }}">
              <img class="lazyload" data-id="{{$image->id}}" src="{{ asset( 'public/upload/photo_gallery/'.$image['image']) }} ">
            </a>
            @endforeach
          </div>
          
        </div>
        <div class="desc">{!! $photoGallery['description'] !!}</div>
      </div>
      @endforeach

    </div>
  </div>
</div>
</section>

<!-- START FOOTER -->
@include('frontend.layouts.footer')
<!-- END FOOTER -->

<script src="{{asset('public/lightgallery/')}}/dist/js/lightgallery.js"></script>
<script src="{{asset('public/lightgallery/')}}/dist/js/lg-pager.js"></script>
<script src="{{asset('public/lightgallery/')}}/dist/js/lg-autoplay.js"></script>
<script src="{{asset('public/lightgallery/')}}/dist/js/lg-fullscreen.js"></script>
<script src="{{asset('public/lightgallery/')}}/dist/js/lg-zoom.js"></script>
<script src="{{asset('public/lightgallery/')}}/dist/js/lg-hash.js"></script>
<script src="{{asset('public/lightgallery/')}}/dist/js/lg-share.js"></script>
@foreach($photoGalleries as $photo_gallery_key => $photoGallery)
<script>
  lightGallery(document.getElementById('aniimated-thumbnials{{$photo_gallery_key}}'), {
    thumbnail:true
  }); 
</script>
@endforeach
@endsection