@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Blog Comments</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Manage Blog Comments</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
     <div class="col-lg-12">
      <div class="card"> 
        
        
        {{-- <div class="card-header">
              <a href="{{ route('blog-management.blog_comment.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Blog Post</a>
        </div> --}}
        {{-- @php
            $blogComments = \App\Model\BlogComment::with('category')->get();
        @endphp --}}
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Comment</th>
                <th>Post</th>
                <th>Commented by</th>
                <th>Status</th>
                <th width="80">Action</th>
              </tr>
            </thead>
           
            <tbody>
              @foreach($blogComments as $blogComment)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{!! @$blogComment->comment_text !!}</td>
                <td>
                  {{ @$blogComment->blog_post->title }}
                </td>

                <td>
                  {{ @$blogComment->blog_user->name }}
                </td>
                @if(@$blogComment->status == 0)
                    <td><span class="badge bg-danger">Pending</span></td>
                @else
                    <td><span class="badge bg-success">Approved</span></td>
                @endif
                {{-- <td>{!!  $p['address']   !!}</td> --}}
                <td>
                    <a href="{{ route('blog-management.blog_comment.edit',@$blogComment->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | 
                    <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('blog-management.blog_comment.delete') }}" data-id="{{ @$blogComment->id }}" ><i class="fas fa-trash"></i></a> 
                </td>
              </tr>
              @endforeach                
            </tbody>                
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<!--/. container-fluid -->
</section>
@endsection

