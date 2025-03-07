@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Student Feedbacks</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Student Feedbacks</li>
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
              <a href="{{ route('site-setting.student_feedbacks.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Student Feedback</a>
            </div>
            <div class="col-md-9 col-lg-9 col-xl-9">
              <form action="{{ route('site-setting.student_feedbacks.background.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row">
                  @php
                    $feedbackBackground = App\Model\FeedbackBackground::first();
                  @endphp
                  <div class="col-md-1 col-lg-1 col-xl-1" style="margin-left: 20px;margin-top: 8px;color: red;">
                    <input type="checkbox" name="show_section" class="form-check-input" id="show_section" value="1" {{ @$feedbackBackground->show_section == 1 ? 'checked':'' }}>
                    <label class="form-check-label" for="show_section">On/Off</label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-xl-5 row">
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;margin:0;">
                      <label style="padding:0;margin-top: 5%;">Background Image:</label>
                      
                    </div>
                    
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;">
                      <img src="{{asset('public/upload/student_feedbacks/'.@$feedbackBackground->image) }}" height="40">
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
                    <input type="checkbox" name="show_status" class="form-check-input" id="show_status" value="1" {{ @$feedbackBackground->show_status == 1 ? 'checked':'' }}>
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
                <th width="5%">#</th>
                <th width="13%">Name</th>
                <th width="14%">Designation & Working Place</th>
                <th width="35%">Description</th>
                <th width="13%">Image</th>
                <th width="7%">Sort Order</th>
                <th width="13%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($studentFeedbacks as $studentFeedback)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $studentFeedback['title'] }}</td>
                <td>{{ $studentFeedback['subtitle'] }}</td>
                <td>{!! $studentFeedback['description'] !!}</td>
                <td><img src="{{ asset('public/upload/student_feedbacks/'.$studentFeedback['image']) }}" height="80"></td>
                <td>{{ $studentFeedback['sort_order'] }}</td>
                <td><a href="{{ route('site-setting.student_feedbacks.edit',$studentFeedback->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('site-setting.student_feedbacks.delete') }}" data-id="{{ $studentFeedback->id }}" ><i class="fas fa-trash"></i></a> 
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

