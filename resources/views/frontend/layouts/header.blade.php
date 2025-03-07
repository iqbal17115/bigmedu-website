<style type="text/css">
  @media (max-width: 320px) {
    .heading{
      text-align: center;
      margin-bottom: 20px;
    }
  }
</style>
<style>
  #header_slider.dark { background-color: #002D67; border-radius: 8px; }
  #header_slider a { text-decoration: none; }

  /* Navigation Styles */
  #header_slider nav { position: relative;  }

  #header_slider ul.main-nav { 
    list-style-type: none; 
    padding: 0px;
    font-size: 0px;
    padding-left: 16px;
    padding-right: 16px;
    margin: 0 auto;
  }

  #header_slider ul.main-nav > li { 
    display: inline-block;
    padding: 0; 
  }

  #header_slider ul.main-nav > li > a { 
    display: block;
    padding: 10px 9px;
    position: relative;
    color: #fff;
    font-size: 13px;
    font-weight: 400;
    box-sizing: border-box;
  }

  #header_slider ul.main-nav > li:hover { background-color: #f9f9f9; }
  #header_slider ul.main-nav > li:hover > a { color: #333; font-weight: 400; }

  #header_slider ul.main-nav > li ul.sub-menu-lists {
    margin: 0px;
    padding: 0px;
    list-style-type : none;
    display:block;
  }

  #header_slider ul.main-nav > li ul.sub-menu-lists > li {
    padding: 2px 0;
  }

  #header_slider ul.main-nav > li ul.sub-menu-lists > li > a {
    font-size: 14px;
  }

  #header_slider .ic {
    position: fixed; 
    cursor: pointer;
    display: inline-block;
    right: 25px;
    width: 32px;
    height: 24px;
    text-align: center;
    top:0px;
    outline: none;
  }

  #header_slider .ic.close { 
    opacity: 0; 
    font-size: 0px; 
    font-weight: 300; 
    color: #fff;
    top:8px;
    height:40px;
    display: block;
    outline: none;
  }

  /* Menu Icons for Devices*/
  #header_slider .ic.menu { top:25px; z-index : 20; }

  #header_slider .ic.menu .line { 
    height: 4px; 
    width: 100%; 
    display: block; 
    margin-bottom: 6px; 
  }
  #header_slider .ic.menu .line-last-child { margin-bottom: 0px;  }

  #header_slider .sub-menu-head { margin: 10px 0; }
  #header_slider .banners-area { margin-top: 20px; padding-top: 15px; }


  @media only screen and (max-width:768px) {
    #header_slider .sub-menu-head { color:orange; }
    #header_slider .ic.menu { display: block; }
    #header_slider.dark .ic.menu .line { background-color: #002D67; } 
    #header_slider.light .ic.menu .line { background-color: #000; }
    #header_slider .ic.menu .line {
      -webkit-transition: all 0.4s ease 0s;
      -o-transition: all 0.4s ease 0s;
      transition: all 0.4s ease 0s;
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transform-origin: center center;
      -ms-transform-origin: center center;
      transform-origin: center center;
    }
    #header_slider .ic.menu:focus .line { background-color: #fff !important; }
    
    #header_slider .ic.menu:focus .line:nth-child(1) { 
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg); 
    }
    
    #header_slider .ic.menu:focus .line:nth-child(2){ 
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      transform: rotate(-45deg); 
      margin-top: -10px;
    }
    
    #header_slider .ic.menu:focus .line:nth-child(3){
      transform: translateY(15px);
      opacity: 0;
    }
    
    #header_slider .ic.menu:focus{ outline: none; }
    #header_slider .ic.menu:focus ~ .ic.close { opacity: 1; z-index : 21;  outline: none;  }
    
  /*
  
  .ic.menu:focus ~ .ic.close { opacity: 1.0; z-index : 21;  }
  .ic.close:focus { opacity: 0; }
  */
  #header_slider .ic.menu:hover, 
  #header_slider .ic.menu:focus{ opacity: 1; }
  

  #header_slider nav { background-color: transparent; }
  
  /* Main Menu for Handheld Devices  */
  #header_slider ul.main-nav {
    z-index:2; 
    padding: 50px 0;
    position: fixed;
    right: 0px;
    top: 0px;
    width: 0px;
    background-color:rgba(0,0,0,1);
    height: 100%;
    overflow: auto;
    /*CSS animation applied : Slide from Right*/
    -webkit-transition-property: background, width;
    -moz-transition-property: background, width;
    -o-transition-property: background, width;
    transition-property: background, width;
    -webkit-transition-duration: 0.6s;
    -moz-transition-duration: 0.6s;
    -o-transition-duration: 0.6s;
    transition-duration: 0.6s;
  }
  
  #header_slider .ic.menu:focus ~ .main-nav { width: 300px; background-color:rgba(0,0,0,1); }
  
  #header_slider ul.main-nav > * { 
    -webkit-transition-property: opacity;
    -moz-transition-property: opacity;
    -o-transition-property: opacity;
    transition-property: opacity;
    -webkit-transition-duration: 0.4s;
    -moz-transition-duration: 0.4s;
    -o-transition-duration: 0.4s;
    transition-duration: 0.4s;
    opacity: 0;
  }
  #header_slider .ic.menu:focus ~ .main-nav > * {opacity: 1;}
  
  #header_slider ul.main-nav > li > a:after {display: none;}
  #header_slider ul.main-nav > li:first-child { border-radius: 0px; }
  #header_slider ul.main-nav > li {
    display: block;
    border-bottom: 1px solid #444;
  }
  
  #header_slider ul.main-nav > li > a { font-weight: 600; }
  
  #header_slider ul.main-nav > li ul.sub-menu-lists > li a { color: #eee; font-size: 14px; }
  #header_slider .sub-menu-head { font-size: 16px;}
  #header_slider ul.main-nav > li:hover { background-color: transparent;  }
  #header_slider ul.main-nav > li:hover > a {color: #fff; text-decoration: none; font-weight: 600;}
  #header_slider .ic.menu:focus ~ ul.main-nav > li > div.sub-menu-block {
    border-left: 0px solid #ccc;
    border-right: 0px solid #ccc;
    border-bottom: 0px solid #ccc;
    position: relative;
    visibility: visible;
    opacity: 1.0;
  }
  
  #header_slider .sub-menu-block { padding: 0 30px; }
  #header_slider .banners-area { padding-bottom: 0px;  }
  #header_slider .banners-area div { margin-bottom: 15px;  }
  #header_slider .banners-area { border-top: 1px solid #444; }
}

