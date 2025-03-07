@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<style type="text/css">
    #Iframe-Master-CC-and-Rs {
          max-width: 100%;
          max-height: 1200px; 
          overflow: hidden;
      }
  
      /* inner wrapper: make responsive */
      .responsive-wrapper {
          position: relative;
          height: 0;    /* gets height from padding-bottom */ 
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
  
      /* padding-bottom = h/w as % -- sets aspect ratio */
      /* YouTube video aspect ratio */
      .responsive-wrapper-wxh-572x612 {
          padding-bottom: 107%;
      }
  
      /* general styles */
      /* ============== */
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
          margin: 30px;
      }
      .center-block-horiz {
          margin-left: auto !important;
          margin-right: auto !important;
      }
  </style>


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
        {{-- <iframe src="{{ asset('public/upload/library/books_publications/'.@$book->pdf) }}" width="100%" height="500px"> --}}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                <div class="responsive-wrapper 
                responsive-wrapper-wxh-572x612"
                style="-webkit-overflow-scrolling: touch; overflow: auto;">
                <iframe src="{{ asset('public/upload/library/books_publications/'.@$book->pdf) }}"> 
                </iframe>
            </div>
        </div>
        {{-- @foreach($subjects as $key => $subject)
        <div class="accordion">

            <button style="color: black !important;" class="collapsible active" onclick="displayContent({{@$subject->id}})">{{@$subject->subject_name}}</button>  

            <div id="content-{{@$subject->id}}" class="content" style="display: block;">
            
                <table width="100%" class="table table-striped">
                    <tbody>
                        @php
                            $books = \App\Model\BooksPublication::where('library_subject_id',@$subject->id)->where('show_status_for_subject',1)->get();
                        @endphp
                        
                        @foreach($books as $book)   
                        <tr>
                            <th align="center"><img src="{{ asset('public/upload/library/books_publications/'.@$book->image) }}" alt="" width="80" style="width:100px; height:80px;"></th>
                            <th align="center">{{@$book->title}}</th>
                            <th align="center" style="width: 15%;">
                                @if(@$book->pdf)
                                <a target="_blank" class="btn btn-sm" href="{{ route('view_library_book_pdf',@$book->id) }}">View</a>
                                <a class="btn btn-sm" style="display: inline;" href="{{ asset('public/upload/library/books_publications/'.@$book->pdf) }}" download="">Download</a>
                                @endif
                            </th>
                        </tr>    
                        @endforeach   
                    
                    </tbody>
                </table>
            </div>
        </div>
        
        @endforeach --}}
    </div>
</section>

@include('frontend.layouts.footer')

@endsection