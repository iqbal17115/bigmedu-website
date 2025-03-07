@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ongoing Training</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ongoing Training</li>
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
          <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3">
              <a href="{{ route('frontend-menu.ongoing_training.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Ongoing Training</a>
            </div>
            <div class="col-md-9 col-lg-9 col-xl-9">
            </div>
          </div>
        </div>
        
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Course Name</th>
                <th>Course Details</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Duration</th>
                <th>Key Resource Persons</th>
                <th width="10">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ongoingTrainings as $ongoingTraining)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ @$ongoingTraining['course_name'] }}</td>
                <td>{{ @$ongoingTraining['course_details'] }}</td>
                <td>{{ date('Y-m-d',strtotime(@$ongoingTraining['start_date'])) }}</td>
                <td>{{ date('Y-m-d',strtotime(@$ongoingTraining['end_date'])) }}</td>
                <td>{{ @$ongoingTraining['duration'] }}</td>
                <td>{{ @$ongoingTraining['resource_persons'] }}</td>
                {{-- <td>{!!  $p['address']   !!}</td> --}}
                <td><a href="{{ route('frontend-menu.ongoing_training.edit',@$ongoingTraining->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('frontend-menu.ongoing_training.delete') }}" data-id="{{ @$ongoingTraining->id }}" ><i class="fas fa-trash"></i></a> 
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

