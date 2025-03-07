@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Offer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Offer</li>
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
                {{-- <a href="{{ route('site-setting.offer.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Offer</a> --}}
                <div class="col-md-12 col-lg-12 col-xl-12">
                  <form action="{{ route('site-setting.offer.store_video') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @php
                      $offerVideo = \App\Model\OfferBackgroundVideo::first();
                    @endphp
                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-xl-12 row">
                        {{-- <div class="col-md-1 col-lg-1 col-xl-1"></div> --}}
                        {{-- <div class="col-md-7 col-lg-7 col-xl-7" style="padding: 0;margin:0;">
                          <label style="margin-top: 1%;">Offer Youtube Video Link: <label><a style="text-decoration: underline;" href="{{ !empty($offerVideo) ? $offerVideo->youtube_link : '' }}" target="_blank">{{ !empty($offerVideo) ? $offerVideo->youtube_link : '' }}</a></label></label>
                        </div> --}}
                        <div class="col-md-4 col-lg-4 col-xl-4">
                          
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 row">
                          <div class="col-md-5 col-lg-5 col-xl-5"></div>
                          <div class="col-md-4 col-lg-4 col-xl-4" style="padding: 0;margin:0;">
                            <label style="padding:0;margin-top: 5%;">Offer Video:</label>
                            
                          </div>
                          {{-- <label>Video Banner:</label> --}}
                          @php
                          // dd(asset('public/upload/slider/'.$sliderVideo->video));
                          @endphp
                          <div class="col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
                            <video loop autoplay muted height="40" width="80" style="margin: 0;padding: 0;">
                              <source src="{{asset('public/upload/offer_video/'.@$offerVideo->offer_video) }}" >
                              Your browser does not support the video tag.
                            </video> 
                          </div>
                        </div>
                        {{-- <div class="col-md-4 col-lg-4 col-xl-4">
                          <label style="padding:0;margin-top: 2%;"><a style="text-decoration: underline;" href="{{ !empty($offerVideo) ? $offerVideo->youtube_link : '' }}" target="_blank">{{ !empty($offerVideo) ? $offerVideo->youtube_link : '' }}</a></label>
                        </div> --}}
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <input type="file" class="form-control filer_input_single @error('offer_video') is-invalid @enderror" name="offer_video" style="margin: 0;">
                          <small style="color: brown;">mp4 (1920px * 1080px) (Max 5 mb)</small>
                          {{-- <small style="color: brown;">mp4 (1920px * 650px) (Max 5 mb)</small> --}}
                          @error('offer_video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1">
                          <button type="submit" class="btn bg-gradient-success btn-flat">Save</button>
                        </div>
                    </div>
                  </form>
                </div>
	        		</div>

              
		            <div class="card-body">
		              <table id="" class="table table-sm">
		                <thead>
		                <tr>
		                  <th>#</th>
                      <th>Title</th>
                      <th>Short Description</th>
                      <th>Order</th>
                      <th>Image</th>
                      <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @foreach($offer as $n)  
                    <tr>    
                      <td>{{ $loop->iteration }}</td>                                     
                      <td>{{$n['title']}}</td>
                      <td>{!! $n['short_description'] !!}</td>
                      <td>{{$n['sort_order']}}</td>
                      <td><img src="{{asset('public/upload/offer/'.$n['image'])}}" style="height: 70px;"><td>
                      
                        <a href="{{ route('site-setting.offer.edit',$n->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a>
                        {{-- | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('site-setting.offer.delete') }}" data-id="{{ $n->id }}" ><i class="fas fa-trash"></i></a>  --}}
                      
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

