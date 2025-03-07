<style type="text/css">
    @media (max-width: 320px) {
        .footer_img_div{
            text-align: center;
        }
    }
    #bottom ul li a{
        font-size: 12px;

    }
    #bottom h4{
        font-size: 17px;

    }
</style>
    <section id="bottom" style="float: right;width:100%;">
        <div class="container">
            <div class="bottom">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        @php
                        $usefulLinks = DB::table('useful_links')->get();
                        @endphp
                        <h4>Useful Links</h4>
                        <ul>
                            @foreach($usefulLinks as $usefulLink)
                            <li><a href="{{($usefulLink->link)?route('useful_link',['url'=>$usefulLink->link,'id'=>$usefulLink->id]):'#'}}">{{ $usefulLink->title }}</a></li>
                            @endforeach
                            {{-- <li><a href="#">Skill.jobs</a></li>
                            <li><a href="#">Internship Portal</a></li>
                            <li><a href="#">Foundation Day</a></li>
                            <li><a href="#">Convocation</a></li>
                            <li><a href="#">Brochure</a></li>
                            <li><a href="#">Prospectus</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Brand Documents</a></li>
                            <li><a href="#">Apps</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        @php
                        $quickLinks = DB::table('quick_links')->get();
                        @endphp
                        <h4>Quick Links</h4>
                        <ul>
                            @foreach($quickLinks as $quickLink)
                            {{-- <li><a target="_blank" href="{{ $quickLink->link }}">{{ $quickLink->title }}</a></li> --}}
                            <li><a target="_blank" href="{{($quickLink->link)?route('quick_link',['url'=>$quickLink->link,'id'=>$quickLink->id]):'#'}}">{{ $quickLink->title }}</a></li>
                            @endforeach
                            {{-- <li><a href="#">Skill.jobs</a></li>
                            <li><a href="#">Internship Portal</a></li>
                            <li><a href="#">Foundation Day</a></li>
                            <li><a href="#">Convocation</a></li>
                            <li><a href="#">Brochure</a></li>
                            <li><a href="#">Prospectus</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Brand Documents</a></li>
                            <li><a href="#">Apps</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        @php
                        $forStudents = DB::table('for_students')->get();
                        @endphp
                        <h4>For Students</h4>
                        <ul>
                            @foreach($forStudents as $forStudent)
                            {{-- <li><a href="{{ $forStudent->link }}">{{ $forStudent->title }}</a></li> --}}
                            <li><a href="{{($forStudent->link)?route('for_students',['url'=>$forStudent->link,'id'=>$forStudent->id]):'#'}}">{{ $forStudent->title }}</a></li>
                            @endforeach
                            {{-- <li><a href="#">Skill.jobs</a></li>
                            <li><a href="#">Internship Portal</a></li>
                            <li><a href="#">Foundation Day</a></li>
                            <li><a href="#">Convocation</a></li>
                            <li><a href="#">Brochure</a></li>
                            <li><a href="#">Prospectus</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Brand Documents</a></li>
                            <li><a href="#">Apps</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        @php
                            $instituteDetail = \App\Model\InstituteDetail::first();
                        @endphp

                        <div class="col-sm-12 col-md-12 col-lg-12 footer_img_div">
                            <img src="{{asset('public/upload/institute_details/'.@$instituteDetail->image)}}" alt="BIGM Logo" width="100%" />
                        </div>
                        @php $socialMediaLink = \App\Model\SocialMediaLink::first(); @endphp
                        <div class="social-media" style="text-align: center;margin-top: 20px;">
                            @if(!empty($socialMediaLink) && $socialMediaLink->facebook_status == 1)
                            <a href="{{ !empty($socialMediaLink) ? $socialMediaLink->facebook_link : '' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(!empty($socialMediaLink) && $socialMediaLink->twitter_status == 1)
                            <a href="{{ !empty($socialMediaLink) ? $socialMediaLink->twitter_link : '' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(!empty($socialMediaLink) && $socialMediaLink->instagram_status == 1)
                            <a href="{{ !empty($socialMediaLink) ? $socialMediaLink->instagram_link : '' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if(!empty($socialMediaLink) && $socialMediaLink->linkedin_status == 1)
                            <a href="{{ !empty($socialMediaLink) ? $socialMediaLink->linkedin_link : '' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if(!empty($socialMediaLink) && $socialMediaLink->youtube_status == 1)
                            <a href="{{ !empty($socialMediaLink) ? $socialMediaLink->youtube_link : '' }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if(!empty($socialMediaLink) && $socialMediaLink->whatsapp_status == 1)
                            <a href="{{ !empty($socialMediaLink) ? $socialMediaLink->whatsapp_link : '' }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            @endif
                            @if(!empty($socialMediaLink) && $socialMediaLink->pinterest_status == 1)
                            <a href="{{ !empty($socialMediaLink) ? $socialMediaLink->pinterest_link : '' }}" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                            @endif
                            @if(!empty($socialMediaLink) && $socialMediaLink->mail_status == 1)
                            <a href="mailto:{{ !empty($socialMediaLink) ? $socialMediaLink->mail_link : '' }}" target="_blank"><i class="far fa-envelope"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        @php
                        $getInTouches = DB::table('get_in_touches')->get();
                        @endphp
                        <h4>Get in Touch</h4>
                        <ul>
                            @foreach($getInTouches as $getInTouch)
                            {{-- <li><a href="{{ $getInTouch->link }}">{{ $getInTouch->title }}</a></li> --}}
                            <li><a href="{{($getInTouch->link)?route('get_in_touch',['url'=>$getInTouch->link,'id'=>$getInTouch->id]):'#'}}">{{ $getInTouch->title }}</a></li>
                            @endforeach
                            {{-- <li><a href="#">Skill.jobs</a></li>
                            <li><a href="#">Internship Portal</a></li>
                            <li><a href="#">Foundation Day</a></li>
                            <li><a href="#">Convocation</a></li>
                            <li><a href="#">Brochure</a></li>
                            <li><a href="#">Prospectus</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Brand Documents</a></li>
                            <li><a href="#">Apps</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        @php
                        $fastServices = DB::table('fast_services')->get();
                        @endphp
                        <h4>Fast Services</h4>
                        <ul>
                            @foreach($fastServices as $fastService)
                            {{-- <li><a href="{{ $fastService->link }}">{{ $fastService->title }}</a></li> --}}
                            <li><a href="{{($fastService->link)?route('fast_service',['url'=>$fastService->link,'id'=>$fastService->id]):'#'}}">{{ $fastService->title }}</a></li>
                            @endforeach
                            {{-- <li><a href="#">Skill.jobs</a></li>
                            <li><a href="#">Internship Portal</a></li>
                            <li><a href="#">Foundation Day</a></li>
                            <li><a href="#">Convocation</a></li>
                            <li><a href="#">Brochure</a></li>
                            <li><a href="#">Prospectus</a></li>
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">Brand Documents</a></li>
                            <li><a href="#">Apps</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="row">
                    <div class="col-12">
                        <p class="mb-0">©{{ date("Y") }} Bangladesh Institute of Governance and Management</p>
                    </div>
                </div>
            </div>
        </div>
    </section>