@extends('frontend.layouts.index') 
@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
{{-- @include('frontend.layouts.banner') --}}
<!-- END SECTION BANNER -->
<section class="bg_light_navy background_bg " data-img-src="{{asset( 'public/frontend/images/pattern_bg2.png')}} " style="background-image: url({{asset( 'public/frontend/images/pattern_bg2.png')}}); background-position: center center; background-size: cover; ">
    <div class="container "> 
        <div class="row justify-content-center " style="margin-top: 50px;">
            <div class="col-xl-12 col-lg-12 ">
                <div class="text-center animation " data-animation="fadeInUp " data-animation-delay="0.01s ">
                    <div class="heading_s1 text-center ">
                    <a href="" class="btn active" style="margin-right: 5px;background-color: #8AC53C;">Picture Galllery</a><a href="{{ route('video.gallery') }}" class="btn" style="background-color: #0095DB;">Video Galllery</a>
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
  /* justify-content: center;
  display: flex; */
  height: fit-content;
  width: fit-content;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 200px;
  height: 200px;
  padding: 1px;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
@foreach($gallery as $g)
  
  @if($loop->iteration % 2 == 0)
    <div class="gallery">
      <div class="desc">{{$g['title']}}</div>
      <div class="text-center">
        <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}" >
          <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
        </a>
        <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}">
          <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
        </a>
        <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
          <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
        </a>
      </div>
      <div class="desc">{{$g['title']}}</div>
    </div>
  @elseif($loop->iteration % 3 == 0)
  <div class="gallery">
    <div class="desc">{{$g['title']}}</div>
    <div class="text-center">
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}" >
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      {{-- <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a> --}}
    </div>
    <div class="desc">{{$g['title']}}</div>
  </div>
  @elseif( 4 % $loop->iteration == 0)
  <div class="gallery">
    <div class="desc">{{$g['title']}}</div>
    <div class="text-center">
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}" >
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
    </div>
    <div class="desc">{{$g['title']}}</div>
  </div>
  @else
  <div class="gallery">
    <div class="desc">{{$g['title']}}</div>
    <div class="text-center">
      <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}" >
        <img class="lazyload" data-src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a>
      {{-- <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}}">
        <img src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a> --}}
      {{-- <a target="_blank" href="{{asset( 'public/upload/gallery/'.$g['image'])}} ">
        <img src="{{asset( 'public/upload/gallery/'.$g['image'])}} " alt="Cinque Terre" width="700" height="450">
      </a> --}}
    </div>
    <div class="desc">{{$g['title']}}</div>
  </div>
  @endif
@endforeach



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