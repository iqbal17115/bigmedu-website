@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Training and Enroll' : 'Add Training and Enroll' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Training and Enroll</li>
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
                <a href="{{route('site-setting.training_enroll')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Training and Enroll</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.training_enroll.update',$editData->id) : route('site-setting.training_enroll.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-5">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-5">
                            <label>Sub Title</label>
                            <input id="subtitle" type="text" value="{{ !empty($editData->subtitle)? $editData->subtitle : old('subtitle') }}" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" placeholder="Enter Sub Title">
                            @error('subtitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Sort Order</label>
                            <input id="sort_order" type="text" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Enter Sort Order"> @error('sort_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-9">
                            <label>URL</label>
                            {{-- <input id="training_url" type="url" value="{{ !empty($editData->training_url)? $editData->training_url : old('training_url') }}" class="form-control @error('training_url') is-invalid @enderror" name="training_url" placeholder="Enter URL">
                            @error('training_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                            <input data-toggle="modal" data-target="#myModal" type="text" name="training_url" id="url_link" class="form-control form-control-sm url_link" value="{{ !empty($editData->training_url)? $editData->training_url : old('training_url') }}" readonly>
                            <input type="hidden" name="url_link_file" id="url_link_file" class="url_link_file" value="{{ !empty($editData->url_link_file)? $editData->url_link_file : old('url_link_file') }}">
                            <input type="hidden" name="url_link_type" id="url_link_type" class="url_link_type" value="{{ !empty($editData->url_link_type)? $editData->url_link_type : old('url_link_type') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Icon<small style="color: brown;"> (75px X 75px)</small> <small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Training and Enroll' : 'Save Training and Enroll' }}</button>
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