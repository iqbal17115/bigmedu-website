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
<section id="facilities" style="@if(@$fmenu) padding-top: 0px; @endif">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="title">
                            <h5><p style="text-transform: uppercase;text-align: center;"><b style="text-transform: uppercase;">Blog</b></p></h5>
                        </div>
                    </div>
                </div>
                {{-- <style>
                    .owl-carousel .owl-item img {
                        display: inline !important;
                        width: 20%;
                    }
                </style> --}}
                <h5><p style="text-align: left;"><b style="text-transform: capitalize;">Recent Uploaded Post</b></p></h5>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            @foreach($recentPosts as $recentPost)
                            {{-- <div class="col-sm-12 col-md-3 col-lg-3"> --}}
                                <a href="{{ route('blog.details',$recentPost->id) }}" style="color: black !important;text-decoration: none !important;">
                                    <div class="facility">
                                        
                                        <img src="{{asset('public/upload/post_category/'.@$recentPost->image)}}" class="w-100" height="100px;" alt="BIGM Research" />
                                        <b style="text-align: center;display: block;">{{ @$recentPost->title }}</b>
                                        <span style="text-align: justify;">{!! strip_tags(substr($recentPost->description,0,250)) !!}</span>
                                    
                                        <small style="display: block;">Publisher Name: {{ @$recentPost->blog_user->name }}</small>
                                        <small style="display: block;">Published Date and Time: {{ @$recentPost->created_at->format('Y/m/d h:i A') }}</small>
                                        <small style="display: block;">Category Name: {{@$recentPost->category->category_name}}</small>
                                        <small style="display: block;">Number of Views: {{ (@$recentPost->postView->sortByDesc('number_of_view')->first()->number_of_view) }}</small>
                                    </div>
                                </a>
                                
                                {{-- <div class="facility">
                                    <img src="{{asset('public/frontend/images/OUR RESEARCH/Academic Research.jpeg')}}" class="w-100" height="100px;" alt="BIGM Research" />
                                    <p style="text-align: justify;">Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details</p>
                                    <small style="display: block;">Publisher Name: Md Jalal Uddin</small>
                                    <small style="display: block;">Published Date and Time: 01/01/2022 10:58 AM</small>
                                    <small style="display: block;">Category Name: Education</small>
                                    <small style="display: block;">Number of Views: 100</small>
                                </div> --}}
                            {{-- </div> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                @php 
                    $topViews = \App\Model\BlogPostView::orderBy('number_of_view','desc')->get()->unique('blog_post_id');
                    //dd($topViews);
                @endphp
                <h5><p style="text-align: left;"><b style="text-transform: capitalize;">Top Viewed Post</b></p></h5>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            @foreach($topViews as $topView)
                            {{-- <div class="col-sm-12 col-md-3 col-lg-3"> --}}
                            <a href="{{ route('blog.details',$topView->blog_post_id) }}" style="color: black !important;text-decoration: none !important;">
                                <div class="facility">
                                    <img src="{{asset('public/upload/post_category/'.@$topView->post->image)}}" class="w-100" height="100px;" alt="BIGM Research" />
                                    <b style="text-align: center;display: block;">{{ @$topView->post->title }}</b>
                                    <span style="text-align: justify;">{!! strip_tags(substr(@$topView->post->description,0,250)) !!}</span>
                                    <small style="display: block;">Publisher Name: {{ @$topView->post->blog_user->name }}</small>
                                    <small style="display: block;">Published Date and Time: {{ @$topView->post->created_at->format('Y/m/d h:i A') }}</small>
                                    <small style="display: block;">Category Name: {{ $topView->post->category->category_name }}</small>
                                    <small style="display: block;">Number of Views: {{ @$topView->number_of_view }}</small>
                                </div>
                            </a>
                                {{-- <div class="facility">
                                    <img src="{{asset('public/frontend/images/OUR RESEARCH/Academic Research.jpeg')}}" class="w-100" height="100px;" alt="BIGM Research" />
                                    <p style="text-align: justify;">Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details</p>
                                    <small style="display: block;">Publisher Name: Md Jalal Uddin</small>
                                    <small style="display: block;">Published Date and Time: 01/01/2022 10:58 AM</small>
                                    <small style="display: block;">Category Name: Education</small>
                                    <small style="display: block;">Number of Views: 100</small>
                                </div> --}}
                            {{-- </div> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                @php

                    $postLikes = \App\Model\BlogPost::with('likes')->get()->sortByDesc(function ($post) {
                        return $post->likes->count();
                    });

                    //dd($postLikes);
                @endphp
                <h5><p style="text-align: left;"><b style="text-transform: capitalize;">Top Ranking Post</b></p></h5>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme" style="white-space: 100%;">
                            @foreach($postLikes as $postLike)
                            {{-- <div class="col-sm-12 col-md-3 col-lg-3"> --}}
                            <a href="{{ route('blog.details',$postLike->id) }}" style="color: black !important;text-decoration: none !important;">
                                <div class="facility">
                                    <img src="{{asset('public/upload/post_category/'.@$postLike->image)}}" class="w-100" height="100px;" alt="BIGM Research" />
                                    <b style="text-align: center;display: block;">{{ @$postLike->title }}</b>
                                    <span style="text-align: justify;">{!! strip_tags(substr(@$postLike->description,0,250)) !!}</span>
                                    
                                </div>
                                {{-- <div class="facility">
                                    <img src="{{asset('public/frontend/images/OUR RESEARCH/Research Highlights.jpeg')}}" class="w-100" height="100px;" alt="BIGM Research" />
                                    <p style="text-align: justify;">Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details</p>
                                    
                                </div> --}}
                            {{-- </div> --}}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @php 
                // $likeModels = \App\Model\LikeCount::with('blog_users','blog_posts')->get();
                // dd($likeModels);
                $publishers = \App\Model\BlogUser::with('blog_posts')->get();
                //dd($publishers);
                @endphp
                <h5><p style="text-align: left;"><b style="text-transform: capitalize;">Top Publisher</b></p></h5>
                <div class="row">
                    <div class="col-9">
                        <div class="owl-carousel owl-theme">
                            @foreach($publishers as $key => $publisher)
                            {{-- <div class="col-sm-12 col-md-3 col-lg-3"> --}}
                                <div class="facility">
                                    @if(@$publisher->image)
                                            <img src="{{asset('public/upload/profile_photo/'.@$publisher->image)}}" class="" height="150px;" style="border-radius: 50%;width: 150px;" alt="Image">
                                    @else
                                        <img src="{{asset('public/backend/images/noimage.png')}}" class="" height="150px;" style="border-radius: 50%;width: 150px;" alt="Image">
                                    @endif
                                    <small style="display: block;">Name: {{ (@$publisher->name) }}</small>
                                    {{-- <small style="display: block;">Education 5-5, IT 3-3, Other 3-3</small> --}}
                                    <small style="display: block;">
                                        @php
                                        $publisher_posts = @$publisher->blog_posts->groupBy('category_id');
                                        @endphp
                                        @foreach($publisher_posts as $pkey => $publisher_post) 

                                            @php
                                            //dd($publisher_post[0]->category_id);
                                            $userAndCategorywisePosts = \App\Model\BlogPost::where('blog_user_id',@$publisher->id)->where('category_id',@$publisher_post[0]->category_id)->get();
                                            $postArray = array();
                                            foreach($userAndCategorywisePosts as $key => $single) {
                                                $postArray[$key] = $single->id;
                                            }
                                            //dd($postArray);
                                            $likeCount = \App\Model\LikeCount::whereIn('blog_post_id',$postArray)->count();
                                            //dd($likeCount);
                                            @endphp

                                            {{ @$publisher_post[0]->category->category_name }} {{ @$publisher_post->count() }}-{{ (@$likeCount) }}@if(!$loop->last),@endif 

                                        @endforeach
                                    </small>
                                    @php
                                    $publisherTotalView = \App\Model\BlogPostView::where('blog_user_id',@$publisher->id)->sum('number_of_view');
                                    @endphp
                                    <small style="display: block;">View Number: {{ @$publisherTotalView }}</small>
                                    
                                </div>
                                {{-- <div class="facility">
                                    <img src="{{asset('public/frontend/images/OUR RESEARCH/Academic Research.jpeg')}}" class="" height="150px;" style="border-radius: 50%;width: 150px;" alt="BIGM Research" />
                                    <small style="display: block;">Name: Md Jalal Uddin</small>
                                    <small style="display: block;">Education 5-5, IT 3-3, Other 3-3</small>
                                    <small style="display: block;">View Number: 100</small>
                                </div> --}}
                            {{-- </div> --}}
                            @endforeach
                        </div>
                    </div>
                    @php
                      $allPostCategories = \App\Model\PostCategory::with('blog_posts')->get(); 
                      //dd($allPostCategories);
                    @endphp
                    <div class="col-3">
                        <h5><p style="text-align: left;">Category:</b></p></h5>
                        @foreach($allPostCategories as $postCategory)
                        <p style="text-align: left;">{{ @$postCategory->category_name }} ({{@$postCategory->blog_posts->count()}} Posts)</p>
                        @endforeach
                        {{-- <p style="text-align: left;">Social Activity (115 Posts)</p>
                        <p style="text-align: left;">IT (115 Posts)</p>
                        <p style="text-align: left;">Health (115 Posts)</p> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-3">
                <h5><p style="text-align: left;"><b style="text-transform: capitalize;">Top Ranking Post</b></p></h5>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme" style="white-space: 100%;">
                                <div class="facility">
                                    <img src="{{asset('public/frontend/images/OUR RESEARCH/Research Highlights.jpeg')}}" class="w-100" height="100px;" alt="BIGM Research" />
                                    <p style="text-align: justify;">Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details Post Details</p>
                                    
                                </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@include('frontend.layouts.footer')
@endsection