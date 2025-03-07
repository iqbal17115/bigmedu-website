@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

    <section id="news-event-notice">
        <div class="container">
            <div class="row-">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            @foreach($libraryNews as $list)
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{asset('public/upload/library/library_news/'.$list->image)}}" style="height: 100px;" alt=""/>
                                </div>
                                <div class="col-md-10">
                                    <p class="">{{$list->title}}</p>
                                    <a class="" href="{{ route('single_library_news', $list->id) }}">Read More ...</a>
                                </div>
                            </div>
                            <hr/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('frontend.layouts.footer')
@endsection