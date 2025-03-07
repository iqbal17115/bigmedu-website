@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Department</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Department</li>
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
          <a href="{{ route('user.department.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Department</a>
        </div>
        
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="15%">Department Name</th>
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($departments as $department)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $department['dept_name'] }}</td>
                <td><a href="{{ route('user.department.edit',$department->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('user.department.delete') }}" data-id="{{ $department->id }}" ><i class="fas fa-trash"></i></a> 
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