@media only screen and (min-width:769px) {
  #header_slider .ic.menu { display: none; }
  /* Main Menu for Desktop Devices  */
  #header_slider ul.main-nav { display: block; position: relative; }
  #header_slider .sub-menu-block { padding: 15px; }
  
  /* Sub Menu */
  #header_slider ul.main-nav > li > div.sub-menu-block { 
    visibility: hidden;
    background-color: #f9f9f9;
    position: absolute;
    margin-top: 0px;
    width: 100%;
    color: #333;
    left: 0;
    box-sizing: border-box;
    z-index : 3;
    font-size: 16px;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    opacity: 0;
    
    /*CSS animation applied for sub menu : Slide from Top */
    -webkit-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    -webkit-transform: rotateX(90deg);
    -moz-transform: rotateX(90deg);
    -ms-transform: rotateX(90deg);
    transform: rotateX(90deg);
    -webkit-transform-origin: top center;
    -ms-transform-origin: top center;
    transform-origin: top center;
    
  }
  
  #header_slider ul.main-nav > li:hover > div.sub-menu-block{ 
    background-color: #f9f9f9; 
    visibility: visible;
    opacity: 1;
    -webkit-transform: rotateX(0deg);
    -moz-transform: rotateX(0deg);
    -ms-transform: rotateX(0deg);
    transform: rotateX(0deg);
  }
  
  #header_slider ul.main-nav > li > div.sub-menu-block > * {
    -webkit-transition-property: opacity;
    -moz-transition-property: opacity;
    -o-transition-property: opacity;
    transition-property: opacity;
    -webkit-transition-duration: 0.4s;
    -moz-transition-duration: 0.4s;
    -o-transition-duration: 0.4s;
    transition-duration: 0.4s;
    opacity: 0;
  }
  
  #header_slider ul.main-nav > li:hover > div.sub-menu-block > * {
    opacity: 1;
  }
  
  #header_slider .sub-menu-head { font-size: 20px;}
  
  /* List Separator: Outer Border */
  #header_slider.dark ul.main-nav > li > a { border-right: 1px solid #bbb; }
  #header_slider.light ul.main-nav > li > a { border-right: 1px solid #666; }
  
  /* List Separator: Inner Border */
  #header_slider ul.main-nav > li > a:after {
    content: '';
    width: 1px;
    position: absolute;
    right:0px;
    top: 0px;
    z-index : 2;
  }
  #header_slider.dark ul.main-nav > li > a:after { background-color: #777; }
  #header_slider.light ul.main-nav > li > a:after { background-color: #999; }
  
  /* Drop Down/Up Arrow for Mega Menu */
  #header_slider ul.main-nav > li > a.mega-menu > span { display: block; vertical-align: middle; }
