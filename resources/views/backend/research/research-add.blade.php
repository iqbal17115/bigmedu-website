
@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Research' : 'Add Research' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
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
                        <a href="{{route('site-setting.research')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Research</a>
                    </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.research.update',$editData->id) : route('site-setting.research.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    <div class="form-row">
                    <div class="form-group col-sm-6">
                            <label>Research Title</label>
                            <input type="text" class="form-control filer_input_single @error('title') is-invalid @enderror" value="{{!empty($editData->title)? $editData->title : ''}}" name="title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> 
                        <div class="form-group col-sm-6">
                            <label>Research Image</label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Research Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror textarea " name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
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
        $(function() {
            $('#tour_name').on('keyup', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#tour_slug").val(Text);
            });
        });
    </script>
    @endsection