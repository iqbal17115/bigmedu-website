@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Location' : 'Add Location' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Location</li>
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
                <a href="{{route('top-menu.location_admin')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Location</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('top-menu.location_admin.update',$editData->id) : route('top-menu.location_admin.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-6">
                            <label>Google Map Latitude</label>
                            <input id="latitude" type="text" value="{{ !empty($editData->latitude)? $editData->latitude : old('latitude') }}" class="form-control @error('latitude') is-invalid @enderror" name="latitude" placeholder="Enter Google Map Latitude"> @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Google Map Longitude</label>
                            <input id="longitude" type="text" value="{{ !empty($editData->longitude)? $editData->longitude : old('longitude') }}" class="form-control @error('longitude') is-invalid @enderror" name="longitude" placeholder="Enter Google Map Longitude">
                            @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Address</label>
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror textarea" name="address">{{ !empty($editData->address)? $editData->address : old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Location' : 'Save Location' }}</button>
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