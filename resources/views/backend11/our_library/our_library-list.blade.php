@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Our Library</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Our Library</li>
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
              <a href="{{ route('site-setting.our_library.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Our Library</a>
            </div>
            <div class="col-md-9 col-lg-9 col-xl-9">
              <form action="{{ route('site-setting.our_library.background.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="row">
                  @php
                    $libraryBackground = App\Model\LibraryBackground::first();
                  @endphp
                  <div class="col-md-1 col-lg-1 col-xl-1" style="margin-left: 20px;margin-top: 8px;color: red;">
                    <input type="checkbox" name="show_section" class="form-check-input" id="show_section" value="1" {{ @$libraryBackground->show_section == 1 ? 'checked':'' }}>
                    <label class="form-check-label" for="show_section">On/Off</label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-xl-5 row">
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;margin:0;">
                      <label style="padding:0;margin-top: 5%;">Background Image:</label>
                      
                    </div>
                    
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0;">
                      <img src="{{asset('public/upload/our_library/'.@$libraryBackground->image) }}" height="40">
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
                    <input type="checkbox" name="show_status" class="form-check-input" id="show_status" value="1" {{ @$libraryBackground->show_status == 1 ? 'checked':'' }}>
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
                <th width="">#</th>
                <th width="">Title</th>
                <th width="">Image</th>
                <th width="">Sort Order</th>
                <th width="">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ourLibraries as $ourLibrary)	
              <tr>		                  	                 
                <td> {{$loop->iteration}}</td>
                <td>{{ $ourLibrary['title'] }}</td>
                <td><img src="{{ asset('public/upload/our_library/'.$ourLibrary['image']) }}" height="80"></td>
                <td>{{ $ourLibrary['sort_order'] }}</td>
                <td><a href="{{ route('site-setting.our_library.edit',$ourLibrary->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('site-setting.our_library.delete') }}" data-id="{{ $ourLibrary->id }}" ><i class="fas fa-trash"></i></a> 
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

