@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Comment Status' : 'Add Comment Status' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Comment</li>
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
                <a href="{{route('blog-management.blog_comment')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Comment</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('blog-management.blog_comment.update',$editData->id) : route('blog-management.blog_comment.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-12">
                            <label style="font-size: 20px;">Comment</label>
                            <input readonly id="comment_text" name="comment_text" type="text" value="{{@$editData->comment_text}}" class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label style="font-size: 20px;">Post</label>
                            <input readonly id="" name="" type="text" value="{{@$editData->blog_post->title}}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label style="font-size: 20px;">Commented By</label>
                            <input readonly id="" name="" type="text" value="{{@$editData->blog_user->name}}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label style="font-size: 20px;">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="0" {{(@$editData->status == 0)?('selected'):''}}>Pending</option>
                                <option value="1" {{(@$editData->status == 1)?('selected'):''}}>Approved</option>
                            </select>
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