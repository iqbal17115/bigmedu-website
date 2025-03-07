@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Subject' : 'Add Subject' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subject</li>
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
                        <a href="{{route('library-management.library_subjects')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Subject</a>
                    </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('library-management.library_subjects.update',$editData->id) : route('library-management.library_subjects.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-8">
                            <label>Subject Name</label>
                            <input type="text" class="form-control @error('subject_name') is-invalid @enderror" value="{{ @$editData->subject_name }}" name="subject_name"> @error('subject_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-2">
                            <label>Sort Order</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" value="{{ @$editData->sort_order }}"> @error('sort_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="col-sm-2" style="margin-top: 35px;" style="margin-bottom: 0;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="show_status" class="form-check-input" id="show_status" value="1" {{ @$editData->show_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="show_status">Show Status</label>
                            </div>
                        </div>

                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update' : 'Save' }}</button>
                    </div>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    @endsection