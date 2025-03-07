@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Book / Publication' : 'Add Book / Publication' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Book / Publication</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<style>
    .select2-container .select2-selection--single {
        height: 35px;
    }
</style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                        <a href="{{route('library-management.books_publications')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Book / Publication</a>
                    </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('library-management.books_publications.update',$editData->id) : route('library-management.books_publications.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-8">
                            <label>Type</label>
                            <select name="type" id="type" class="form-control select2">
                                <option value="">Select Type</option>
                                <option value="1" {{(@$editData->type == '1')?('selected'):''}}>New Arrivals</option>
                                <option value="2" {{(@$editData->type == '2')?('selected'):''}}>Upcoming Books</option>
                                <option value="3" {{(@$editData->type == '3')?('selected'):''}}>BIGM Publications/Journal</option>
                            </select>
                        </div>

                        <div class="col-sm-4" style="margin-top: 35px;" style="margin-bottom: 0;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="show_status" class="form-check-input" id="show_status" value="1" {{ @$editData->show_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="show_status">Show Status for Library Home Page</label>
                            </div>
                        </div>

                        <div class="form-group col-sm-8">
                            <label>Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ @$editData->title }}"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>PDF</label>
                            <input type="file" class="form-control filer_input_single @error('pdf') is-invalid @enderror" name="pdf"> @error('pdf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-8">
                            <label>Subject</label>
                            <select name="library_subject_id" id="library_subject_id" class="form-control select2">
                                <option value="">Select Subject</option>
                                @foreach($librarySubjects as $librarySubject)
                                <option value="{{@$librarySubject->id}}" {{(@$editData->library_subject_id == @$librarySubject->id)?('selected'):''}}>{{@$librarySubject->subject_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-4" style="margin-top: 35px;" style="margin-bottom: 0;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="show_status_for_subject" class="form-check-input" id="show_status_for_subject" value="1" {{ @$editData->show_status_for_subject == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="show_status_for_subject">Show Status for Subjectwise Book Page</label>
                            </div>
                        </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update' : 'Save' }}</button>
                    </div>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    @endsection