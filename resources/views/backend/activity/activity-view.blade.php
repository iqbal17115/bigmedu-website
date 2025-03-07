@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Activity</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Activity</li>
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
	        			<a href="{{ route('site-setting.activity.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Activity</a>
	        		</div>

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                  <th>#</th>
                      <th>Date</th>
                      <th>Title</th>
                      <th>File</th>
                      {{-- <th width="10%">Sort Order</th> --}}
                      <th>Status</th>
                      <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @foreach($activity as $n)  
                    <tr>    
                    <td>{{ $loop->iteration }}</td>
                      <td>{{date('d/m/Y',strtotime($n['date']))}}</td>
                      <td>{{$n['title']}}</td>
                      <td><img src="{{asset('public/upload/activity/'.$n['image']) }}" height="80"></td>
                      {{-- <td>{{$n['sort_order']}}</td> --}}
                      <td><span class="badge {{ $n['status'] == 1 ? 'badge-success' : 'badge-danger' }}">{{ $n['status'] == 1 ? 'Active' : 'Inactive' }}</span></td>
                      <td><a href="{{ route('site-setting.activity.edit',$n->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('site-setting.activity.delete') }}" data-id="{{ $n->id }}" ><i class="fas fa-trash"></i></a>
                      
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