/*  #header_slider ul.main-nav > li > a.mega-menu > span:after {
    width: 0; 
    height: 0; 
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #fff;
    content: '';
    background-color: transparent;
    display: inline-block;
    margin-left: 10px;
    vertical-align: middle;
    }*/

    #header_slider ul.main-nav > li:hover > a.mega-menu span:after{
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-top: 0px solid transparent;
      border-bottom: 5px solid #666;
    }
    #header_slider .banners-area { border-top: 1px solid #ccc; }
  }
  .hyperlink_css{
    color: #333333;
    padding-left: 10px;
    display: block;
  }
  .hyperlink_css:hover{
    background: #002d67;
    color: white;
  }

</style>
<style>
    #top-bar ul li a {
    text-decoration: none;
    line-height: 46px;
    color: #002d68;
    font-weight: 450;
}
</style>
<style>
  @media only screen and (max-width: 768px)
      {
        #top-bar .d-flex .newsAndEventsShorter {
            display: none;
        }
        #top-bar .d-flex .contactUsShorter
        {
          display: none;
        }
        #top-bar .d-flex .oldWebsiteShorter
        {
          display: none;
        }
      }
</style>

<style>
  .blink_text
  {
      animation:1s blinker linear infinite;
      -webkit-animation:1s blinker linear infinite;
      -moz-animation:1s blinker linear infinite;
      color: red;
  }

  @-moz-keyframes blinker
  {  
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
  }

  @-webkit-keyframes blinker
  {  
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
  }

  @keyframes blinker
  {  
      0% { opacity: 1.0; }
      50% { opacity: 0.0; }
      100% { opacity: 1.0; }
  }
