<section id="banner">
    <div class="container-flutter">
        <div class="col-12 m-0 p-0">
            @php
            $sliderVideo = DB::table('slider_videos')->first();
            @endphp
            @if(!empty($sliderVideo->video) && $sliderVideo->show_video == 1)
            <video loop autoplay muted style="opacity: {{ $sliderVideo->opacity/100 }};" width="100%"> 
                <source src="{{asset('public/upload/slider/'.$sliderVideo->video) }}">
                Your browser does not support the video tag.
            </video>
            @else
                <div id="carouselSlide" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($slider as $key => $list)
                        <div class="carousel-item {{($key == 0)?('active'):''}}" data-bs-interval="10000">
                            <div class="carousel-caption" style="top: 0;left: 7.5%;right: 0;bottom:0;padding: 0; text-align: justify;">
                                {!! $list->show_description == 1 ? $list->description : '' !!}
                            </div>
                            <img src="{{asset('public/upload/slider/'.$list->image)}}" class="d-block w-100" style="" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block" style="text-align: right;vertical-align:bottom;">
                                <h5>{{$list->header}}</h5>
                                <h1><b>{{$list->middle}}</b></h1>
                                <p><small>{{$list->footer}}</small></p>
                                <button class="btn btn-sm btn-primary" type="submit">READ MORE <i class="fas fa-angle-right"></i></button>
                            </div> --}}
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselSlide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</section>