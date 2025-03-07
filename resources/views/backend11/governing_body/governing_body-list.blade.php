@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Governing Body Member Information</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Governing Body Member Information</li>
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
        
        <div class="card-header">
          <a href="{{ route('governing_body.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Governing Body Member</a>
          <a href="{{ route('governing_body') }}" target="_blank" class="btn btn-sm btn-info float-right"><i class="fas fa-stream"></i> View Governing Body</a>
        </div>
        
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Order</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($governingBodies as $governingBody)	
              <tr>		                  	                 
                <td>{{ $loop->iteration }}</td>
                <td>{{ $governingBody['member']['name'] }}</td>
                <td>{{ $governingBody['designation'] }}</td>
                <td>{{ $governingBody['sort_order'] }}</td>
                <td><img src="{{ asset('public/upload/members/'.$governingBody['member']['image']) }}" width="80" height="80"></td>
                <td><a href="{{ route('governing_body.edit',$governingBody->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('governing_body.delete') }}" data-id="{{ $governingBody->id }}" ><i class="fas fa-trash"></i></a> 
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

