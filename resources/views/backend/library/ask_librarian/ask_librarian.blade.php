@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Messages asked to Librarian</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Message</li>
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
                <th>Submission Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                {{-- <th width="80">View</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach($message as $m)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$m->created_at->format('d-m-Y')}}</td>
                <td>{{$m->name}}</td>
                <td>{{$m->email}}</td>
                <td>{{$m->phone}}</td>
                <td>{{$m->subject}}</td>
                <td>{!! $m->message !!}</td>
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

