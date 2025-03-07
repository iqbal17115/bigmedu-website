@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Location</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Location</li>
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
        @if(empty($location))
        <div class="card-header">
          <a href="{{ route('top-menu.location_admin.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Location</a>
        </div>
        @endif
        
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="15%">Latitude</th>
                <th width="15%">Longitude</th>
                <th width="35%">Description</th>
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach($locations as $location)	 --}}
              @if(!empty($location))
              <tr>		                  	                 
                <td> 1 </td>
                <td>{{ !empty($location) ? $location->latitude : "" }}</td>
                <td>{{ !empty($location) ? $location->longitude : "" }}</td>
                <td>{!! !empty($location) ? $location->address : "" !!}</td>
                <td><a href="{{ route('top-menu.location_admin.edit',!empty($location) ? $location->id : "") }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('top-menu.location_admin.delete') }}" data-id="{{ !empty($location) ? $location->id : "" }}" ><i class="fas fa-trash"></i></a> 
                </td>
              </tr>
              @endif
              {{-- @endforeach                 --}}
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

