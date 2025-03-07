@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Counter Box</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Counter Box</li>
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
          <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3">
              <a href="{{ route('frontend-menu.counter_box.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Counter Box</a>
            </div>
            <div class="col-md-9 col-lg-9 col-xl-9">
              <form action="{{ route('frontend-menu.counter_box.background.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-md-1 col-lg-1 col-xl-1">
              
                  </div>
                  <div class="col-md-5 col-lg-5 col-xl-5 row">
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;margin:0;">
                      <label style="padding:0;margin-top: 5%;">Background Image:</label>
                      
                    </div>
                    @php
                      $counterBackground = App\Model\CounterBackground::first();
                    @endphp
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;">
                      <img src="{{asset('public/upload/counter/'.@$counterBackground->image) }}" height="40">
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
                    <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image" style="margin: 0;">
                    {{-- <small style="color: brown;">mp4 (1920px * 650px) (Max 5 mb)</small> --}}
                    <small style="color: brown"> (Max 2 mb)</small>
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1" style="margin-left: 20px;margin-top: 5px;">
                    <input type="checkbox" name="show_status" class="form-check-input" id="show_status" value="1" {{ @$counterBackground->show_status == 1 ? 'checked':'' }}>
                    <label class="form-check-label" for="show_status">Show</label>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1">
                    <button type="submit" class="btn bg-gradient-success btn-flat">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Number</th>
                <th width="80">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($counterBoxes as $counterBox)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $counterBox['counter_title'] }}</td>
                <td>{{ $counterBox['counter_number'] }}</td>
                {{-- <td>{!!  $p['address']   !!}</td> --}}
                <td><a href="{{ route('frontend-menu.counter_box.edit',$counterBox->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('frontend-menu.counter_box.delete') }}" data-id="{{ $counterBox->id }}" ><i class="fas fa-trash"></i></a> 
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

