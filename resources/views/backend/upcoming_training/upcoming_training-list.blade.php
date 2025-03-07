@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Upcoming Training</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Upcoming Training</li>
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
              <a href="{{ route('frontend-menu.upcoming_training.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Upcoming Training</a>
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
              @foreach($upcomingTrainings as $upcomingTraining)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ @$upcomingTraining['course_name'] }}</td>
                <td>{{ @$upcomingTraining['course_details'] }}</td>
                <td>{{ date('Y-m-d',strtotime(@$upcomingTraining['start_date'])) }}</td>
                <td>{{ date('Y-m-d',strtotime(@$upcomingTraining['end_date'])) }}</td>
                <td>{{ @$upcomingTraining['duration'] }}</td>
                <td>{{ @$upcomingTraining['resource_persons'] }}</td>
                {{-- <td>{!!  $p['address']   !!}</td> --}}
                <td><a href="{{ route('frontend-menu.upcoming_training.edit',@$upcomingTraining->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('frontend-menu.upcoming_training.delete') }}" data-id="{{ @$upcomingTraining->id }}" ><i class="fas fa-trash"></i></a> 
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

