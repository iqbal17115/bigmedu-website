@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tag Lines</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tag Lines</li>
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
                
              
	        		{{-- <div class="card-header">
	        			<a href="{{ route('site-setting.tagline.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Tag Lines</a>
	        		</div> --}}
              
              
		            <div class="card-body">
		              <table id="" class="table table-sm">
		                <thead>
		                <tr>
		                    <th>#</th>
                            <th>Module Name</th>
                            <th>First Line First Part</th>
                            <th>First Line Second Part</th>
                            <th>Second Line First Part</th>
                            <th>Second Line Second Part</th>
                            <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                        @foreach($taglines as $tagline)
                        <tr>    
                            <td>{{ $loop->iteration }}</td>      
                            <td>{{ $tagline['module_name'] }}</td>                               
                            <td>{{ $tagline['first_line_first_part'] }}</td>
                            <td>{{ $tagline['first_line_second_part'] }}</td>
                            <td>{{ $tagline['second_line_first_part'] }}</td>
                            <td>{{ $tagline['second_line_second_part'] }}</td>
                            <td>
                                <a href="{{ route('site-setting.tagline.edit',$tagline->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> 
                                {{-- | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('site-setting.tagline.delete') }}" data-id="{{ $tagline->id }}" ><i class="fas fa-trash"></i></a> --}}
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

