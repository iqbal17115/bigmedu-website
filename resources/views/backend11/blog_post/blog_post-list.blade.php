@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Blog Posts</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Manage Blog Posts</li>
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
              <a href="{{ route('blog-management.blog_post.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Blog Post</a>
        </div> --}}
        @php
            $blogPosts = \App\Model\BlogPost::with('category')->get();
        @endphp
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Post Title</th>
                <th>Category Name</th>
                <th>Status</th>
                <th width="80">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($blogPosts as $blogPost)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td><img src="{{ asset('public/upload/post_category/'.$blogPost['image']) }}" height="80"></td>
                <td>{{ $blogPost->title }}</td>
                <td>{{ $blogPost->category->category_name }}</td>
                @if($blogPost->status == 0)
                    <td><span class="badge bg-danger">Pending</span></td>
                @else
                    <td><span class="badge bg-success">Approved</span></td>
                @endif
                {{-- <td>{!!  $p['address']   !!}</td> --}}
                <td>
                    <a href="{{ route('blog-management.blog_post.edit',$blogPost->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | 
                    <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('blog-management.blog_post.delete') }}" data-id="{{ $blogPost->id }}" ><i class="fas fa-trash"></i></a> 
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