</style>
<section id="top-bar" style="background-color: #002D68;text-align: center;">
  <div class="container" style="">
    <div class="row" style="">
      @php
        $controlTopLeftMenu = App\Model\ControlTopLeftMenu::first();
      @endphp
      <div class="col-sm-12 col-md-5 col-lg-5">
        @if(@$controlTopLeftMenu->status == 1)
          <ul class="d-flex left">
            @php
            $library_menu = DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type','=','library')->orderBy('sort_order','asc')->first();
            @endphp
            {{-- <li><a href="{{menuUrl($library_menu)}}">e-Library</a></li> --}}
            <li><a href="{{route('library_subject_wise_book')}}">e-Library</a></li>
            {{-- @php dd($library_menu); @endphp
            @php dd(menuUrl($library_menu)); @endphp --}}
            {{-- <li><a style="" href="{{ route('news_single_page') }}">News<span class="newsAndEventsShorter"> & Events<span></a></li>
            <li><a href="{{ route('career_jobs') }}">Career</a></li>
            @php
            $alumni_menu = DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type','=','alumni')->orderBy('sort_order','asc')->first();
            @endphp
            <li><a href="{{menuUrl($alumni_menu)}}">Alumni</a></li> --}}
            @php
            $blog_menu = DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type','=','blog')->orderBy('sort_order','asc')->first();
            @endphp
            <li><a href="{{menuUrl($blog_menu)}}">Blog</a></li>
            {{-- <li><a href="{{ route('bigm_journal_policy') }}" class="" style="color: yellow;">Online Submission – BIGM Journal</a></li> --}}
            <li><a target="_blank" href="http://103.125.253.234/oldbigm/Bigm/UserAuthentication/Create" class="" style="color: yellow;">Apply Online</a></li>
          </ul>
        @endif
      </div>

      <style>
          #top-bar ul li a {
              color: #FFFFFF;
          }
          @media only screen and (max-width: 768px)
          {
            #header_slider.dark .ic.menu .line {
                background-color: #8AC63D;
            }
            #header_slider.dark .main-nav .top-level-link a {
              font-size: 4vw !important;
            }
            .d-flex.right .right-icons {
                display: none;
            }
            #top-bar ul.right li a {
              border-left: none !important;
              padding-left: 0 !important;
            }
            #top-bar ul {
              /* padding: 0; */
            }
          }
          
      </style>
      
      <div class="col-sm-12 col-md-7 col-lg-7">
        <ul class="d-flex right">
          <li style="padding-right: 0px;white-space: nowrap;"><a href="http://103.125.253.234/oldbigm" target="_blank"><i class="fas fa-globe right-icons"></i> Old Web<span class="oldWebsiteShorter">site</span> </a></li>
          <li style="padding-right: 0px;white-space: nowrap;"><a style="" href="{{ route('gallery') }}"><i class="fas fa-images right-icons"></i> Gallery </a></li>
          <li style="padding-right: 0px;white-space: nowrap;"><a style="" href="{{ route('location') }}"><i class="fas fa-map-marker-alt right-icons"></i> Location </a></li>
          <li style="padding-right: 0px;white-space: nowrap;"><a style="" href="{{ route('contact.us') }}"><i class="fa fa-phone right-icons"></i> Contact<span class="contactUsShorter"> Us<span> </a></li>
          <li style="padding-right: 0px;white-space: nowrap;"><a style="" class="openBtn" onclick="openSearch()"><i class="fa fa-search right-icons"></i> Search </a></li>
          <li style="padding-right: 0px;white-space: nowrap;"><a style="" target="_blank" href="{{ route('login') }}"><i class="fas fa-sign-in-alt right-icons"></i> Login </a></li>
          <style>
            @media only screen and (max-width: 768px)
              {
                #myOverlay.overlay {
                  left: -10px !important;
                }
                #myOverlay.overlay .closebtn {
                  right: 4% !important;
                }
                .overlay button {
                  width: unset !important;
                }
              }
          </style>
          <div id="myOverlay" class="overlay" style="height: 110px;">
            <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
            <div class="overlay-content">
              <form action="{{ route('search') }}" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          
          <script>
          function openSearch() {
            document.getElementById("myOverlay").style.display = "block";
          }
          
          function closeSearch() {
            document.getElementById("myOverlay").style.display = "none";
          }
          </script>
          
        </ul>
      </div>
    </div>
  </div>
</section>
<style>
  @media only screen and (max-width: 768px)
  {
    .header_sticky_not_for_small_screen{
      position: initial !important;
    }
    #bigm_logo_for_sticky {
      display: none !important;
    }
  }
</style>
<style>
  .innovate {
    transform:  translate(30px, 20px) rotate(-15deg);
    /* width: 250px; */
    height: 60px;
    font-family: Tahoma;
    font-size: 20px;
  }
  
  .enrich {
   
  /* margin: -25px 50px 75px 200px; */
  font-family: Tahoma;
  font-size: 20px;
  }
  </style>
