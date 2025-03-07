
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Video Gallery' : 'Add Video Gallery' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Video Gallery</li>
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
                        <a href="{{route('top-menu.video_gallery')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Video Gallery</a>
                    </div>
            <div class="card-body">
                <form id="" action="{{ !empty($editData)? route('top-menu.video_gallery.update',$editData->id) : route('top-menu.video_gallery.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-9">
                            <label>Title<small style="color: brown;"> (Maximum 40 characters)</small></label>
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
                        <div class="form-group col-sm-10">
                            <label>Youtube Link</label>
                            <input id="youtube_link" type="text" value="{{ !empty($editData->youtube_link)? $editData->youtube_link : old('youtube_link') }}" class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" placeholder="Enter Youtube Link"> @error('youtube_link')
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
                        <div class="form-group col-sm-12">
                            <label>Description<small style="color: brown;"> (Maximum 200 characters)</small></label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
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
   
    @endsection