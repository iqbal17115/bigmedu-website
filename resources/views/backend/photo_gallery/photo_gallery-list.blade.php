@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Photo Gallery</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Photo Gallery</li>
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
	        			<a href="{{ route('top-menu.photo_gallery.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Photo Gallery</a>
	        		</div>

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                    <th>#</th>
                            <th>Title</th>
                            <th>Publish Date</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @foreach($photoGalleries as $photoGallery)  
                    <tr>    
                      <td>{{ $loop->iteration }}</td>                                     
                      <td>{{$photoGallery['title']}}</td>
                      <td>{{date('d/m/Y',strtotime($photoGallery['publish_date']))}}</td>
                      <td>
                          @php $images = \App\Model\PhotoGalleryImage::where('photo_gallery_id',$photoGallery->id)->get(); @endphp
                          @foreach($images as $image)
                          <img src="{{ asset('public/upload/photo_gallery/'.$image['image']) }}" height="80">
                          @endforeach
                        </td>
                      <td>{!! $photoGallery['description'] !!}</td>
                      <td><span class="badge {{ $photoGallery['status'] == 1 ? 'badge-success' : 'badge-danger' }}">{{ $photoGallery['status'] == 1 ? 'Active' : 'Inactive' }}</span></td>
                      <td><a href="{{ route('top-menu.photo_gallery.edit',$photoGallery->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('top-menu.photo_gallery.delete') }}" data-id="{{ $photoGallery->id }}" ><i class="fas fa-trash"></i></a>
                      
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

