@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<style>
    /* From Fontawesome part */
    /* End From Fontawesome part */
    
    /*! CSS Used from: /vendor/owlcarousel/dist/assets/owl.carousel.min.css */
    .owl-carousel{-webkit-tap-highlight-color:transparent;position:relative;}
    .owl-carousel{display:none;width:100%;z-index:1;}
    .owl-carousel.owl-loaded{display:block;}
    /*! CSS Used from: /public_profile/css/profile.css */
    #shortintro{padding:5px 25px 15px 25px;text-align:justify;}
    .banner-img{
        position:relative;width:100%;height:230px;
        /* background-image:url(https://cu.ac.bd/public_profile/assets/image/banner/banner.png);background-repeat:no-repeat; */
        background: #002D68;
        background-size:cover;
    }
    .profile-img{width:180px;height:180px;border:3px solid white;border-radius:50%;position:absolute;top:42%;left:25px;}
    .divborder{border:1px solid #cccccc;border-radius:5px;padding:5px;}
    #peopleprofile{padding:50px;font-size:16px;}
    #award_list{padding-left:55px;}
    .education-item,.experience-item{display:flex;margin-left:-50px;}
    .education-item-logo,.experience-item-logo{width:0;height:0;padding:24px;background:rgba(128, 128, 128, 0.4);margin-left:10px;margin-right:10px;position:relative;margin-top:6px;border-radius:2%;}
    .education-item-logo > i,.experience-item-logo > i{position:absolute;color:rgba(255, 255, 255, 0.8);font-size:28px;top:12px;right:10px;}
    .light-color-text{color:rgba(0, 0, 0, 0.6);}
    #accomplishment_section .divborder:hover{background-color:#f4f4f4;}
    .activeAccomplish{font-weight:bold;background-color:#f0f0f0;border-radius:5px 5px 0px 0px;}
    #profileinfo{margin:0px;margin-top:55px;margin-left:10px;}
    #designationAndContact{font-size:16px;}
    .profile-section{border:1px solid #cccccc;border-radius:5px;padding:10px 25px 10px 25px;margin-top:10px;}
    .profile-section-title{font-size:18px;font-weight:bold;padding-bottom:5px;}
    .accomplishment-details{background-color:rgba(242, 242, 242, 0.3);padding:20px;border-radius:0px 0px 5px 5px;margin:0px 10px 0px 0px;display:none;}
    .detail-down-arrow{color:#008ae6;float:right;width:20px;}
    .related-people-list-item{margin:0px 15px;font-size:12px;text-align:-webkit-center;box-shadow:1px 2px 2px lightgrey, -1px 1px 2px lightgrey;}
    .related-people-list-item:hover{transform:scale(1.07);transition:0.3s ease-in-out;}
    .related-people-list-item img{border-radius:100%;}
    .related-people-name{font-weight:bold;color:var(--theme-color);}
    @media only screen and (max-width: 768px){
    #peopleprofile{padding:15px;font-size:16px;}
    }
    #social_links{display:flex;padding-top:5px;padding-bottom:1px;}
    .icon{position:relative;text-align:center;width:0px;height:0px;padding:15px;border-top-right-radius:20px;border-top-left-radius:20px;border-bottom-right-radius:20px;border-bottom-left-radius:20px;-moz-border-radius:20px 20px 20px 20px;-webkit-border-radius:20px 20px 20px 20px;-khtml-border-radius:20px 20px 20px 20px;color:#FFFFFF;}
    .icon.social{float:left;margin:0 10px 0 0;cursor:pointer;background:#dce5ef;color:#262626;transition:0.5s;-moz-transition:0.5s;-webkit-transition:0.5s;-o-transition:0.5s;}
    .capsoule_list{list-style-type:none;}
    .capsoule_list > li{width:max-content;padding:5px 10px;display:inline-block;background-color:#293253;color:#fff;border-radius:800px;cursor:pointer;border:1px solid #293253;margin:2px;transition:color .15s ease-in-out, border-color .15s ease-in-out, background-color .15s ease-in-out;}
    .capsoule_list > li:hover{border:1px solid #293253;color:#293253;background-color:white;}
    @media only screen and (max-width: 576px){
    #peopleprofile{padding:0px;}
    }
    @media (max-width: 550px){
    .capsoule_list{padding:0;}
    .capsoule_list > li{max-width:315px;border-radius:0;}
    }
    
    
    
    /*! CSS Used from: /vendor/owlcarousel/dist/assets/owl.carousel.min.css */
    .owl-carousel{-webkit-tap-highlight-color:transparent;position:relative;}
    .owl-carousel{display:none;width:100%;z-index:1;}
    .owl-carousel.owl-loaded{display:block;}
    /*! CSS Used from: /public_profile/css/profile.css */
    .profile-section{border:1px solid #cccccc;border-radius:5px;padding:10px 25px 10px 25px;margin-top:10px;}
    .related-people-list-item{margin:0px 15px;font-size:12px;text-align:-webkit-center;box-shadow:1px 2px 2px lightgrey, -1px 1px 2px lightgrey;}
    .related-people-list-item:hover{transform:scale(1.07);transition:0.3s ease-in-out;}
    .related-people-list-item img{border-radius:100%;}
    .related-people-name{font-weight:bold;color:var(--theme-color);}
    /*! CSS Used from: /public_profile/css/footer.css */
    .cursor{cursor:pointer;}
    
    </style>

    <section id="">
        <div id="peopleprofile" style="padding-top: 0px;">
            <div class="container">
                <a href="{{ url()->previous() }}">Back to Previous Page</a>
                <div id="basic_info_section" style="display: block; border: 1px solid rgb(204, 204, 204); border-radius: 5px; margin-top: 10px;">
                    <div class="banner-img">
                        <img id="tchrProPic" class="profile-img" src="{{ asset('public/upload/members/'.$profileInfo->image) }}">
                    </div>
                    <div id="profileinfo" class="row">
                        <div class="col-md-7" id="nameAndDept">
                            <div id="people_name" style="font-size:20px; font-weight: bold">{{$profileInfo->name}}</div>
                            <div id="people_headline" style="display:none;"></div> 
                        <div>{{ !empty($profileInfo)? $profileInfo->member_designation : '' }}{{ !empty($profileInfo->work_place)? ', '.$profileInfo->work_place : '' }}</div>
                        {{-- <div style="display:flex;" id="designation_dept_institute">{{ !empty($govInfo)? $govInfo->designation : '' }}</div> --}}
                        </div>
                        <div class="col-md-5" id="designationAndContact">
                            <div id="profilecontact">
                                <div style="padding-bottom:4px;display:none;" id="people_bloodgroup_div">
                                    Blood Group:
                                    <span id="blood_group">
                                    </span>
                                </div>
                            <div style="padding-bottom:4px" id="contact_list">Email: {{ !empty($profileInfo)? $profileInfo->email : '' }}<br> @if(@$profileInfo->show_phone) Official Telephone No: {{ !empty($profileInfo)? $profileInfo->phone : '' }} @endif <br></div>
                                
                                <div id="social_links" style="flex-wrap: wrap;">
                                    @if(@$socialMediaLink->facebook)
                                    <div class="icon social" id="social_link_item0" data-toggle="tooltip" title="Facebook">
                                        <a target="_blank" href="{{ @$socialMediaLink->facebook }}"><img src="{{ asset('public/frontend/images/facebook_icon.webp') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                        {{-- <label class="form-check-label" data-toggle="tooltip" data-placement="top" title="Facebook" data-content="hello world"><a target="_blank" href="{{ @$socialMediaLink->facebook }}"><img src="{{ asset('public/frontend/images/facebook_icon.webp') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a></label> --}}
                                        {{-- <label data-toggle="tooltip" title="View Details" class="form-check-label" for="status"><a class="download_link" href=""> <i class="fa fa-info-circle"></i></a></label> --}}
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->linkedin)
                                    <div class="icon social" id="social_link_item1" data-toggle="tooltip" title="Linkedin">
                                        <a target="_blank" href="{{ @$socialMediaLink->linkedin }}"><img src="{{ asset('public/frontend/images/linkedin_icon.svg.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->twitter)
                                    <div class="icon social" id="social_link_item2" data-toggle="tooltip" title="Twitter">
                                        <a target="_blank" href="{{ @$socialMediaLink->twitter }}"><img src="{{ asset('public/frontend/images/twitter_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->skype)
                                    <div class="icon social" id="social_link_item3" data-toggle="tooltip" title="Skype">
                                        <a target="_blank" href="{{ @$socialMediaLink->skype }}"><img src="{{ asset('public/frontend/images/skype_icon.jpeg') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->whatsapp)
                                    <div class="icon social" id="social_link_item4" data-toggle="tooltip" title="Whatsapp">
                                        <a target="_blank" href="{{ @$socialMediaLink->whatsapp }}"><img src="{{ asset('public/frontend/images/whatsapp_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->instagram)
                                    <div class="icon social" id="social_link_item5" data-toggle="tooltip" title="Instagram">
                                        <a target="_blank" href="{{ @$socialMediaLink->instagram }}"><img src="{{ asset('public/frontend/images/instagram_icon.jpeg') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->pinterest)
                                    <div class="icon social" id="social_link_item6" data-toggle="tooltip" title="Pinterest">
                                        <a target="_blank" href="{{ @$socialMediaLink->pinterest }}"><img src="{{ asset('public/frontend/images/pinterest_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->google_scholar)
                                    <div class="icon social" id="social_link_item7" data-toggle="tooltip" title="Google Scholar">
                                        <a target="_blank" href="{{ @$socialMediaLink->google_scholar }}"><img src="{{ asset('public/frontend/images/google_scholar_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->research_gate)
                                    <div class="icon social" id="social_link_item8" data-toggle="tooltip" title="Research Gate">
                                        <a target="_blank" href="{{ @$socialMediaLink->research_gate }}"><img src="{{ asset('public/frontend/images/research_gate_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->publons)
                                    <div class="icon social" id="social_link_item9" data-toggle="tooltip" title="Publons">
                                        <a target="_blank" href="{{ @$socialMediaLink->publons }}"><img src="{{ asset('public/frontend/images/publons_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                    @if(@$socialMediaLink->orcid)
                                    <div class="icon social" id="social_link_item9" data-toggle="tooltip" title="Orcid">
                                        <a target="_blank" href="{{ @$socialMediaLink->orcid }}"><img src="{{ asset('public/frontend/images/orcid_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <hr id="shortbio_hr" style="visibility: visible;">
                    <div style="display: block;" id="shortintro">{!! !empty($profileInfo)? $profileInfo->about : '' !!}</div>
                </div>  <!-- end of banner, profile pic, Contact, description -->
                {{-- @php dd($educationInfos[0]->degree == null); @endphp --}}
                @if($educationInfos->count() > 0 && $educationInfos[0]->degree != null)
                <div id="educations_section" class="profile-section" style="display: block;">
                    <div class="profile-section-title">Education</div>
                    <style>
                        .profile-section-title {
                            margin-left: -8px;
                        }
                    </style>
                    <div>
                        <ul id="education_ul" style="list-style-type: none;">
                            
                            @foreach($educationInfos as $educationInfo)
                                <li><div class="education-item" style=""><div class="education-item-logo"><i class="fa fa-university"></i></div><div><div style="font-weight: bold;">{{ $educationInfo->degree }}</div><div>{{ $educationInfo->subject }}, {{ $educationInfo->education_institution }}, {{ $educationInfo->education_country }}</div><div>{{ $educationInfo->education_year }} - @if(!empty($educationInfo->education_to_year)){{ $educationInfo->education_to_year }} @else {{ "Till Date" }} @endif</div>@if($loop->last != 1)<hr>@endif</div></div></li>
                            @endforeach

                        </ul>
                    </div>
                </div>  <!--end of Education section-->
                @endif
                {{-- @php dd($experienceInfos); @endphp --}}
                @if($experienceInfos->count() > 0 && $experienceInfos[0]->designation != null)
                <div id="experience_section" class="profile-section" style="display: block;">
                    <div class="profile-section-title">Professional Experience</div>
                    <div>
                        <ul id="experience_ul" style="list-style-type:none">

                            @foreach($experienceInfos as $experienceInfo)
                        <li><div class="experience-item" style=""><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">{{ $experienceInfo->designation }}</div><div>{{ $experienceInfo->experience_institution }} {{ $experienceInfo->experience_country }}</div><div class="light-color-text">{{ $experienceInfo->experience_from_month }} {{ $experienceInfo->experience_from_year }} - @if(!empty($experienceInfo->experience_to_month) && !empty($experienceInfo->experience_to_year)){{ $experienceInfo->experience_to_month }} {{ $experienceInfo->experience_to_year }} @else {{ "Till Date" }} @endif</div>@if($loop->last != 1)<hr>@endif</div></div></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
                @endif
                @if($administrativeInfos->count() > 0 && $administrativeInfos[0]->administrative_designation != null)
                <div id="administrative_experience_section" class="profile-section" style="display: block;">
                    <div class="profile-section-title">Administrative Experience</div>
                    <div>
                        <ul id="administrative_experience_ul" style="list-style-type:none">
                            @foreach($administrativeInfos as $administrativeInfo)
                        <li><div class="experience-item" style=""><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">{{ $administrativeInfo->administrative_designation }}</div><div>{{ $administrativeInfo->administrative_details }}</div><div class="light-color-text">{{ $administrativeInfo->administrative_from_month }} {{ $administrativeInfo->administrative_from_year }} - @if(!empty($administrativeInfo->administrative_to_month) && !empty($administrativeInfo->administrative_to_year)){{ $administrativeInfo->administrative_to_month }} {{ $administrativeInfo->administrative_to_year }} @else {{ "Till Date" }} @endif</div>@if($loop->last != 1)<hr>@endif</div></div></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if($interestAreaInfos->count() > 0 && $interestAreaInfos[0]->interest_area != null)
                <div id="interest_section" class="profile-section" style="display: block;">
                    <div class="profile-section-title">Areas of Interest</div>
                    <div>
                        <ul id="interest_ul" class="capsoule_list">
                            @foreach($interestAreaInfos as $interestAreaInfo)
                            <li style="max-width: 100%;"><span>{{ $interestAreaInfo->interest_area }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <!--end of Interest section-->
                @if($awardInfos->count() > 0 && $awardInfos[0]->award_title != null)
                <div id="awards_section" class="profile-section" style="display: block;">
                    <div class="profile-section-title">
                        Honors &amp; Awards
                    </div>
                    <div>
                        <ul id="award_list" style="list-style-type: none">
                            @foreach($awardInfos as $awardInfo)
                            <li><div style="font-weight: bold;">{{ $awardInfo->award_title }}</div><div>{{ $awardInfo->awarded_month }} {{ $awardInfo->awarded_year }}</div><div>{{ $awardInfo->award_description }}</div>@if($loop->last != 1)<hr>@endif</li>
                            @endforeach
                        </ul>
                    </div>
                </div>  <!--end of Honors & Awards section-->
                @endif
                @if($scholarshipInfos->count() > 0 && $scholarshipInfos[0]->scholarship_title != null)
                <div id="scholarships_section" class="profile-section" style="display:block">
                    <div class="profile-section-title">
                        Scholarships &amp; Fellowships
                    </div>
                    <div>
                        <ul id="scholarship_list" style="list-style-type: none">
                            @foreach($scholarshipInfos as $scholarshipInfo)
                            <li><div style="font-weight: bold;">{{ $scholarshipInfo->scholarship_title }}</div><div>{{ $scholarshipInfo->scholarship_month }} {{ $scholarshipInfo->scholarship_year }}</div><div>{{ $scholarshipInfo->scholarship_from }}</div><div style="margin-top: 10px; color: rgba(0, 0, 0, 0.7);">{{ $scholarshipInfo->scholarship_description }}</div>@if($loop->last != 1)<hr>@endif</li>
                            @endforeach
                        </ul>
                    </div>
                </div>  <!--end of Scholarship & Fellowship section-->
                @endif
                
                @if($responsibilityInfos->count() > 0 && $responsibilityInfos[0]->responsibilities_designation != null)
                <div id="professional_responsibilities_section" class="profile-section" style="display: block;">
                    <div class="profile-section-title">Professional Responsibilities</div>
                    <div>
                        <ul id="responsibility_ul" style="list-style-type:none">
                            @foreach($responsibilityInfos as $responsibilityInfo)
                        <li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div><a href="{{ $responsibilityInfo->responsibilities_url_link }}" target="_blank"><span>{{ $responsibilityInfo->responsibilities_designation }}</span></a></div><div>{{ $responsibilityInfo->responsibilities_organization_name }}</div><div class="light-color-text">{{ $responsibilityInfo->responsibilities_from_year }} - @if(!empty($responsibilityInfo->responsibilities_to_year)){{ $responsibilityInfo->responsibilities_to_year }} @else {{ "Till Date" }} @endif</div>@if($loop->last != 1)<hr>@endif</div></div></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                {{-- <div id="academic_associative_membership_section" class="profile-section" style="display: block;">
                    <div class="profile-section-title">Academic Associative Membership</div>
                    <div>
                        <ul id="academic_associative_membership_ul" style="list-style-type:none"><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Life Member</div><div>Lifetime Member</div><div><a href="">Bangla Academy</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Life Member</div><div>Lifetime Member</div><div><a href="">Bangiya Sahitya Parishad, Kolkata, India</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Chief Adviser (2016-present)</div><div>Chief Adviser</div><div><a href="">Foundation of Educational Transparency, Dhaka, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Advisor</div><div>Advisor</div><div><a href="">Coochbehar Anasristi (Science and cultural newspaper), Cooch behar, West Bengal, India</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Advisor</div><div>Advisor</div><div><a href="">Joykali Prakashan (the only international publisher in Bengali language in Bangladesh), Dhaka, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Advisor</div><div>Advisor</div><div><a href="">Kobita Bangla (A magazine on poetry), Dhaka, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Advisor</div><div>Advisor</div><div><a href="">Loka Bangla (A magazine on folklore), Dhaka, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Advisor</div><div>Advisor</div><div><a href="">Bangladesh Heritage Research Centre, Dhaka, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Life Member</div><div>Lifetime Member</div><div><a href="">Hiron Library, Kolkata, India</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Advisor</div><div>Advisor</div><div><a href="">Shwapno Jatri (A cultural organisation), Cox-bazar, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Advisor</div><div>Advisor</div><div><a href="">Mahakal Chinta Shava, Cox-bazar, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Member</div><div>General Member</div><div><a href="">National Rabindra sangeet sommelon parishad, Dhaka, Bangladesh</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Member</div><div>General Member</div><div><a href="">Pandulipi (A Research Magazine), Bangla Department, University of Chittagong</a></div><hr></div></div></li><li><div class="experience-item"><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">Member</div><div>General Member</div><div><a href="">Editorial Board, Journal of Arts, University of Chittagong</a></div></div></div></li></ul>
                    </div>
                </div> --}}

                @if($skillInfos->count() > 0 && $skillInfos[0]->skill != null)
                <div id="skills_section" class="profile-section" style="">
                    <div class="profile-section-title">Skills</div>
                    <div>
                        <ul id="skill_ul" class="capsoule_list">
                            {{-- <li><span>SPSS 21, SmartPLS 2, SmartPLS 3, and AMOS 21</span></li> --}}
                            @foreach($skillInfos as $skillInfo)
                            <li style="max-width: 100%;"><span>{{ $skillInfo->skill }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if(($projectInfos->count() > 0 && $projectInfos[0]->project_title != null) || ($trainingInfos->count() > 0 && $trainingInfos[0]->training_title != null) || ($certificationInfos->count() > 0 && $certificationInfos[0]->certification_title != null))
                <div id="accomplishment_section" class="profile-section" style="display:block;"> 
                    <div class="profile-section-title">Acomplishments</div>
                    <div>
                        @if($projectInfos->count() > 0 && $projectInfos[0]->project_title != null)
                        <div onclick="openProject()" id="projects" data-active="" class="divborder cursor " style="margin:5px 10px 0px 0px;">
                            Projects
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="projectdisplay" class="accomplishment-details" {{-- style="display:block;" --}} > 
                            <ul id="project_list" style="list-style-type:none; padding-left: 58px">
                                @foreach($projectInfos as $projectInfo)
                                <li>
                                    <div>
                                    <a href="{{ $projectInfo->project_url_link }}" target="_blank">{{ $projectInfo->project_title }}</a><div class="light-color-text">{{ $projectInfo->project_from_month }} {{ $projectInfo->project_from_year }} - @if(!empty($projectInfo->project_to_month) && !empty($projectInfo->project_to_year)) {{ $projectInfo->project_to_month }} {{ $projectInfo->project_to_year }} @else {{ "Till Date" }} @endif</div>
                                        <div class="item-description"> {{ $projectInfo->project_description }}</div>@if($loop->last != 1)<hr>@endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if($trainingInfos->count() > 0 && $trainingInfos[0]->training_title != null)
                        <div onclick="openTrainings()" id="trainings" class="divborder cursor " data-active="" style="margin:5px 10px 0px 0px">
                            Training
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="trainingsdisplay" class="accomplishment-details" {{-- style="display:block;" --}} >
                            <ul id="certificateUl" style="list-style-type:none">
                                @foreach($trainingInfos as $trainingInfo)
                                <li>
                                    <div>
                                    <a href="{{ $trainingInfo->training_url_link }}" target="_blank">{{ $trainingInfo->training_title }}</a><div class="light-color-text">{{ $trainingInfo->training_from_month }} {{ $trainingInfo->training_from_year }} - @if(!empty($trainingInfo->training_to_month) && !empty($trainingInfo->training_to_year)) {{ $trainingInfo->training_to_month }} {{ $trainingInfo->training_to_year }} @else {{ "Till Date" }} @endif</div>
                                        <div class="item-description"> {{ $trainingInfo->training_description }}</div>@if($loop->last != 1)<hr>@endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if($certificationInfos->count() > 0 && $certificationInfos[0]->certification_title != null)
                        <div onclick="openCertifications()" id="certifications" class="divborder cursor " data-active="" style="margin:5px 10px 0px 0px">
                            Certifications
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="certificationsdisplay" class="accomplishment-details" {{-- style="display:block;" --}} >
                            <ul id="certificateUl" style="list-style-type:none">
                                @foreach($certificationInfos as $certificationInfo)
                                <li><div style="font-weight: bold;"><a href="{{ $certificationInfo->certification_url_link }}" target="_blank">{{ $certificationInfo->certification_title }}</a></div><div>{{ $certificationInfo->certification_month }} {{ $certificationInfo->certification_year }}</div><div style="margin-top: 10px; color: rgba(0, 0, 0, 0.7);">{{ $certificationInfo->certification_description }}</div>@if($loop->last != 1)<hr>@endif</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                <!--end of Acomplishments section-->
                
                @if(($bookInfos->count() > 0 && $bookInfos[0]->book_title != null) || ($journalInfos->count() > 0 && $journalInfos[0]->journal_title != null) || ($conferenceInfos->count() > 0 && $conferenceInfos[0]->conference_title != null))
                <!-- PUBLICATION SECTION -->
                <div id="publication_section" class="profile-section" style="display:block;">
                    <div class="profile-section-title">Publications</div>
                    <div>
                        <!-- PATENTS -->
                        {{-- <div id="patents" class="divborder cursor activeAccomplish" data-active="1" style="margin: 5px 10px 0px 0px; display: none;">
                            Patents
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="patentdisplay" class="accomplishment-details" style="display: none;">
                            <ul style="list-style-type:none;" id="patents_ul">
            
                            </ul>
                        </div> --}}
                        <!-- BOOKS -->
                        @if($journalInfos->count() > 0 && $journalInfos[0]->journal_title != null)
                        <!-- JOURNALS -->
                        <div onclick="openJournals()" id="journals" class="divborder cursor " data-active="" style="margin:5px 10px 0px 0px">
                            Journals
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="journalsdisplay" class="accomplishment-details" {{-- style="display:block;" --}} >
                            <ul id="journalUl" style="list-style-type:none; padding-left: 58px;">
                                @foreach($journalInfos as $journalInfo)
                                <li><a href="{{ $journalInfo->journal_url_link }}" target="_blank"><span>{{ $journalInfo->journal_title }}</span></a><div style="font-size: 13px; padding-top: 10px;">{{ $journalInfo->journal_description }}; {{ $journalInfo->journal_month }} {{ $journalInfo->journal_year }}</div>@if($loop->last != 1)<hr>@endif</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if($bookInfos->count() > 0 && $bookInfos[0]->book_title != null)
                        <div onclick="openBooks()" id="books" data-active="" class="divborder cursor " style="margin:5px 10px 0px 0px;">
                            Books
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="booksdisplay" class="accomplishment-details" {{-- style="display:block;" --}} >
                            <ul id="book_list" style="list-style-type:none; padding-left: 58px">
                                @foreach($bookInfos as $bookInfo)
                                <li><a href="{{ $bookInfo->book_url_link }}" target="_blank"><span>{{ $bookInfo->book_title }}</span></a><div style="font-size: 13px; padding-top: 10px;">{{ $bookInfo->book_month }} {{ $bookInfo->book_year }}<br><br><span>{{ $bookInfo->book_description }}</span></div>@if($loop->last != 1)<hr>@endif</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if($conferenceInfos->count() > 0 && $conferenceInfos[0]->conference_title != null)
                        <!-- CONFERENCE -->
                        <div onclick="openConferences()" id="conferences" class="divborder cursor " data-active="1" style="margin:5px 10px 0px 0px">
                            Conference &amp; Research Seminar
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="conferencesdisplay" class="accomplishment-details" {{-- style="display:block;" --}} >
                            <ul id="conference_ul" style="list-style-type:none; padding-left: 58px">
                                @foreach($conferenceInfos as $conferenceInfo)
                                <li><a href="{{ $conferenceInfo->conference_url }}" target="_blank"><span>{{ $conferenceInfo->conference_title }}</span></a><div style="font-size: 13px; padding-top: 10px;">{{ $conferenceInfo->conference_description }}; {{ $conferenceInfo->conference_month }} {{ $conferenceInfo->conference_year }}</div>@if($loop->last != 1)<hr>@endif</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($opedInfos->count() > 0 && $opedInfos[0]->op_ed_title != null)
                        <!-- JOURNALS -->
                        <div onclick="openOpeds()" id="opeds" class="divborder cursor " data-active="" style="margin:5px 10px 0px 0px">
                            Op-eds
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="opedsdisplay" class="accomplishment-details" {{-- style="display:block;" --}} >
                            <ul id="opedUl" style="list-style-type:none; padding-left: 58px;">
                                @foreach($opedInfos as $opedInfo)
                                <li><a href="{{ $opedInfo->op_ed_url_link }}" target="_blank"><span>{{ $opedInfo->op_ed_title }}</span></a><div style="font-size: 13px; padding-top: 10px;">{{ $opedInfo->op_ed_description }}; {{ $opedInfo->op_ed_date }} </div>@if($loop->last != 1)<hr>@endif</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
            
                        <!-- TECHNICAL REPORTS -->
                        {{-- <div id="technicalreports" class="divborder cursor activeAccomplish" data-active="1" style="margin:5px 10px 0px 0px">
                            Technical Reports
                            <i class="fa fa-chevron-down detail-down-arrow"></i>
                        </div>
                        <div id="technicalreportdisplay" class="accomplishment-details" style="display:block;">
                            <ul style="list-style-type:none;" id="technicalreports_ul">
            
                            </ul>
                        </div> --}}
            
                </div>
                </div>
                @endif
                @if($taughtCourses->count() > 0 && $taughtCourses[0]->taught_course != null)
                <div id="taught_courses_section" class="profile-section" style="display:block;">
                    <div class="profile-section-title">Taught Courses</div>
                    <div>
                        <ul id="taught_courses_ul" class="capsoule_list">
                            @foreach($taughtCourses as $taughtCourse)
                            <li><span>{{ $taughtCourse->taught_course }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if($languages->count() > 0 && $languages[0]->language != null)
                <div id="languages" class="profile-section" style="display: block;">
                    <div class="profile-section-title">Languages</div>
                    <div>
                        <ul id="lang_ul">
                            @foreach($languages as $language)
                            <li><div><div>{{ $language->language }}</div><div class="light-color-text">{{ $language->proficiency_level }}</div>@if($loop->last != 1)<hr>@endif</div></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if($socialWelfares->count() > 0 && $socialWelfares[0]->social_designation != null)
                <!-- experience on social welfare section -->
                <div id="socialwelfareexperience_section" class="profile-section" style="display:block;">
                    <div class="profile-section-title">Experience on Social Welfare</div>
                    <div>
                        <ul id="socialwelfareexperience_ul" style="list-style-type:none">
                            @foreach($socialWelfares as $socialWelfare)
                        <li><div class="experience-item" style=""><div class="experience-item-logo"><i class="far fa-building"></i></div><div><div style="font-weight: bold;">{{ $socialWelfare->social_designation }}</div><div>{{ $socialWelfare->social_organization_details }}</div><div class="light-color-text">{{ $socialWelfare->social_from_month }} {{ $socialWelfare->social_from_year }} - @if(!empty($socialWelfare->social_to_month) && !empty($socialWelfare->social_to_year)) {{ $socialWelfare->social_to_month }} {{ $socialWelfare->social_to_year }} @else {{ "Till Date" }} @endif</div><div class="item-description"></div>@if($loop->last != 1)<hr>@endif</div></div></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <style>
                .related-people-list-item:hover {
                    transform: none;
                    transition: none;
                }
                .related-people-list-item {
                    box-shadow: none;
                    cursor: none;
                }
                .owl-nav {
                    display: none;
                }
                </style>
                {{-- @php dd($similarInterestMembers->count()); @endphp --}}
                @if($similarInterestMembers->count() >= 4)
                    <div id="related_peoples_section" class="profile-section" style="display: block;">
                        <div style="font-size: 18px; font-weight: bold; padding-bottom:5px">Teachers who have similiar interest</div>
                        <div id="suggestedTeacher" class="owl-carousel owl-theme owl-loaded owl-drag" style="position:relative; margin:0">
                            @foreach($similarInterestMembers as $key => $single)
                            <div class="related-people-list-item">
                                <img src="{{ asset('public/upload/members/'.$single->image) }}" class="cursor">
                                <div class="related-people-name" style="cursor: pointer;">{{ $single->name }}</div>
                                <div style="cursor: pointer;">{{ $single->member_designation }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div id="related_peoples_section" class="profile-section" style="display: block;">
                        <div style="font-size: 18px; font-weight: bold; padding-bottom:5px">Teachers who have similiar interest</div>
                        <div class="row">
                                {{-- <div class="owl-carousel owl-theme"> --}}
                                    @foreach($similarInterestMembers as $key => $single)
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="related-people-list-item">
                                            <img src="{{ asset('public/upload/members/'.$single->image) }}" class="cursor" height="200px;" style="border-radius: 50%;width: 200px;">
                                            <div class="related-people-name">{{ $single->name }}</div>
                                            <div>{{ $single->member_designation }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@include('frontend.layouts.footer')

@if($projectInfos->count() > 0 && $projectInfos[0]->project_title != null)
<script>
    $(document).ready(function(){  
        const projects = document.querySelector('#projects');
        projects.dataset.active = "1";
        document.getElementById("projectdisplay").style.display = "block";
    }); 
</script>
@endif
@if($trainingInfos->count() > 0 && $trainingInfos[0]->training_title != null)
<script>
    $(document).ready(function(){  
        const trainings = document.querySelector('#trainings');
        trainings.dataset.active = "1";
        document.getElementById("trainingsdisplay").style.display = "block";
    }); 
</script>
@endif
@if($certificationInfos->count() > 0 && $certificationInfos[0]->certification_title != null)
<script>
    $(document).ready(function(){  
        const certifications = document.querySelector('#certifications');
        certifications.dataset.active = "1";
        document.getElementById("certificationsdisplay").style.display = "block";
    }); 
</script>
@endif
@if($bookInfos->count() > 0 && $bookInfos[0]->book_title != null)
<script>
    $(document).ready(function(){  
        const books = document.querySelector('#books');
        books.dataset.active = "1";
        document.getElementById("booksdisplay").style.display = "block";
    }); 
</script>
@endif
@if($journalInfos->count() > 0 && $journalInfos[0]->journal_title != null)
<script>
    $(document).ready(function(){  
        const journals = document.querySelector('#journals');
        journals.dataset.active = "1";
        document.getElementById("journalsdisplay").style.display = "block";
    }); 
</script>
@endif
@if($opedInfos->count() > 0 && $opedInfos[0]->op_ed_title != null)
<script>
    $(document).ready(function(){  
        const opeds = document.querySelector('#opeds');
        opeds.dataset.active = "1";
        document.getElementById("opedsdisplay").style.display = "block";
    }); 
</script>
@endif
@if($conferenceInfos->count() > 0 && $conferenceInfos[0]->conference_title != null)
<script>
    $(document).ready(function(){  
        const conferences = document.querySelector('#conferences');
        conferences.dataset.active = "1";
        document.getElementById("conferencesdisplay").style.display = "block";
    }); 
</script>
@endif
<script>
    $(document).ready(function(){  
        
    }); 
    function openProject() {
        const projects = document.querySelector('#projects');
        var element = document.getElementById("projects");
        // The following would also work:
        // const projects = document.getElementById("electric-cars")
        if(projects.dataset.active == 1)
        {
            document.getElementById("projectdisplay").style.display = "none";
            element.classList.remove("activeAccomplish");
            projects.dataset.active = "0";
        }
        else if(projects.dataset.active == 0)
        {
            document.getElementById("projectdisplay").style.display = "block";
            element.classList.add("activeAccomplish");
            projects.dataset.active = "1";
        }
        else
        {
            console.log(projects.dataset.active+" nothing");
        }    
    } 
    function openCertifications() {
        const certifications = document.querySelector('#certifications');
        var element = document.getElementById("certifications");
        // The following would also work:
        // const certifications = document.getElementById("electric-cars")
        if(certifications.dataset.active == 1)
        {
            document.getElementById("certificationsdisplay").style.display = "none";
            element.classList.remove("activeAccomplish");
            certifications.dataset.active = "0";
        }
        else if(certifications.dataset.active == 0)
        {
            document.getElementById("certificationsdisplay").style.display = "block";
            element.classList.add("activeAccomplish");
            certifications.dataset.active = "1";
        }
        else
        {
            console.log(certifications.dataset.active+" nothing");
        }    
    } 
    function openTrainings() {
        const trainings = document.querySelector('#trainings');
        var element = document.getElementById("trainings");
        // The following would also work:
        // const trainings = document.getElementById("electric-cars")
        if(trainings.dataset.active == 1)
        {
            document.getElementById("trainingsdisplay").style.display = "none";
            element.classList.remove("activeAccomplish");
            trainings.dataset.active = "0";
        }
        else if(trainings.dataset.active == 0)
        {
            document.getElementById("trainingsdisplay").style.display = "block";
            element.classList.add("activeAccomplish");
            trainings.dataset.active = "1";
        }
        else
        {
            console.log(trainings.dataset.active+" nothing");
        }    
    } 
    function openBooks() {
        const books = document.querySelector('#books');
        var element = document.getElementById("books");
        // The following would also work:
        // const books = document.getElementById("electric-cars")
        if(books.dataset.active == 1)
        {
            document.getElementById("booksdisplay").style.display = "none";
            element.classList.remove("activeAccomplish");
            books.dataset.active = "0";
        }
        else if(books.dataset.active == 0)
        {
            document.getElementById("booksdisplay").style.display = "block";
            element.classList.add("activeAccomplish");
            books.dataset.active = "1";
        }
        else
        {
            console.log(books.dataset.active+" nothing");
        }    
    } 
    function openJournals() {
        const journals = document.querySelector('#journals');
        var element = document.getElementById("journals");
        // The following would also work:
        // const journals = document.getElementById("electric-cars")
        if(journals.dataset.active == 1)
        {
            document.getElementById("journalsdisplay").style.display = "none";
            element.classList.remove("activeAccomplish");
            journals.dataset.active = "0";
        }
        else if(journals.dataset.active == 0)
        {
            document.getElementById("journalsdisplay").style.display = "block";
            element.classList.add("activeAccomplish");
            journals.dataset.active = "1";
        }
        else
        {
            console.log(journals.dataset.active+" nothing");
        }    
    } 
    function openOpeds() {
        const opeds = document.querySelector('#opeds');
        var element = document.getElementById("opeds");
        // The following would also work:
        // const journals = document.getElementById("electric-cars")
        if(opeds.dataset.active == 1)
        {
            document.getElementById("opedsdisplay").style.display = "none";
            element.classList.remove("activeAccomplish");
            opeds.dataset.active = "0";
        }
        else if(opeds.dataset.active == 0)
        {
            document.getElementById("opedsdisplay").style.display = "block";
            element.classList.add("activeAccomplish");
            opeds.dataset.active = "1";
        }
        else
        {
            console.log(opeds.dataset.active+" nothing");
        }    
    } 
    function openConferences() {
        const conferences = document.querySelector('#conferences');
        var element = document.getElementById("conferences");
        // The following would also work:
        // const conferences = document.getElementById("electric-cars")
        if(conferences.dataset.active == 1)
        {
            document.getElementById("conferencesdisplay").style.display = "none";
            element.classList.remove("activeAccomplish");
            conferences.dataset.active = "0";
        }
        else if(conferences.dataset.active == 0)
        {
            document.getElementById("conferencesdisplay").style.display = "block";
            element.classList.add("activeAccomplish");
            conferences.dataset.active = "1";
        }
        else
        {
            console.log(conferences.dataset.active+" nothing");
        }    
    } 
</script>



@endsection