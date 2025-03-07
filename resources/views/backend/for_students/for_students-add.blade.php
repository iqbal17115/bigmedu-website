@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update For Student' : 'Add For Student' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">For Students</li>
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
                <a href="{{route('footer-menu.for.students')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View For Students</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('footer-menu.for.students.update',$editData->id) : route('footer-menu.for.students.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Link</label>
                            {{-- <input id="link" type="text" value="{{ !empty($editData->link)? $editData->link : old('link') }}" class="form-control @error('link') is-invalid @enderror" name="link" placeholder="Enter Link"> @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror --}}
                            <input data-toggle="modal" data-target="#myModal" type="text" name="link" id="url_link" class="form-control form-control-sm url_link" value="{{ !empty($editData->link)? $editData->link : old('link') }}" readonly>
                            <input type="hidden" name="url_link_file" id="url_link_file" class="url_link_file" value="{{ !empty($editData->url_link_file)? $editData->url_link_file : old('url_link_file') }}">
                            <input type="hidden" name="url_link_type" id="url_link_type" class="url_link_type" value="{{ !empty($editData->url_link_type)? $editData->url_link_type : old('url_link_type') }}">
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update For Student' : 'Save For Student' }}</button>
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