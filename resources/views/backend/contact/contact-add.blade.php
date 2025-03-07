@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update ContactUs' : 'Add ContactUs' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">ContactUs</li>
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
                <a href="{{route('site-setting.contact.us')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View contactUs</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.contact.us.update',$editData->id) : route('site-setting.contact.us.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-6">
                            <label>Phone</label>
                            <input id="phone" type="text" value="{{ !empty($editData->phone)? $editData->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter your phone"> @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Email</label>
                            <input id="email" type="text" value="{{ !empty($editData->email)? $editData->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email"> @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        
                        <div class="form-group col-sm-6">
                            <label>Address</label>
                            <textarea type="text" class="form-control @error('address') is-invalid @enderror textarea " name="address">{{ !empty($editData->address)? $editData->address : old('address') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>




                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ContactUs' : 'Save ContactUs' }}</button>
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