@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
              @if($about == Null)
	        		<div class="card-header">
	        			<a href="{{ route('site-setting.about.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add About</a>
	        		</div>
              @endif
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Title</th>
                      <th>Short Description</th>
                      <th>Long Description</th>
                      <th>Image</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($about as $p)	
		                <tr>		                  	                 
		                  <td> {{$loop->iteration}}</td>
                      <td>{{ $p['title'] }}</td>
                        <td>{!!  $p['short_description']   !!}</td>
                        <td>{!!  $p['long_description']   !!}</td>
                        <td><img src="{{asset('public/upload/about/'.$p['image']) }}" width="80" height="80"></td>
		                  	<td><a href="{{ route('site-setting.about.edit',$p->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('site-setting.about.delete') }}" data-id="{{ $p->id }}" ><i class="fas fa-trash"></i></a> 
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

