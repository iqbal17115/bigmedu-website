
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Institute Setting' : 'Add Institute Setting' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Institute Setting</li>
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
            {{-- <div class="card-header">
                <a href="{{route('footer-menu.social_media_links')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Library Time Schedule</a>
            </div> --}}
            <div class="card-body">
                <form id="" action="{{ route('site-setting.institute_details.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                            <div class="form-group col-sm-12">
                                <label>Institute Name</label>
                                <input id="institute_name" type="text" value="{{ !empty($editData->institute_name)? $editData->institute_name : old('institute_name') }}" class="form-control @error('institute_name') is-invalid @enderror" name="institute_name" placeholder="Enter Institute Name"> @error('institute_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Previous Name</label>
                                <input id="previous_name" type="text" value="{{ !empty($editData->previous_name)? $editData->previous_name : old('previous_name') }}" class="form-control @error('previous_name') is-invalid @enderror" name="previous_name" placeholder="Enter Previous Name"> @error('previous_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Institute Description</label>
                                <input id="institute_description" type="text" value="{{ !empty($editData->institute_description)? $editData->institute_description : old('institute_description') }}" class="form-control @error('institute_description') is-invalid @enderror" name="institute_description" placeholder="Enter Institute Description"> @error('institute_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Slogan</label>
                                <input id="slogan" type="text" value="{{ !empty($editData->slogan)? $editData->slogan : old('slogan') }}" class="form-control @error('slogan') is-invalid @enderror" name="slogan" placeholder="Enter Slogan"> @error('slogan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
    
                            <div class="form-group col-sm-8">
                                <label>Image <small style="color: brown"> (Max 2 mb)</small></label>
                                <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                            @if(!empty($editData->image))
                            <div class="form-group col-sm-4">
                                <img src="{{asset('public/upload/institute_details/'.$editData->image) }}" height="">
                            </div>
                            @endif
                          
                    </div>
                    <center><button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button></center>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
   
    @endsection