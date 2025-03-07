
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Tag Lines' : 'Add Tag Lines' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tag Lines</li>
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
                <a href="{{route('site-setting.tagline')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Tag Lines</a>
            </div>
            <div class="card-body">
                <form id="" action="{{ !empty($editData)? route('site-setting.tagline.update',$editData->id) : route('site-setting.tagline.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div>
                        <div class="form-row container">
                            <div class="form-group col-sm-4">
                                <label>Module Name</label>
                                <input id="module_name" type="text" value="{{ !empty($editData->module_name)? $editData->module_name : old('module_name') }}" class="form-control @error('module_name') is-invalid @enderror" name="module_name" placeholder="" readonly> @error('module_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>First Line First Part</label>
                                <input id="first_line_first_part" type="text" value="{{ !empty($editData->first_line_first_part)? $editData->first_line_first_part : old('first_line_first_part') }}" class="form-control @error('first_line_first_part') is-invalid @enderror" name="first_line_first_part" placeholder=""> @error('first_line_first_part')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>First Line Second Part</label>
                                <input id="first_line_second_part" type="text" value="{{ !empty($editData->first_line_second_part)? $editData->first_line_second_part : old('first_line_second_part') }}" class="form-control @error('first_line_second_part') is-invalid @enderror" name="first_line_second_part" placeholder=""> @error('first_line_second_part')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div> 
                            <div class="form-group col-sm-6">
                                <label>Second Line First Part</label>
                                <input id="second_line_first_part" type="text" value="{{ !empty($editData->second_line_first_part)? $editData->second_line_first_part : old('second_line_first_part') }}" class="form-control @error('second_line_first_part') is-invalid @enderror" name="second_line_first_part" placeholder=""> @error('second_line_first_part')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>        
                            <div class="form-group col-sm-6">
                                <label>Second Line Second Part</label>
                                <input id="second_line_second_part" type="text" value="{{ !empty($editData->second_line_second_part)? $editData->second_line_second_part : old('second_line_second_part') }}" class="form-control @error('second_line_second_part') is-invalid @enderror" name="second_line_second_part" placeholder=""> @error('second_line_second_part')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
   
    @endsection