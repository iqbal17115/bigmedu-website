@extends('frontend.layouts.index') 
@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
@include('frontend.layouts.banner')
<!-- END SECTION BANNER -->
<section class=" ">
        <div class="container ">
            <div class="row justify-content-center ">
                <div class="col-xl-12 col-lg-12 ">
                    <div class="text-center ">
                        <div class="heading_s1 text-center milumax-border ">
                            <h2 class="post__title has-no-space-below" style="height: 0"><span style="position: relative;background: white;z-index: 1;">Research Areas</span></h2>
                        </div>
                        <p class="title p-post "></p>

                        <div class="course_list" style="padding: 22px 0px 53px 0px;border: 4px solid #7b0100;">
                            <div class="row ">
                                @foreach($research as $r)
                                <div class="col-md-12 ">
                                    <div class="content_box box_shadow1 animation animated fadeInUp " data-animation="fadeInUp " data-animation-delay="0.02s " style="animation-delay: 0.02s; opacity: 1; ">
                                        <div class="content_img ">
                                            <a href="{{route('research.detail',$r['id'])}}"><img src="{{asset( 'public/upload/research/'.$r['image'])}} " alt="Biomedical-Signal-Processing " width="100px" height="150px"></a>
                                        </div>
                                        {{-- <div class="content_desc ">
                                            <h4 class="content_title "><a href="{{route('research.detail',$r['id'])}}">{{$r['title']}}</a></h4>
                                                <p>{!! $r['description'] !!}</p>
                                            </div> --}}
                                             <div class="content_desc ">
                                            <h4 class="content_title "><a href="#">{{$r['title']}}</a></h4>
                                                {!! $r['description'] !!}
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach


                                </div>
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