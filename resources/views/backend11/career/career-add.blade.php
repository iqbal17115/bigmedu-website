
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Career/Job' : 'Add Career/Job' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Career/Job</li>
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
                        <a href="{{ route('top-menu.career') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Career/Jobs</a>
                    </div>
            <div class="card-body">
                <form id="newsForm" action="{{ !empty($editData)? route('top-menu.career.update',$editData->id) : route('top-menu.career.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Publish Start Date</label>
                            <input id="date" type="text" value="{{ !empty($editData->start_date)? date('d-m-Y',strtotime($editData->start_date)) : old('start_date') }}" class="form-control singledatepicker @error('start_date') is-invalid @enderror" name="start_date" placeholder="Publish Start Date"> @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Publish End Date</label>
                            <input id="date" type="text" value="{{ !empty($editData->end_date)? date('d-m-Y',strtotime($editData->end_date)) : old('end_date') }}" class="form-control singledatepicker @error('end_date') is-invalid @enderror" name="end_date" placeholder="Publish End Date"> @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Attachment<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('attachment') is-invalid @enderror" name="attachment"> @error('attachment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror textarea " name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                            @error('description')
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
        $("#newsForm").validate({
            rules: {
                'title':{
                    required:true
                },
                'date':{
                    required:true
                },
                'type':{
                    required:true,
                }
            }
        });
    });
</script>
    @endsection