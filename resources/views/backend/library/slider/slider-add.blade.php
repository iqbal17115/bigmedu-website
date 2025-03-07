@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Slider' : 'Add Slider' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Slider</li>
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
                        <a href="{{route('library-management.slider')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Slider</a>
                    </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('library-management.slider.update',$editData->id) : route('library-management.slider.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Slider Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Slider' : 'Save Slider' }}</button>
                    </div>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    @endsection