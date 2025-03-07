
@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Partnership' : 'Add Partnership' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Partnership</li>
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
                <a href="{{route('site-setting.partnership')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View partnership</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.partnership.update',$editData->id) : route('site-setting.partnership.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    <div class="form-row">
                    {{-- <div class="form-group col-sm-6">
                            <label>partnership Title</label>
                            <input type="text" class="form-control filer_input_single @error('title') is-invalid @enderror" value="{{!empty($editData->title)? $editData->title : ''}}" name="title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>  --}}
                        <div class="form-group col-sm-8">
                            <label>Partnership Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="partner">
                            @if(@$editData->image)
                            <img id="showImage" src="{{asset('public/upload/partnership/'.@$editData->image)}}" style="height: 100px; width: 120px; border: 1px solid black">
                            @else
                            <img id="showImage" src="{{asset('public/backend/images/noimage.png')}}" style="height: 100px; width: 100px; border: 1px solid black">
                            @endif
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Sort Order</label>
                            <input id="sort_order" type="text" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Sort Order"> @error('sort_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Partnership Description</label>
                            <textarea type="text" class="form-control @error('long_description') is-invalid @enderror textarea " name="long_description">{{ !empty($editData->long_description)? $editData->long_description : old('long_description') }}</textarea>
                            @error('long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button>
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