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
        <p style="text-align: justify;">
            e-Library of BIGM includes e-books of prominent disciplines in the broad area of public policy and governance discourse. List of these book are given subject wise. Readers are free to view or download any of these books for (non-commercial) academic and research purpose. These e-books are accessible to all readers in a copyright complaint regime. However, there any sort of quotation, adaptation, compilation, summarization or commercial share, copy or distribution may be subject to book specific obligation. Please note that, academic and research use of these books should be properly cited in due manner.
        </p>
        @foreach($subjects as $key => $subject)
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
                                <a class="btn btn-sm" href="{{route('view_library_book_pdf',@$book->id)}}" target="_blank">View</a>
                                <a class="btn btn-sm" style="display: inline;" href="{{ asset('public/upload/library/books_publications/'.@$book->pdf) }}" download="">Download</a>
                                @endif
                            </th>
                        </tr>    
                        @endforeach   
                    
                    </tbody>
                </table>
            </div>
        </div>
        
        @endforeach
    </div>
</section>

@include('frontend.layouts.footer')

<script>
    function displayContent(subject_id) {
        if(document.getElementById('content-'+subject_id).style.display == "none")
        {
            document.getElementById('content-'+subject_id).style.display="block";
        }
        else if(document.getElementById('content-'+subject_id).style.display == "block")
        {
            document.getElementById('content-'+subject_id).style.display="none";
        }
        
    }
</script>

<style>
    /*! CSS Used from: https://www.icmab.org.bd/wp-content/themes/eikra/assets/css/default.css?ver=3.2 ; media=all */
/* @media all{
a{background-color:transparent;}
a:active,a:hover{outline:0;}
img{border:0;}
button{color:inherit;font:inherit;margin:0;}
button{overflow:visible;}
button{text-transform:none;}
button{-webkit-appearance:button;cursor:pointer;}
button::-moz-focus-inner{border:0;padding:0;}
table{border-collapse:collapse;border-spacing:0;}
th{padding:0;}
button{color:#707070;font-family:sans-serif;font-size:15px;font-weight:400;line-height:1.5;}
*,*:before,*:after{box-sizing:inherit;}
img{height:auto;max-width:100%;}
table{border-collapse:collapse;border-spacing:0;margin:15px 0;width:100%;}
table th{border:1px solid #ddd;padding:10px;}
button{background-color:#002147;border:medium none;color:#fff;padding:5px 20px;}
button:hover{background-color:#000;}
a:link,a:visited{color:#002147;transition:all 0.3s ease 0s;text-decoration:none;}
a:hover,a:focus,a:active{color:#fdc800;text-decoration:none;}
a:focus{outline:thin dotted;}
a:hover,a:active{outline:0;}
} */
/*! CSS Used from: /assets/css/style.css?ver=3.2 ; media=all */
@media all{
button{font-family:'Roboto', sans-serif;line-height:1.5;font-weight:400;font-size:15px;}
img{max-width:100%;height:auto;}
}
/*! CSS Used from: -child/style.css?ver=5.9.3 ; media=all */
@media all{
.accordion{overflow:hidden;box-shadow:0px 1px 3px rgba(0,0,0,0.25);border-radius:3px;background:#f7f7f7;}
.collapsible{background-color:#777;color:white;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;outline:none;font-size:16px;width:100%;padding:8px 15px;display:inline-block;border-bottom:1px solid #93abb3;background:#006a8d;transition:all linear 0.15s;color:#fff!important;text-decoration:none!important;}
.accordion .active,.collapsible:hover{background-color:#9ab577;}
.content{padding:0 0px;display:none;overflow:hidden;background-color:#f8f8f8;}
.table{margin-bottom:0px!important;}
.accordion .table > tbody > tr > th{padding:8px;vertical-align:middle!important;border:0px;border-top-color:currentcolor;border-top-style:none;border-top-width:0px;border-top:1px solid #ddd;}
}
/*! CSS Used from: Embedded */
a,a:link,a:visited{color:#0071bc;}
button{background-color:#8BC63F;}
a:hover,a:focus,a:active{color:#006a8d;}
/*! CSS Used from: Embedded */
.accordion{overflow:hidden;box-shadow:0px 1px 3px rgba(0,0,0,0.25);border-radius:3px;background:#f7f7f7;}
.collapsible{background-color:#777;color:white;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;outline:none;font-size:16px;width:100%;padding:8px 15px;display:inline-block;border-bottom:1px solid #b6d4de;background:#006a8d;transition:all linear 0.15s;color:#fff!important;text-decoration:none!important;}
.accordion .active,.collapsible:hover{background-color:#9ab577;}
.content{padding:0 0px;display:none;overflow:hidden;background-color:#f8f8f8;}
.table{margin-bottom:0px!important;}
.accordion .table > tbody > tr > th{padding:8px;vertical-align:middle!important;border:0px;border-top-color:currentcolor;border-top-style:none;border-top-width:0px;border-top:1px solid #ddd;}
</style>

@endsection