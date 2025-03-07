@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<style type="text/css">
  #Iframe-Master-CC-and-Rs {
    max-width: 100%;
    /*max-height: 1260px; */
    overflow: hidden;
  }

  .responsive-wrapper {
    position: relative;
    height: 0;
  }

  .responsive-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    margin: 0;
    padding: 0;
    border: none;
  }
  .responsive-wrapper-wxh-572x612 {
    padding-bottom: 107%;
  }
  .set-border {
    border: 5px inset #4f4f4f;
  }
  .set-box-shadow { 
    -webkit-box-shadow: 4px 4px 14px #4f4f4f;
    -moz-box-shadow: 4px 4px 14px #4f4f4f;
    box-shadow: 4px 4px 14px #4f4f4f;
  }
  .set-padding {
    padding: 40px;
  }
  .set-margin {
    /*margin: 3+0px;*/
  }
  .center-block-horiz {
    margin-left: auto !important;
    margin-right: auto !important;
  }
</style>

<section id="partnership">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                  @if(@$find_post['title'])
                  <h3 class="text-center">{{@$find_post['title']}}</b></h3>
                  @endif
                  @if(@$find_post['title_en'])
                  <h3 class="text-center">{{@$find_post['title_en']}}</b></h3>
                  @endif
                    <hr>
                </div>
            </div>
        </div>

        {{-- For frontend menu link --}}
        @if(@$find_post['url_link'])
        <div class="container">
          <section class="background_bg bg_linen bg_fixed">
            <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
              <div class="responsive-wrapper responsive-wrapper-wxh-572x612" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                <iframe id="showImage" src="{{@$find_post['url_link'] ? url('public/backend/menu_fle/'.$find_post['url_link']) : url('public/upload/nofile.png')}}"> </iframe>
              </div>
            </div>
          </section>
        </div>
        @endif
        {{-- End For frontend menu link --}}

        {{-- For all footer link --}}
        @if(@$find_post['link'])
        <div class="container">
          <section class="background_bg bg_linen bg_fixed">
            <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
              <div class="responsive-wrapper responsive-wrapper-wxh-572x612" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                <iframe id="showImage" src="{{@$find_post['link'] ? url('public/backend/useful_file/'.$find_post['link']) : url('public/upload/nofile.png')}}"> </iframe>
              </div>
            </div>
          </section>
        </div>
        @endif
        {{-- End For all footer link --}}

        {{-- For offer_url link --}}
        @if(@$find_post['offer_url'])
        <div class="container">
          <section class="background_bg bg_linen bg_fixed">
            <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
              <div class="responsive-wrapper responsive-wrapper-wxh-572x612" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                <iframe id="showImage" src="{{@$find_post['offer_url'] ? url('public/backend/useful_file/'.$find_post['offer_url']) : url('public/upload/nofile.png')}}"> </iframe>
              </div>
            </div>
          </section>
        </div>
        @endif
        {{-- End For offer_url link --}}

        {{-- For feature_url link --}}
        @if(@$find_post['feature_url'])
        <div class="container">
          <section class="background_bg bg_linen bg_fixed">
            <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
              <div class="responsive-wrapper responsive-wrapper-wxh-572x612" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                <iframe id="showImage" src="{{@$find_post['feature_url'] ? url('public/backend/useful_file/'.$find_post['feature_url']) : url('public/upload/nofile.png')}}"> </iframe>
              </div>
            </div>
          </section>
        </div>
        @endif
        {{-- End For feature_url link --}}

        {{-- For training_url link --}}
        @if(@$find_post['training_url'])
        <div class="container">
          <section class="background_bg bg_linen bg_fixed">
            <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
              <div class="responsive-wrapper responsive-wrapper-wxh-572x612" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                <iframe id="showImage" src="{{@$find_post['training_url'] ? url('public/backend/useful_file/'.$find_post['training_url']) : url('public/upload/nofile.png')}}"> </iframe>
              </div>
            </div>
          </section>
        </div>
        @endif
        {{-- End For training_url link --}}

    </div>
</section>
@include('frontend.layouts.footer')
@endsection