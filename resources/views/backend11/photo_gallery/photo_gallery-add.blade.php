
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Photo Gallery' : 'Add Photo Gallery' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Photo Gallery</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                        <a href="{{route('top-menu.photo_gallery')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Photo Gallery</a>
                    </div>
            <div class="card-body">
                <form id="" action="{{ !empty($editData)? route('top-menu.photo_gallery.update',$editData->id) : route('top-menu.photo_gallery.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-7">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Publish Date</label>
                            <input id="publish_date" type="text" value="{{ !empty($editData->publish_date)? date('d-m-Y',strtotime($editData->publish_date)) : old('publish_date') }}" class="form-control singledatepicker @error('publish_date') is-invalid @enderror" name="publish_date" placeholder="Date"> @error('publish_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="status">Show Status</label>
                            </div>
                        </div>   
                        <div class="form-group col-sm-12 increment">
                            {{-- <div class="control-group input-group"> --}}
                                
                                @php $images = \App\Model\PhotoGalleryImage::where('photo_gallery_id', !empty($editData->id)? $editData->id : '')->get(); @endphp
                                @if($images->count() != 0)
                                    <label>Existing Images</label>
                                @endif
                                <div class="form-group">
                                    @foreach($images as $image)
                                    <img src="{{ asset('public/upload/photo_gallery/'.$image['image']) }}" height="80">
                                    <a href="{{ route('remove.image.from_photo_gallery',$image->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    {{-- <a class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></a> --}}
                                    @endforeach
                                </div>
                            {{-- </div> --}}
                        </div>    
                        <div class="form-group col-sm-12">
                                <label>Upload new Images<small style="color: brown"> (Max 2 mb)</small></label>
                                <input id="image" type="file" value="" multiple="multiple" class="form-control @error('image') is-invalid @enderror" name="image[]"> @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            {{-- </div> --}}
                        </div>   
                               
                        <div class="form-group col-sm-12">
                            <label>Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror " name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                          
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>

    <script type="text/javascript">

        $(document).ready(function() {
    
          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
    
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });
    
        });
    
    </script>
   
    @endsection