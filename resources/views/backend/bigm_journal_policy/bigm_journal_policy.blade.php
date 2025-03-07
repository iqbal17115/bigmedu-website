@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">BIGM Journal of Policy Analysis</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">BIGM Journal</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
     <div class="col-lg-12">
      <div class="card"> 
        {{-- <div class="card-header">
            <a target="_blank" href="{{route('ask_librarian')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Frontend</a>
        </div> --}}
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Paper Title</th>
                <th>Authors</th>
                <th>Mobile</th>
                <th>Email</th>
                {{-- <th>Abstract</th> --}}
                <th>Area</th>
                <th>Country</th>
                <th>Attachment 1</th>
                <th>Attachment 2</th>
                {{-- <th width="80">View</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach($journalPapers as $journalPaper)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{@$journalPaper->paper_title}}</td>
                <td>{{@$journalPaper->authors}}</td>
                <td>{{@$journalPaper->mobile}}</td>
                <td>{{@$journalPaper->email}}</td>
                {{-- <td>{!! @$journalPaper->abstract !!}</td> --}}
                <td>{{@$journalPaper->research_area}}</td>
                <td>{{@$journalPaper->country}}</td>
                <td>
                    @if(@$journalPaper->attachment1)
                        <a href="{{asset('public/upload/bigm_journal_policy/'.@$journalPaper->attachment1)}}" download="">Download</a>
                    @endif
                </td>
                <td>
                    @if(@$journalPaper->attachment2)
                        <a href="{{asset('public/upload/bigm_journal_policy/'.@$journalPaper->attachment2)}}" download="">Download</a>
                    @endif
                </td>
              </tr>

              @endforeach


            </tbody>                
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<!--/. container-fluid -->
</section>
@endsection

