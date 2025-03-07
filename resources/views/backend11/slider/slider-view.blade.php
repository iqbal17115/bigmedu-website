@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <a href="{{ route('site-setting.slider.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Slider</a>
                  </div>
                  {{-- <div class="col-md-3 col-lg-3 col-xl-3">
                    
                  </div> --}}
                  <div class="col-md-10 col-lg-10 col-xl-10">
                    <form action="{{ route('site-setting.slider.store_video') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                      @csrf
                      <div class="row">
                        {{-- <div class="col-md-1 col-lg-1 col-xl-1">
                    
                        </div> --}}
                        {{-- <div class="col-md-2 col-lg-2 col-xl-2">
                          <label style="margin-top: 5%;">Video Banner:</label>
                        </div> --}}
                        <div class="col-md-4 col-lg-4 col-xl-4 row">
                          <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;margin:0;">
                            <label style="padding:0;margin-top: 5%;">Video Banner:</label>
                            
                          </div>
                          {{-- <label>Video Banner:</label> --}}
                          @php
                          // dd(asset('public/upload/slider/'.$sliderVideo->video));
                          @endphp
                          <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;">
                            <video loop autoplay muted height="40" width="80" style="margin: 0;padding: 0;">
                              <source src="{{asset('public/upload/slider/'.@$sliderVideo->video) }}">
                              Your browser does not support the video tag.
                            </video> 
                          </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
                          <input type="file" class="form-control filer_input_single @error('video') is-invalid @enderror" name="video" style="margin: 0;">
                          <small style="color: brown;">mp4 (1920px * 650px) (Max 5 mb)</small>
                          @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1">
                          <label style="margin-top: 7%;">Opacity:</label>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 row">
                          <div class="col-md-9 col-lg-9 col-xl-9" style="margin-right: 0;padding-right:0;">
                            <input style="margin-right: 0;padding-right:0;" type="text" name="opacity" value="{{ @$sliderVideo->opacity }}" class="form-control filer_input_single @error('opacity') is-invalid @enderror" placeholder="Opacity(0.1 - 1)">
                          </div>
                          <div class="col-md-1 col-lg-1 col-xl-1">
                            <label style="margin-top: 5px;">%</label>
                          </div>
                          <div class="col-md-2 col-lg-2 col-xl-2">

                          </div>
                          @error('opacity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1" style="margin-left: 20px;margin-top: 5px;">
                          <input type="checkbox" name="show_video" class="form-check-input" id="show_video" value="1" {{ @$sliderVideo->show_video == 1 ? 'checked':'' }}>
                          <label class="form-check-label" for="show_video">Show</label>
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
                      <th>Discription</th>
                      <th>Slider Image</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($slider as $p)	
		                <tr>		                  	                 
		                    <td> {{$loop->iteration}}</td>
                        <td>{!!  $p['description']   !!}</td>
                        <td><img src="{{asset('public/upload/slider/'.$p['image']) }}" height="80"></td>
		                  	<td><a href="{{ route('site-setting.slider.edit',$p->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('site-setting.slider.delete') }}" data-id="{{ $p->id }}" ><i class="fas fa-trash"></i></a>
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

