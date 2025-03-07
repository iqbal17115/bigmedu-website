@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Resource Person</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Resource Person</li>
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
                        {{-- <a href="{{route('project-management.resource.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Resource Person</a> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{!empty($editData)? route('project-management.resource.profile.update',$editData->id) : route('project-management.resource.profile.view')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label>Resource Person Name*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{ !empty($editData->name)? $editData->name : old('name') }}"> @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Resource Person Email*</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off" value="{{ !empty($editData->email)? $editData->email : old('email') }}"> @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Resource Person Mobile</label>
                                    <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" autocomplete="off" value="{{ !empty($editData->contact_no)? $editData->contact_no : old('contact_no') }}"> @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Resource Person Designation</label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" autocomplete="off" value="{{ !empty($editData->designation)? $editData->designation : old('designation') }}"> @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                                {{-- <div class="form-group col-sm-6">
                                    <label>User Role*</label>
                                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                        <option value="">--Select Project--</option>
                                        @foreach($role as $c)
                                        <option {{ @$editData[ 'user'][ 'user_role'][ 'role_details'][ 'id']==$c->id ? 'selected':''}} value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div> --}}
                                
                                <div class="form-group col-sm-6">
                                    <label>Present Address</label>
                                    <textarea type="text" class="form-control textarea @error('present_address') is-invalid @enderror" name="present_address" rows="5">{{ !empty($editData->present_address)? $editData->present_address : old('present_address') }}</textarea>
                                    @error('present_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Permanent Address</label>
                                    <textarea type="text" class="form-control textarea @error('permanent_address') is-invalid @enderror" name="permanent_address" rows="5">{{ !empty($editData->permanent_address)? $editData->permanent_address : old('permanent_address') }}</textarea>
                                    @error('permanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
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