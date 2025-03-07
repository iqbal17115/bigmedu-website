@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Feature' : 'Add Feature' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Feature</li>
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
                <a href="{{route('site-setting.features')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Feature</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.features.update',$editData->id) : route('site-setting.features.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-8">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Sort Order</label>
                            <input id="sort_order" type="text" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Enter Sort Order"> @error('sort_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>URL</label>
                            {{-- <input id="feature_url" type="text" value="{{ !empty($editData->feature_url)? $editData->feature_url : old('feature_url') }}" class="form-control @error('feature_url') is-invalid @enderror" name="feature_url" placeholder="Enter URL"> @error('feature_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror --}}
                            <input data-toggle="modal" data-target="#myModal" type="text" name="feature_url" id="url_link" class="form-control form-control-sm url_link" value="{{ !empty($editData->feature_url)? $editData->feature_url : old('feature_url') }}" readonly>
                            <input type="hidden" name="url_link_file" id="url_link_file" class="url_link_file" value="{{ !empty($editData->url_link_file)? $editData->url_link_file : old('url_link_file') }}">
                            <input type="hidden" name="url_link_type" id="url_link_type" class="url_link_type" value="{{ !empty($editData->url_link_type)? $editData->url_link_type : old('url_link_type') }}">
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Description</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror {{--textarea--}}" name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Feature' : 'Save Feature' }}</button>
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