<section id="header" style="">
  <div class="py-3">
    <div class="col-sm-12 col-md-12 col-lg-12 row">
      @php
        $instituteDetail = \App\Model\InstituteDetail::first();
      @endphp
      <div class="col-sm-12 col-md-2 col-lg-2">
        <div class="logo" style="text-align: center;">
          <a href="{{url('/')}}"><img src="{{asset('public/upload/institute_details/'.$instituteDetail->image)}}" alt="BIGM Logo" height="88px" style="padding-left: 10px;" /></a>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="heading">
          <h3 style="font-size: 32px;font-family: Tahoma;">{{ @$instituteDetail->institute_name }}</h3>
          <small style="font-size: 22px;font-family: Tahoma;">{{ @$instituteDetail->previous_name }}</small>
          <p style="font-size: 20px;margin-bottom: 7px;font-family: Tahoma;color: #1f2021 !important;">{{ @$instituteDetail->institute_description }}</p>
          <p style="font-size: 20px;font-family: Tahoma;">{{ @$instituteDetail->slogan }}</p>
        </div>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">
        <p class="innovate" style="color: #002D68;">Innovate to Build a Vibrant Bangladesh</p><br>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">
        <p class="enrich">
          •	Enrich   <br>    
          •	Elevate <br>
          •	Emancipate <br>
        </p>
      </div>
      {{-- <div class="col-sm-12 col-md-2 col-lg-2">
          
      </div> --}}
      {{-- <div class="col-sm-12 col-md-2 col-lg-2">
        <p class="innovate">Innovate to Build a Vibrant Bangladesh</p><br>
          <p class="enrich">
            •	Enrich   <br>    
            •	Elevate <br>
            •	Emancipate <br>
          </p>
      </div> --}}
    </div>
  </div>
</section>
<style>
    #header .heading h3 {
        color: #002D67;
        margin-bottom: 0px;
        text-align: center;
        font-size: 30px;
        font-weight: 700;
    }
    #header .heading small {
        color: #002D67;
        font-size: 18px;
        font-weight: 700;
        text-align: center;
        display: block;
    }
    #header .heading p {
        color: #002D67;
        margin-bottom: 0px;
        font-weight: 700;
        text-align: center;
        font-size: 17px;
    }
</style>
<style>
  @media only screen and (max-width: 768px)
      {
        #header_slider.dark .ic.menu .line {
            background-color: #8AC63D;
        }
        #header_slider.dark .main-nav .top-level-link a {
          font-size: 4vw !important;
        }
        #marquee .whats_new_icon .update_text_news {
            display: none;
            width:700;
        }
      }
</style>
<style>
  @media only screen and (max-width: 1026px)
  {
    .whats_new_icon {
      margin-top: -35.5px !important;
    }
  }
