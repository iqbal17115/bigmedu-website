@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Follow Us</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Follow Us</li>
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
                
              @if($follow == Null)
	        		<div class="card-header">
	        			<a href="{{ route('site-setting.follow.us.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Social Link</a>
	        		</div>
              @endif

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Facebook</th>
                      <th>Twitter</th>
                      <th>GooglePlus</th>
                      <th>Youtube</th>
                      <th>Instagram</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @if($follow)  
                    <tr>    
                    <td>{{1}}</td>                                     
                      <td>{{$follow['facebook_url']}}</td>
                      <td>{{$follow['twitter_url']}}</td>
                      <td>{{$follow['googleplus_url']}}</td>
                      <td>{{$follow['youtube_url']}}</td>
                      <td>{{$follow['instagram_url']}}</td>
                      <td><a href="{{ route('site-setting.follow.us.edit',$follow->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('site-setting.follow.us.delete') }}" data-id="{{ $follow->id }}" ><i class="fas fa-trash"></i></a>
                      
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

