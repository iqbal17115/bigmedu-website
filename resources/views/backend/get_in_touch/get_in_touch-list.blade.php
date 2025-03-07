@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Get in Touch</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Get in Touch</li>
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
        
        <div class="card-header">
          <a href="{{ route('footer-menu.get.in.touch.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Get in Touch</a>
        </div>
        
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Link</th>
                <th width="80">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($getInTouches as $getInTouch)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $getInTouch['title'] }}</td>
                <td>{{ $getInTouch['link'] }}</td>
                {{-- <td>{!!  $p['address']   !!}</td> --}}
                <td><a href="{{ route('footer-menu.get.in.touch.edit',$getInTouch->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('footer-menu.get.in.touch.delete') }}" data-id="{{ $getInTouch->id }}" ><i class="fas fa-trash"></i></a> 
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

