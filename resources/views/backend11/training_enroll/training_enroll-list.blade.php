@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Training and Enroll</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Training and Enroll</li>
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
              <a href="{{ route('site-setting.training_enroll.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Training and Enroll</a>
            </div>
            <div class="col-md-9 col-lg-9 col-xl-9">
              <form action="{{ route('site-setting.training_enroll.background.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-md-3 col-lg-3 col-xl-3">
              
                  </div>
                  <div class="col-md-5 col-lg-5 col-xl-5 row">
                    <div class="col-md-7 col-lg-7 col-xl-7" style="padding: 0;margin:0;">
                      <label style="padding:0;margin-top: 5%;">Background Image:</label>
                      
                    </div>
                    @php
                      $trainingBackground = App\Model\TrainingBackground::first();
                    @endphp
                    <div class="col-md-5 col-lg-5 col-xl-5" style="padding: 0;">
                      <img src="{{asset('public/upload/training_enroll/'.@$trainingBackground->image) }}" height="40">
                    </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
                    <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image" style="margin: 0;">
                    <small style="color: brown"> (Max 2 mb)</small>
                    {{-- <small style="color: brown;">mp4 (1920px * 650px) (Max 5 mb)</small> --}}
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  {{-- <div class="col-md-1 col-lg-1 col-xl-1" style="margin-left: 20px;margin-top: 5px;">
                    <input type="checkbox" name="show_video" class="form-check-input" id="show_video" value="1" {{ @$sliderVideo->show_video == 1 ? 'checked':'' }}>
                    <label class="form-check-label" for="show_video">Show</label>
                  </div> --}}
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
                <th>subtitle</th>
                <th>Icon</th>
                <th width="7%">Sort Order</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($trainingEnrolls as $trainingEnroll)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $trainingEnroll['title'] }}</td>
                <td>{!! $trainingEnroll['subtitle'] !!}</td>
                <td><img src="{{ asset('public/upload/training_enroll/'.$trainingEnroll['image']) }}" height="80"></td>
                <td>{{ $trainingEnroll['sort_order'] }}</td>
                <td><a href="{{ route('site-setting.training_enroll.edit',$trainingEnroll->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('site-setting.training_enroll.delete') }}" data-id="{{ $trainingEnroll->id }}" ><i class="fas fa-trash"></i></a> 
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

