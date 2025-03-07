@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Career/Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Career/Jobs</li>
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
                        <a href="{{ route('top-menu.career.add') }}" class="btn btn-sm btn-info" style="text-align: left"><i class="fas fa-plus"></i> Add Career/Job</a>
	        		</div>

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Publish Start Date</th>
                                <th>Publish End Date</th>
                                <th>Attachment</th>
                                <th width="80">Action</th>
                            </tr>
		                </thead>
		                <tbody>
                       @foreach($careers as $career)  
                    <tr>    
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $career['title'] }}</td>
                        <td>{!! $career['description'] !!}</td>
                        <td>{{ date('d/m/Y',strtotime($career['start_date'])) }}</td>
                        <td>{{ date('d/m/Y',strtotime($career['end_date'])) }}</td>
                        {{-- <td><img src="{{asset('public/upload/news/'.$n['image']) }}" width="80" height="80"></td> --}}
                        <td><center>@if($career->attachment != Null)<a href="{{ asset('public/upload/career/'.$career->attachment) }}"><i class="fa-2x far fa-eye"></i></a>@endif</center></td>
                        {{-- <td><iframe src="{{ asset('public/upload/career/'.$career['attachment']) }}" height="80" width="80"></iframe><td> --}}
                        <td>
                          <a href="{{ route('top-menu.career.edit',$career->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('top-menu.career.delete') }}" data-id="{{ $career->id }}" ><i class="fas fa-trash"></i></a>
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

