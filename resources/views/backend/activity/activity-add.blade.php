
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Activity' : 'Add Activity' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Activity</li>
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
                        <a href="{{route('site-setting.activity')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Activity</a>
                    </div>
            <div class="card-body">
                <form id="activityForm" action="{{ !empty($editData)? route('site-setting.activity.update',$editData->id) : route('site-setting.activity.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-6">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date</label>
                            <input id="date" type="text" value="{{ !empty($editData->date)? date('d-m-Y',strtotime($editData->date)) : old('date') }}" class="form-control singledatepicker @error('date') is-invalid @enderror" name="date" placeholder="Date"> @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>              
                        <div class="form-group col-sm-10">
                            <label>Long Description</label>
                            <textarea type="text" class="form-control @error('sort') is-invalid @enderror textarea " name="long_description">{{ !empty($editData->long_description)? $editData->long_description : old('long_description') }}</textarea>
                            @error('long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        {{-- <div class="form-group col-sm-3">
                            <label>Sort Order</label>
                            <input id="sort_order" type="text" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Sort Order"> @error('sort_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> --}}
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="status">Show Status</label>
                            </div>
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
        $("#activityForm").validate({
            rules: {
                'title':{
                    required:true
                },
                'date':{
                    required:true
                }
            }
        });
    });
</script>
    @endsection