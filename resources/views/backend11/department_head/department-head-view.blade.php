@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Head Of Depertment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Head</li>
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
                @if($head == Null)
              
	        		<div class="card-header">
	        			<a href="{{ route('site-setting.department.head.information.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Faculty</a>
	        		</div>

              @endif
              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Name</th>
                      <th>Title</th>
                      <th>Designation</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Website</th>
                      <th>Address</th>
                      <th>Image</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                 @if($head)
		                <tr>		                  	                 
		                  <td> {{1}}</td>
                      <td>{{ $head['name'] }}</td>
                      <td>{{ $head['title'] }}</td>
                      <td>{{ $head['designation'] }}</td>
                      <td>{{ $head['email'] }}</td>
                      <td>{{ $head['phone'] }}</td>
                      <td>{{ $head['website'] }}</td>
                      <td>{!! $head['address'] !!}</td>
                      <td><img src="{{asset('public/upload/faculty/'.$head['image']) }}" width="80" height="80"></td>
		                  <td><a href="{{ route('site-setting.department.head.information.edit',$head->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> <!-- | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('site-setting.department.head.information.delete') }}" data-id="{{ $head->id }}" ><i class="fas fa-trash"></i></a> -->
                        
		                  </td>
		                </tr>
                    @endif
		                              
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

