
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Library Time Schedule' : 'Add Library Time Schedule' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Library Time Schedule</li>
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
            {{-- <div class="card-header">
                <a href="{{route('footer-menu.social_media_links')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Library Time Schedule</a>
            </div> --}}
            <div class="card-body">
                <form id="" action="{{ route('library-management.time_schedule.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12 row">
                            <div class="col-sm-2">
                                <label>Saturday Time</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="saturday_time" type="text" value="{{ !empty($editData->saturday_time)? $editData->saturday_time : old('saturday_time') }}" class="form-control @error('saturday_time') is-invalid @enderror" name="saturday_time" placeholder=""> @error('saturday_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <div class="col-sm-2">
                                <label>Sunday Time</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="sunday_time" type="text" value="{{ !empty($editData->sunday_time)? $editData->sunday_time : old('sunday_time') }}" class="form-control @error('sunday_time') is-invalid @enderror" name="sunday_time" placeholder=""> @error('sunday_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <div class="col-sm-2">
                                <label>Monday Time</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="monday_time" type="text" value="{{ !empty($editData->monday_time)? $editData->monday_time : old('monday_time') }}" class="form-control @error('monday_time') is-invalid @enderror" name="monday_time" placeholder=""> @error('monday_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <div class="col-sm-2">
                                <label>Tuesday Time</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="tuesday_time" type="text" value="{{ !empty($editData->tuesday_time)? $editData->tuesday_time : old('tuesday_time') }}" class="form-control @error('tuesday_time') is-invalid @enderror" name="tuesday_time" placeholder=""> @error('tuesday_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <div class="col-sm-2">
                                <label>Wednesday Time</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="wednesday_time" type="text" value="{{ !empty($editData->wednesday_time)? $editData->wednesday_time : old('wednesday_time') }}" class="form-control @error('wednesday_time') is-invalid @enderror" name="wednesday_time" placeholder=""> @error('wednesday_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <div class="col-sm-2">
                                <label>Thursday Time</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="thursday_time" type="text" value="{{ !empty($editData->thursday_time)? $editData->thursday_time : old('thursday_time') }}" class="form-control @error('thursday_time') is-invalid @enderror" name="thursday_time" placeholder=""> @error('thursday_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <div class="col-sm-2">
                                <label>Friday Time</label>
                            </div>
                            <div class="col-sm-10">
                                <input id="friday_time" type="text" value="{{ !empty($editData->friday_time)? $editData->friday_time : old('friday_time') }}" class="form-control @error('friday_time') is-invalid @enderror" name="friday_time" placeholder=""> @error('friday_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>
                          
                    </div>
                    <center><button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button></center>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
   
    @endsection