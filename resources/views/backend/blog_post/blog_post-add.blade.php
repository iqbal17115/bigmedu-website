@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Blog Post' : 'Add Blog Post' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blog Post</li>
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
                <a href="{{route('blog-management.blog_post')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Blog Post</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('blog-management.blog_post.update',$editData->id) : route('blog-management.blog_post.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label style="font-size: 20px;">Title</label>
                            <input id="title" name="title" type="text" value="{{@$editData->title}}" class="form-control" placeholder="Post Title">
                        </div>
                        @php
                            $postCategories = \App\Model\PostCategory::orderBy('sort_order')->get();
                        @endphp
                        <div class="form-group col-sm-4">
                            <label>Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($postCategories as $postCategory)
                                <option value="{{ @$postCategory->id }}" {{(@$editData->category_id == @$postCategory->id)?('selected'):''}}>{{ @$postCategory->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="0" {{(@$editData->status == 0)?('selected'):''}}>Pending</option>
                                <option value="1" {{(@$editData->status == 1)?('selected'):''}}>Approved</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label style="font-size: 20px;">Description</label>
                            <textarea  name="description" class="textarea" required="">{{@$editData->description}}</textarea>
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Blog Post' : 'Save Blog Post' }}</button>
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