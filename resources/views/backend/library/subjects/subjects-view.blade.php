@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subjects</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
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
                  <div class="col-md-12 col-lg-12 col-xl-12">
                    <a href="{{ route('library-management.library_subjects.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Subject</a>
                  </div>
                  {{-- <div class="col-md-3 col-lg-3 col-xl-3">
                    
                  </div> --}}
                  <div class="col-md-10 col-lg-10 col-xl-10">
                  </div>
                </div>
	        		</div>
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
                      <th>Name</th>
                      <th>Sort Order</th>
                      <th>Status</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($books as $p)	
		                <tr>		                  	                 
		                    <td> {{$loop->iteration}}</td>
		                    <td> {{$p['subject_name']}}</td>
		                    <td> {{$p['sort_order']}}</td>
                        <td><span class="badge {{ $p['show_status'] == 1 ? 'badge-success' : 'badge-danger' }}">{{ $p['show_status'] == 1 ? 'Active' : 'Inactive' }}</span></td>
		                  	<td><a href="{{ route('library-management.library_subjects.edit',$p->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('library-management.library_subjects.delete') }}" data-id="{{ $p->id }}" ><i class="fas fa-trash"></i></a>
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

