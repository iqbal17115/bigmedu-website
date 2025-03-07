@extends('frontend.layouts.index')

@section('extra_css_files')
    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
@include('frontend.layouts.header')
{{-- @php dd(@$fmenu); @endphp --}}
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
<section id="partnership" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 75px; @endif">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3 class="text-center">Ongoing Research</b></h3>
                    <hr>
                </div>
            </div>
        </div>

        <div class="container">
            <table id="dataTable" class="table table-sm table-striped table-borderless table-info">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Research Title</th>
                        <th>Author</th>
                        <th>Area of Research</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ongoingResearches as $p)	
                    <tr>		                  	                 
                        <td> {{$loop->iteration}}</td>
                        <td> {{@$p['title']}}</td>
                        <td> {{@$p['author']}}</td>
                        <td> {{@$p['area_of_research']}}</td>
                        <td> {{@$p['status']}}</td>
                    </tr>
                    @endforeach                
                </tbody>                
            </table>
        </div>

    </div>
</section>

    @include('frontend.layouts.footer')

    @section('extra_script_files')
        <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
        <script>
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
            });
        </script>
    @endsection



@endsection