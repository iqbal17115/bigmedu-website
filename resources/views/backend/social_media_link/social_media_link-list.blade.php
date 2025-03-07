@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Social Media Links</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Social Media Links</li>
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
                
                    @if(empty($link))
	        		<div class="card-header">
	        			<a href="{{ route('footer-menu.social_media_links.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Social Media Link</a>
	        		</div>
                    @endif
              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                    <th>#</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Instagram</th>
                            <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                        @if(!empty($link))  
                        <tr>    
                            <td>1</td>                                     
                            <td><a target="_blank" href="{{$link['facebook_link']}}">{{$link['facebook_link']}}</a></td>
                            <td><a target="_blank" href="{{$link['twitter_link']}}">{{$link['twitter_link']}}</a></td>
                            <td><a target="_blank" href="{{$link['instagram_link']}}">{{$link['instagram_link']}}</a></td>
                            <td>
                                <a href="{{ route('footer-menu.social_media_links.edit',$link->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('footer-menu.social_media_links.delete') }}" data-id="{{ $link->id }}" ><i class="fas fa-trash"></i></a>
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

