@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Partnership</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Partnership</li>
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
	        			<a href="{{ route('site-setting.partnership.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Partnership</a>
	        		</div>
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                  <th width="80">#</th>
                      {{-- <th>Title</th> --}}
                      <th><center>Image</center> </th>
                      <th>Sort Order</th>
                      <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                 @foreach($partnership as $t)	
		                <tr>		                  	                 
		                  <td> {{$loop->iteration}}</td>
                      {{-- <td>{{$t->title}}</td> --}}
                      <td><center><img src="{{asset('public/upload/partnership/'.$t['image']) }}" height="80"></center> </td>
                      <td>{{$t->sort_order}}</td>
		                  <td><a href="{{ route('site-setting.partnership.edit',$t->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('site-setting.partnership.delete') }}" data-id="{{ $t->id }}" ><i class="fas fa-trash"></i></a>
                       
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

