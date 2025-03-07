@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Ongoing Training' : 'Add Ongoing Training' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Ongoing Training</li>
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
                <a href="{{route('frontend-menu.ongoing_training')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Ongoing Training</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('frontend-menu.ongoing_training.update',$editData->id) : route('frontend-menu.ongoing_training.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Course Name</label>
                            <input id="course_name" type="text" value="{{ !empty($editData->course_name)? $editData->course_name : old('course_name') }}" class="form-control @error('course_name') is-invalid @enderror" name="course_name" placeholder=""> @error('course_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Course Details</label>
                            <input id="course_details" type="text" value="{{ !empty($editData->course_details)? $editData->course_details : old('course_details') }}" class="form-control @error('course_details') is-invalid @enderror" name="course_details" placeholder=""> @error('course_details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Start Date</label>
                            <input id="start_date" type="text" value="{{ !empty($editData->start_date)? date('d-m-Y',strtotime($editData->start_date)) : old('start_date') }}" class="form-control singledatepicker @error('start_date') is-invalid @enderror" name="start_date" placeholder="Date" readonly> @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>End Date</label>
                            <input id="end_date" type="text" value="{{ !empty($editData->end_date)? date('d-m-Y',strtotime($editData->end_date)) : old('end_date') }}" class="form-control singledatepicker @error('end_date') is-invalid @enderror" name="end_date" placeholder="Date" readonly> @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Duration</label>
                            <input id="duration" type="text" value="{{ !empty($editData->duration)? $editData->duration : old('duration') }}" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder=""> @error('duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Key Resource Persons</label>
                            <textarea id="resource_persons" type="text" class="form-control @error('resource_persons') is-invalid @enderror" name="resource_persons">{{ !empty($editData->resource_persons)? $editData->resource_persons : old('resource_persons') }}</textarea>
                            @error('resource_persons')
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