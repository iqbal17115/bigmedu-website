@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Completed Research' : 'Add Completed Research' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Completed Research</li>
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
                <a href="{{route('frontend-menu.completed_research')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Completed Research</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('frontend-menu.completed_research.update',$editData->id) : route('frontend-menu.completed_research.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label>Research Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Research Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Author</label>
                            <textarea id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author">{{ !empty($editData->author)? $editData->author : old('author') }}</textarea>
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Journal and Publisher Name</label>
                            <textarea id="journal_name" type="text" class="form-control @error('journal_name') is-invalid @enderror" name="journal_name">{{ !empty($editData->journal_name)? $editData->journal_name : old('journal_name') }}</textarea>
                            @error('journal_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Journal Index</label>
                            <input id="journal_index" type="text" value="{{ !empty($editData->journal_index)? $editData->journal_index : old('journal_index') }}" class="form-control @error('journal_index') is-invalid @enderror" name="journal_index" placeholder=""> @error('journal_index')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Journal Category</label>
                            <input id="journal_category" type="text" value="{{ !empty($editData->journal_category)? $editData->journal_category : old('journal_category') }}" class="form-control @error('journal_category') is-invalid @enderror" name="journal_category" placeholder=""> @error('journal_category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-8">
                            <label>URL</label>
                            <input type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ !empty($editData->url)? $editData->url : old('url') }}"> @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select</option>
                                <option value="Research" {{(@$editData->type == 'Research')?('selected'):''}}>Research</option>
                                <option value="Conference" {{(@$editData->type == 'Conference')?('selected'):''}}>Conference</option>
                                <option value="Book Chapter" {{(@$editData->type == 'Book Chapter')?('selected'):''}}>Book Chapter</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Year</label>
                            <select class="form-control" name="year">
                                <option value="">Select Year</option>
                                @for($i = date('Y'); $i >= 1900; $i--)
                                <option @if( !empty($editData->year) && $editData->year == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Status</label>
                            <select name="publish_status" id="publish_status" class="form-control">
                                <option value="">Select</option>
                                <option value="Published" {{(@$editData->publish_status == 'Published')?('selected'):''}}>Published</option>
                                <option value="Completed" {{(@$editData->publish_status == 'Completed')?('selected'):''}}>Completed</option>
                                <option value="Accepted" {{(@$editData->publish_status == 'Accepted')?('selected'):''}}>Accepted</option>
                                <option value="Under Review" {{(@$editData->publish_status == 'Under Review')?('selected'):''}}>Under Review</option>
                                <option value="Submitted" {{(@$editData->publish_status == 'Submitted')?('selected'):''}}>Submitted</option>
                                <option value="Abstract accepted" {{(@$editData->publish_status == 'Abstract accepted')?('selected'):''}}>Abstract accepted</option>
                            </select>
                        </div>

                        {{-- <div class="form-group col-sm-4">
                            <label>PDF<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('pdf') is-invalid @enderror" name="pdf"> @error('pdf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> --}}

                        <div class="form-group col-sm-4">
                            <label>Sort Date</label>
                            <input id="date" type="text" value="{{ !empty($editData->date)? date('d-m-Y',strtotime($editData->date)) : old('date') }}" class="form-control singledatepicker @error('date') is-invalid @enderror" name="date" placeholder="Date" readonly> @error('date')
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