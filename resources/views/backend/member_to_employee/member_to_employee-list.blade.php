@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Member To Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member To Employee</li>
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
                <a href="{{ route('member_to_employee.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Member To Employee</a>
                <a href="{{ route('member_to_employee_frontend') }}" target="_blank" class="btn btn-sm btn-info float-right"><i class="fas fa-stream"></i> View Member To Employee</a>
	        		</div>
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Name</th>
                      <th>Sort Order</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($memberToEmployees as $p)	
		                <tr>		                  	                 
		                  <td> {{$loop->iteration}}</td>
                      <td>{{ $p['member']['name'] }}</td>
                      <td>{{ $p['sort_order'] }}</td>
		                  	<td><a href="{{ route('member_to_employee.edit',$p->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('member_to_employee.delete') }}" data-id="{{ $p->id }}" ><i class="fas fa-trash"></i></a> 
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

