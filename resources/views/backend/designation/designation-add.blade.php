@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Role</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Role</li>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('site-setting.designation')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Role</a>
                    </div>
                    <div class="card-body">
                        <form action="{{!empty($editData)? route('site-setting.designation.update',$editData->id) : route('site-setting.designation.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-sm-6">
                                    <label>Faculty Designation</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{ !empty($editData->name)? $editData->name : old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                

                            </div>

                            <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update' : 'Save' }}</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
@endsection