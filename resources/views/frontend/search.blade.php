@extends('frontend.layouts.index')
@section('content')
{{-- @include('frontend.layouts.loader') --}}
<!-- START HEADER -->
@include('frontend.layouts.header')
<!-- START SECTION BREADCRUMB -->
{{-- @include('frontend.layouts.banner') --}}
<!-- END SECTION BANNER -->
<section class="section section-grayscale milumax-heading">
  <div class="section-inner">
    <div class="container">
      <div class="row" style="margin-top: 20px;">
        <div class="col-md-12"><h5></h5></div>
        <div class="section-heading wowed" style="width: 100%;">
          <h1 data-wow-delay=".5s" class="wow fadeInDown animated" style="visibility: visible; animation-delay: 0.5s; animation-name:fadeInDown;text-align: center;font-size: 28px;font-weight: bold;">You searched for : {{$search_for}}</h1>
          <hr/>
        </div>

        <div class="col-md-12">
          <div class="row" style="margin-bottom: 20px;">
            @if(!empty(@$search_result[key($search_result)]['data']))
            {{-- @php dd($search_result[key($search_result)]['data']) @endphp --}}
            @foreach($search_result as $search)
            {{-- @php dd($search) @endphp --}}
              @foreach($search['data'] as $data)
              {{-- @php dd($data) @endphp --}}
                <div style="width:100%;">

                      @if(@$search['table_name'] == 'abouts')
                      <a href="{{route('about',$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->short_description) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'news')
                      <a href="{{route('news',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->long_description) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'activities')
                      <a href="{{route('activity',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->long_description) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'careers')
                      <a href="{{route('career_jobs_view',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->description) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'directors')
                      <a href="{{route('director',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->short_description) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'facilities')
                      <a href="{{route('facility',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->long_description) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'features')
                      <a href="{{route('home').'#feature'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->description) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'alumnies')
                      <a href="{{route('home').'#alumni'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->subtitle) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'fast_services')
                      <a href="{{route('home').'#bottom'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'for_students')
                      <a href="{{route('home').'#bottom'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'get_in_touches')
                      <a href="{{route('home').'#bottom'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'home_links')
                      <a href="{{route(@$data->url_link)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->name ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'library_news')
                      <a href="{{route('single_library_news',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'members')
                      <a href="{{route('member.profile',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->name ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->member_designation) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      {{-- @if(@$search['table_name'] == 'membereducations')
                      <a href="{{route('member.profile',@$data->member_id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->degree ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->subject) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'memberexperiences')
                      <a href="{{route('member.profile',@$data->member_id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->designation ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->experience_institution) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'member_administrative_experiences')
                      <a href="{{route('member.profile',@$data->member_id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->administrative_designation ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->administrative_details) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'member_area_of_interests')
                      <a href="{{route('member.profile',@$data->member_id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->interest_area ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif --}}

                      @if(@$search['table_name'] == 'offers')
                      <a href="{{route('offer',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->short_description) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'office_orders')
                      <a href="{{route('noc.office.order')}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'partnerships')
                      <a href="{{route('partnership',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->long_description) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'photo_galleries')
                      <a href="{{route('gallery')}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->description) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'quick_links')
                      <a href="{{route('home').'#bottom'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'student_feedbacks')
                      <a href="{{route('home').'#student-say'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->subtitle) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'training_enrolls')
                      <a href="{{route('home').'#training'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->subtitle) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'useful_links')
                      <a href="{{route('home').'#bottom'}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'video_galleries')
                      <a href="{{route('video.gallery')}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->description) ?? ''}}
                          </span>
                        </div>
                      </a>
                      @endif

                      @if(@$search['table_name'] == 'menu_posts')
                        @php
                          $slug = Str::slug($data->title);
                          //dd($slug);
                          $find_in_frontend_menu = DB::table('frontend_menus')->where('url_link',$slug)->first();
                          //dd($find_in_frontend_menu);
                        @endphp 
      
                        <a href="{{ menuUrl($find_in_frontend_menu) }}" target="_blank" style="cursor: pointer;">
                          <div style="border:2px solid white; padding:7px;">
                            <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                              {{@$data->title ?? ''}}
                            </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                              {{@strip_tags(@$data->description) ?? ''}}
                              </span>
                              
                          </div>
                        </a>
                      @endif

                      {{-- @if(@$search['table_name'] == 'teachers')
                      <a href="{{route('faculty.details',@$data->faculty_slug)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->name ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->email) ?? ''}}
                            </span>
                            <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->phone) ?? ''}}
                            </span>
                            
                        </div>
                      </a>
                      @endif --}}

                      {{-- @if(@$search['table_name'] == 'researches')
                      <a href="{{route('research.detail',@$data->id)}}" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->description) ?? ''}}
                            </span>
                            
                            
                        </div>
                      </a>
                      @endif --}}

                      {{-- @if(@$search['table_name'] == 'alumnies')
                      <a href="#alumni" target="_blank" style="cursor: pointer;">
                        <div style="border:2px solid white; padding:7px;">
                          <span style="font-size: 16px; color:black !important; font-weight: bold;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{@$data->title ?? ''}}
                          </span>
                          <span style="font-size: 14px; color:black !important;  overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{@strip_tags(@$data->subtitle) ?? ''}}
                            </span>
                        </div>
                      </a>
                      @endif --}}

                     


          			</div>
              @endforeach
            @endforeach
            @else
            <h4 style="text-align: center;"><a href="">No search result found!</a></h4>
            @endif
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