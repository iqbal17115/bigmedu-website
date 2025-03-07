@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Op-ed' : 'Add Op-ed' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Op-ed</li>
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
                <a href="{{route('frontend-menu.oped')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Op-ed</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('frontend-menu.oped.update',$editData->id) : route('frontend-menu.oped.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-9">
                            <label>URL</label>
                            <input id="url" type="url" value="{{ !empty($editData->url)? $editData->url : old('url') }}" class="form-control @error('url') is-invalid @enderror" name="url" placeholder=""> @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Description</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror textarea" name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Author Name</label>
                            <input id="author_name" type="text" value="{{ !empty($editData->author_name)? $editData->author_name : old('author_name') }}" class="form-control @error('author_name') is-invalid @enderror" name="author_name" placeholder="">
                            @error('author_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Newspaper Name</label>
                            <input id="newspaper_name" type="text" value="{{ !empty($editData->newspaper_name)? $editData->newspaper_name : old('newspaper_name') }}" class="form-control @error('newspaper_name') is-invalid @enderror" name="newspaper_name" placeholder="">
                            @error('newspaper_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Date</label>
                            <input id="date" type="text" value="{{ !empty($editData->date)? date('d-m-Y',strtotime($editData->date)) : old('date') }}" class="form-control singledatepicker @error('date') is-invalid @enderror" name="date" placeholder="Date" readonly> @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update' : 'Save' }}</button>
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