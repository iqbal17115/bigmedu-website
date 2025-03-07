@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Alumni' : 'Add Alumni' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Alumni</li>
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
                <a href="{{route('site-setting.alumni')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Alumni</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.alumni.update',$editData->id) : route('site-setting.alumni.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Sub Title</label>
                            <input id="subtitle" type="text" value="{{ !empty($editData->subtitle)? $editData->subtitle : old('subtitle') }}" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" placeholder="Enter Sub Title">
                            @error('subtitle')
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
                        <div class="form-group col-sm-4">
                            <label>Session</label>
                            <input id="session" type="text" value="{{ !empty($editData->session)? $editData->session : old('session') }}" class="form-control @error('session') is-invalid @enderror" name="session" placeholder=""> @error('session')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Batch</label>
                            <input id="batch" type="text" value="{{ !empty($editData->batch)? $editData->batch : old('batch') }}" class="form-control @error('batch') is-invalid @enderror" name="batch" placeholder=""> @error('batch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Name of the program</label>
                            <input id="program_name" type="text" value="{{ !empty($editData->program_name)? $editData->program_name : old('program_name') }}" class="form-control @error('program_name') is-invalid @enderror" name="program_name" placeholder=""> @error('program_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Year of completion</label>
                            <input id="completion_year" type="text" value="{{ !empty($editData->completion_year)? $editData->completion_year : old('completion_year') }}" class="form-control @error('completion_year') is-invalid @enderror" name="completion_year" placeholder=""> @error('completion_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Date of Birth</label>
                            <input id="birth_date" type="text" value="{{ !empty($editData->birth_date)? $editData->birth_date : old('birth_date') }}" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" placeholder=""> @error('birth_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Email</label>
                            <input id="email" type="email" value="{{ !empty($editData->email)? $editData->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder=""> 
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Blood Group</label>
                            <input id="blood_group" type="text" value="{{ !empty($editData->blood_group)? $editData->blood_group : old('blood_group') }}" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" placeholder=""> 
                            @error('blood_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Mobile No</label>
                            <input id="mobile_no" type="text" value="{{ !empty($editData->mobile_no)? $editData->mobile_no : old('mobile_no') }}" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" placeholder=""> 
                            @error('mobile_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Designation</label>
                            <input id="designation" type="text" value="{{ !empty($editData->designation)? $editData->designation : old('designation') }}" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder=""> 
                            @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>National ID No/ Birth Certificate/ Passport No</label>
                            <input id="nid_birth_passport" type="text" value="{{ !empty($editData->nid_birth_passport)? $editData->nid_birth_passport : old('nid_birth_passport') }}" class="form-control @error('nid_birth_passport') is-invalid @enderror" name="nid_birth_passport" placeholder=""> 
                            @error('nid_birth_passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label>Organization Name</label>
                            <input id="organization_name" type="text" value="{{ !empty($editData->organization_name)? $editData->organization_name : old('organization_name') }}" class="form-control @error('organization_name') is-invalid @enderror" name="organization_name" placeholder=""> 
                            @error('organization_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Professional Information: Brief state specialty/expertise area and experience</label>
                            <input id="professional_information" type="text" value="{{ !empty($editData->professional_information)? $editData->professional_information : old('professional_information') }}" class="form-control @error('professional_information') is-invalid @enderror" name="professional_information" placeholder=""> 
                            @error('professional_information')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Contact Address</label>
                            <input id="address" type="text" value="{{ !empty($editData->address)? $editData->address : old('address') }}" class="form-control @error('address') is-invalid @enderror" name="address" placeholder=""> 
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Duration</label>
                            <input id="duration" type="text" value="{{ !empty($editData->duration)? $editData->duration : old('duration') }}" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder=""> 
                            @error('duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Alumni' : 'Save Alumni' }}</button>
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