</style>
<style>
    /*! CSS Used from: /css/app.css */
    *,:after,:before{box-sizing:border-box;}
    @media print{
    *,:after,:before{text-shadow:none!important;box-shadow:none!important;}
    }
    /*! CSS Used from: /css/styles1.css */
    .whats_new_icon{
      width:999;
      background:#8AC53C;color:black;position:absolute;margin-top: -36.5px;z-index:99;font-size:13px;font-weight:700;padding: 5.7px;}
    /*! CSS Used from: /css/styles1_responsive.css */
    @media screen and (max-width:1023px){
    div{font-size:13px;}
    }
</style>
<section id="marquee">
  <div class="" style="max-width: 100%;">
    {{-- #364e72 --}}
    @php
      $scrollbarNews = \App\Model\News::where('display_on_scrollbar',1)->orderBy('id','desc')->get();
    @endphp
    <marquee style="background:#002D68;color:white;font-weight:600;position:relative;z-index:1;height: 30px;" onmouseover="stop()" onmouseout="start()">

        @foreach($scrollbarNews as $n)
            <a href="{{ route('news',$n->id) }}" style="font-size: 17px; font-family: Tahoma;">{{ $n->title }}</a> {{ $loop->last ? '' : '|' }}
        @endforeach

    </marquee>
    <div class="whats_new_icon" style="border-top-right-radius: 5px !important;border-bottom-right-radius: 5px !important;white-space: nowrap;">
      News<span class="update_text_news"> Update</span>
    </div>
    
  </div>
  <style>
      /*! CSS Used from: /css/app.css */
      *,:after,:before{box-sizing:border-box;}
      a{color:#3490dc;text-decoration:none;background-color:transparent;}
      a:hover{color:#1d68a7;text-decoration:underline;}
      @media print{
      *,:after,:before{text-shadow:none!important;box-shadow:none!important;}
      a:not(.btn){text-decoration:underline;}
      }
      /*! CSS Used from: /css/styles1.css */
      marquee a{color:#fff!important;font-size:13px;font-weight:600;}
      /*! CSS Used from: /css/styles1_responsive.css */
      @media screen and (max-width:1023px){
      a{font-size:13px;}
      marquee{margin-top:6px;}
      }
      /*! CSS Used from: https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css */
      a{background-color:transparent;-webkit-text-decoration-skip:objects;}
      a:active,a:hover{outline-width:0;}
  </style>
</section>
<section id="menu" class="header_sticky_not_for_small_screen" style="position: sticky;top: 0;z-index: 999999;">
  <div class="" style="max-width: 100%;position: sticky;top: 0;z-index: 999999;">
    <div class="col-sm-12 col-md-12 col-lg-12 row" style="margin:0;">
      <div class="col-sm-12 col-md-12 col-lg-12" style="padding:0;">
        <div id="header_slider" class="dark" style="border-radius: 0px;">
          <nav role="navigation">
            <a href="javascript:void(0);" class="ic menu" tabindex="1">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </a>
            <style>
              @media only screen and (min-width: 769px) 
              {
                #header_slider.dark ul.main-nav > li > a {
                    border-left: 1px solid #bbb !important;
                    border-right: none;
                }
              }
              @media only screen and (max-width: 768px)
              {
                #header_slider.dark .ic.menu .line {
                    background-color: #8AC63D;
                }
                #header_slider.dark .main-nav .top-level-link a {
                  font-size: 4vw !important;
                }
                #header_slider .ic.menu {
                    top: 33px;
                    z-index: 20;
                    right: 10px;
                }
              }
              @media only screen and (min-width: 1200px)
              {
                #header_slider.dark ul.main-nav > li > a {
                  font-size: .9vw !important;
                }
              }
            </style>
            <a href="javascript:void(0);" class="ic close"></a>
            <ul class="main-nav" style="text-align: center;">
              {{-- <li class="top-level-link" style="display: none;background: white !important;" id="bigm_logo_for_sticky">
                <a href="{{url('/')}}" style="border-left: none !important;"><img src="{{asset('public/upload/institute_details/'.$instituteDetail->image)}}" alt="BIGM Logo" height="20px" width="100px;" /></a>
              </li> --}}
              <script>
                function heightfind()
                {
                  var clientHeight = document.getElementById('homeMenu').clientHeight;
                  //var clientWidth = document.getElementById('homeMenu').clientWidth;
                  //alert(clientHeight);
                  // var clientHeight = document.getElementById('homeMenu').style.height;
                  // alert(clientHeight);
                  document.getElementById('bigm_logo_for_sticky').height = clientHeight;
                  //document.getElementById('bigm_logo_for_sticky').width = clientWidth;
                }
              </script>
              <a href="{{url('/')}}" style="border-left: none !important;"><img onload="heightfind()" id="bigm_logo_for_sticky" style="display: none;background: white;vertical-align: center;margin-top: -.65vw;" src="{{asset('public/upload/institute_details/'.$instituteDetail->image)}}" alt="BIGM Logo" height="" width="100px" /></a>
              <li class="top-level-link" id="homeMenu">
                <a href="{{url('/')}}" style="cursor: pointer;font-family: Tahoma;font-size: 1vw;border-left: none !important;"><span><strong> Home</strong></span></a>      
              </li>
              
              @php
              $where = [];
              $main_menu = DB::table('frontend_menus')->where('status',1)->where('id','=',request()->menu_id)->first();
              if(@$main_menu->menu_type =='library' || @$main_menu->menu_type =='alumni' || @$main_menu->menu_type =='blog'){
                $where[] = ['menu_type','=',@$main_menu->menu_type];
                $parents = DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where($where)->orderBy('sort_order','asc')->get();
              }elseif(@$main_menu->program_info_id && @$main_menu->course_info_id){
                $where[] = ['menu_type','=','course_menu'];
                if($main_menu->menu_type != 'none'){
                  $main_menu = DB::table('frontend_menus')->where('status',1)->where('rand_id','=',$main_menu->parent_id)->first();
                  if($main_menu->menu_type != 'none'){
                    $main_menu = DB::table('frontend_menus')->where('status',1)->where('rand_id','=',$main_menu->parent_id)->first();
                    if($main_menu->menu_type != 'none'){
                      $main_menu = DB::table('frontend_menus')->where('status',1)->where('rand_id','=',$main_menu->parent_id)->first();
                    }
                  }
                }
                $parents = DB::table('frontend_menus')->where('status',1)->where($where)->where('parent_id',@$main_menu->rand_id)->orderBy('sort_order','asc')->get();
              }else{
                $where[] = ['menu_type','=','none'];
                $parents = DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where($where)->orderBy('sort_order','asc')->get();
              }
              @endphp
              @foreach($parents as $parent)
              @php
              $parents = DB::table('frontend_menus')->where('status',1)->where('parent_id',$parent->rand_id)->where($where)->orderBy('sort_order','asc')->get();
              @endphp
              @if(count($parents) == 0)
              <li class="top-level-link">
                <a href="{{menuUrl($parent)}}" style="cursor: pointer;font-family: Tahoma;font-size: 1vw;"><span><strong> {{$parent->title_en}}</strong></span></a>
              </li>
              @else
              <li class="top-level-link">
                <a style="cursor: pointer;font-family: Tahoma;font-size: 1vw;" class="mega-menu"><span><strong> {{$parent->title_en}}</strong></span></a>
                <div class="sub-menu-block" style="opacity: 0.8 !important;text-align: left !important;">
                  <div class="row">
                    @php $html = '';@endphp
                    @foreach($parents as $parent)
                    @php
                    $parents = DB::table('frontend_menus')->where('status',1)->where('parent_id',$parent->rand_id)->where($where)->orderBy('sort_order','asc')->get();
                    @endphp
                    @if(count($parents) == 0)
                    <?php $html .='<li><a href="'.menuUrl($parent).'" class="hyperlink_css" style="font-size: 1vw;">'.$parent->title_en.'</a></li>'?>
                    @else
                    <div class="col-md-3 col-lg-3 col-sm-3">
                      <h2 class="sub-menu-head">{{$parent->title_en}}</h2>
                      <ul class="sub-menu-lists">
                        @foreach($parents as $parent)
                        @php
                        $parents = DB::table('frontend_menus')->where('status',1)->where('parent_id',$parent->rand_id)->where($where)->orderBy('sort_order','asc')->get();
                        @endphp
                        @if(count($parents) == 0)
                        <li><a href="{{menuUrl($parent)}}" style="font-family: Tahoma;font-size: 1vw;" class="hyperlink_css">{{$parent->title_en}}</a></li>
                        @else
                        <li>
                          <a><strong style="font-family: Tahoma;font-size: 1vw;">{{$parent->title_en}}</strong></a>
                          <ul style="padding-left: 13px;">
                            @foreach($parents as $parent)
                            <li style="list-style: none;"><a href="{{menuUrl($parent)}}" class="hyperlink_css" style="font-family: Tahoma;font-size: 1vw;">{{$parent->title_en}}</a></li>
                            @endforeach
                          </ul>
                        </li>
                        @endif
                        @endforeach
                      </ul>           
                    </div>
                    @endif
                    @endforeach
                    @if($html)
                    <div class="col-md-3 col-lg-3 col-sm-3">
                      <ul class="sub-menu-lists">
                        <?php echo $html?>
                      </ul>           
                    </div>
                    @endif
                  </div>
                </div>
              </li>
              @endif
              @endforeach
            </ul> 
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>

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
@endphp

<style>
    /* #partnership {
      padding-top: 0px;
  } */
  /* #teacher {
    padding-top: 20px;
} */
.newactive {
    /* background: #002D68!important;
    padding: 5px 10px; */
    color: gray;
}
</style>
{{-- @php dd(@$fmenu); @endphp --}}
@if(@$fmenu)
<section class="partnership">
  <div class="container" style="margin-top: 60px;">
    <ol class="breadcrumb float-sm-right">

      @php
          if(@$fmenu)
          {
            $p1menu = DB::table('frontend_menus')->where('rand_id', $fmenu->parent_id)->first();
          }
          if(@$p1menu)
          {
            $p2menu = DB::table('frontend_menus')->where('rand_id', $p1menu->parent_id)->first();
          }
          if(@$p2menu)
          {
            $p3menu = DB::table('frontend_menus')->where('rand_id', $p2menu->parent_id)->first();
          }
          if(@$p3menu)
          {
            $p4menu = DB::table('frontend_menus')->where('rand_id', $p3menu->parent_id)->first();
          }
      @endphp

      @if(@$p4menu && @$p3menu && @$p2menu && @$p1menu)
      <li class="breadcrumb-item  newactive"><a >{{@$p4menu->title_en}}</a></li>
      @endif
      @if(@$p3menu && @$p2menu && @$p1menu)
      <li class="breadcrumb-item  newactive"><a >{{@$p3menu->title_en}}</a></li>
      @endif
      @if(@$p2menu && @$p1menu)
      <li class="breadcrumb-item  newactive"><a >{{@$p2menu->title_en}}</a></li>
      @endif
      @if(@$p1menu)
      <li class="breadcrumb-item  newactive"><a >{{@$p1menu->title_en}}</a></li>
      @endif
      @if(@$fmenu)
      <li class="breadcrumb-item  newactive">{{@$fmenu->title_en}}</li>
      @endif
    </ol>
  </div>
</section>
@endif



<script>
  // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        //  document.getElementById("logo").style.height = "60px";
        //  document.getElementById("social_div").style.display = "none";
        //  document.getElementById("header-one").style.position = "fixed";
        //  document.getElementById("navbar-collapse").style.marginTop = "0";
        document.getElementById("bigm_logo_for_sticky").style.display = "";
    } else {
        //  document.getElementById("logo").style.height = "120px";
        //  document.getElementById("social_div").style.display = "";
        //  document.getElementById("header-one").style.position = "absolute";
        //  document.getElementById("navbar-collapse").style.marginTop = "72px";
        document.getElementById("bigm_logo_for_sticky").style.display = "none";
    }
  }
</script>

<style>
            
  * {
    box-sizing: border-box;
  }
  
  .openBtn {
    /* background: #f1f1f1; */
    border: none;
    /* padding: 0px 15px; */
    cursor: pointer;
  }
  
  /* .openBtn:hover {
    background: #bbb;
  } */
  
  .overlay {
    height: 18%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 99999999999;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
  }
  
  .overlay-content {
    position: relative;
    top: 26%;
    width: 80%;
    text-align: center;
    margin-top: 30px;
    margin: auto;
  }
  
  .overlay .closebtn {
    position: absolute;
    top: 8px;
    /* right: 45px; */
    right: 4%;
    font-size: 60px;
    cursor: pointer;
    color: white;
  }
  
  .overlay .closebtn:hover {
    color: #ccc;
  }
  
  .overlay input[type=text] {
    padding: 15px;
    font-size: 17px;
    border: none;
    float: left;
    width: 90%;
    background: white;
  }
  
  .overlay input[type=text]:hover {
    background: #f1f1f1;
  }
  
  .overlay button {
    float: left;
    width: 10%;
    padding: 15px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
  }
  
  .overlay button:hover {
    background: #bbb;
  }
  </style>