@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ongoing Research</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ongoing Research</li>
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
              <a href="{{ route('frontend-menu.ongoing_research.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Ongoing Research</a>
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
                <th>Title</th>
                <th>Author</th>
                <th>Area of Research</th>
                <th>Status</th>
                <th>Sort Date</th>
                <th width="80">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ongoingResearches as $ongoingResearch)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $ongoingResearch['title'] }}</td>
                <td>{{ $ongoingResearch['author'] }}</td>
                <td>{{ $ongoingResearch['area_of_research'] }}</td>
                <td>{{ $ongoingResearch['status'] }}</td>
                <td>{{ date('Y-m-d',strtotime(@$ongoingResearch['date'])) }}</td>
                {{-- <td>{!!  $p['address']   !!}</td> --}}
                <td><a href="{{ route('frontend-menu.ongoing_research.edit',@$ongoingResearch->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('frontend-menu.ongoing_research.delete') }}" data-id="{{ @$ongoingResearch->id }}" ><i class="fas fa-trash"></i></a> 
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

