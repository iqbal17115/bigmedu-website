@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')
    @php
$urll = request()->fullUrl();
if($urll) {
    $url = explode('=',$urll);
    if(sizeOf($url) >= 3)
    {
        $ur = $url[2];
        $fmenu = DB::table('frontend_menus')->where('id', $ur)->first();
    }
}
//dd($fmenu);
@endphp
    <section id="news-event-notice" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 75px; @endif">
        <div class="container">
            <div class="row-">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            @foreach($news as $list)
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{asset('public/upload/news/'.$list->image)}}" style="width: 100%;" alt=""/>
                                </div>
                                <div class="col-md-9">
                                    <p class="">{{$list->title}}</p>
                                    <p class="">{{date('d-M-Y',strtotime($list->date))}}</p>
                                    <a class="" href="{{route('news',request()->all()+['id'=>$list->id])}}">Read More ...</a>
                                </div>
                            </div>
                            <hr/>
                            @endforeach
                        </div>
                    </div>
                    @php
                    $last = \App\Model\News::where('type',1)->latest()->first();
                    // dd($last);
                    @endphp
                    @if(@$last['updated_at'])
                    <div style="margin-top: 2px;color: #070101;text-align: right;">
                        Updated at {{date('d-M-Y',strtotime(@$last['updated_at']))}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@include('frontend.layouts.footer')
@endsection