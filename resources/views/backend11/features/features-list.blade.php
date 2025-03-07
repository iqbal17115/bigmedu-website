@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Features</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Features</li>
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
          <a href="{{ route('site-setting.features.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Feature</a>
        </div> --}}
        
        <div class="card-body">
          <table id="" class="table table-sm">
            <thead>
              <tr>
                <th width="3%">#</th>
                <th width="10%">Title</th>
                <th width="55%">Description</th>
                <th width="10%">Image</th>
                <th width="8%">Order</th>
                <th width="14%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($features as $feature)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $feature['title'] }}</td>
                <td>{!! $feature['description'] !!}</td>
                <td><img src="{{ asset('public/upload/features/'.$feature['image']) }}" height="80"></td>
                <td>{{ $feature['sort_order'] }}</td>
                <td><a href="{{ route('site-setting.features.edit',$feature->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a>
                  {{-- | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('site-setting.features.delete') }}" data-id="{{ $feature->id }}" ><i class="fas fa-trash"></i></a>  --}}
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

