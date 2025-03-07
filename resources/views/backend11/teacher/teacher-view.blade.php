@extends('backend.layouts.app')
@section('content')



<style type="text/css">
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 24px;
  }

  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }

</style>
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Faculty</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Faculty</li>
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
	        			<a href="{{ route('site-setting.teacher.information.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Faculty</a>
	        		</div>
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Name</th>
                      <th>Designation</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Name Slug</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                 @foreach($teachers as $t)	
		                <tr>		                  	                 
		                  <td> {{$loop->iteration}}</td>
                      <td>{{ $t['name'] }}</td>
                      <td>{{ $t['designations']['name'] }}</td>
                      <td>{{ $t['email'] }}</td>
                      <td>{{ $t['phone'] }}</td>
                      <td>{{ $t['faculty_slug'] }}</td>
                      <td><img src="{{asset('public/upload/faculty/'.$t['image']) }}" width="80" height="80"></td>
                      <td>
                          <label class="switch">
                            <input type="checkbox" class="statuschange" name="status" data-token="{{ csrf_token() }}" data-id="{{$t['id']}}" data-tabName="teachers" id="status{{$t['id']}}" value="{{$t['status']}}" <?php if($t['status']== '1'){echo "checked";}?>>
                            <span class="slider round"></span>
                          </label>
                        </td>
                         
		                  <td>
                        <a href="{{route('site-setting.teacher.information.edit',$t->id)}}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a>
                       {{--  <a href="{{ ($t->id == 1) ? route('site-setting.department.head.information.edit',$t->id) : route('site-setting.teacher.information.edit',$t->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> --}}
                         @if($t['id'] != 1)| 
                        
                        <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('site-setting.teacher.information.delete') }}" data-id="{{ $t->id }}" ><i class="fas fa-trash"></i></a>
                        
                        <!-- <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('site-setting.teacher.information.delete') }}" data-id="{{ $t->id }}" ><i class="fas fa-trash"></i></a> -->
		                  </td>
                      @endif
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

