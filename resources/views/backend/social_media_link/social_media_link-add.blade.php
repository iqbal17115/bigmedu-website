
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Social Media Link' : 'Add Social Media Link' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Social Media Link</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            {{-- <div class="card-header">
                <a href="{{route('footer-menu.social_media_links')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Social Media Link</a>
            </div> --}}
            <div class="card-body">
                <form id="" action="{{ !empty($editData)? route('footer-menu.social_media_links.update',$editData->id) : route('footer-menu.social_media_links.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-10">
                            <label>Facebook Link</label>
                            <input id="facebook_link" type="text" value="{{ !empty($editData->facebook_link)? $editData->facebook_link : old('facebook_link') }}" class="form-control @error('facebook_link') is-invalid @enderror" name="facebook_link" placeholder="Enter Facebook Link"> @error('facebook_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> 
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="facebook_status" class="form-check-input" id="facebook_status" value="1" {{ @$editData->facebook_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="facebook_status">Show Status</label>
                            </div>
                        </div>  
                        <div class="form-group col-sm-10">
                            <label>Twitter Link</label>
                            <input id="twitter_link" type="text" value="{{ !empty($editData->twitter_link)? $editData->twitter_link : old('twitter_link') }}" class="form-control @error('twitter_link') is-invalid @enderror" name="twitter_link" placeholder="Enter Twitter Link"> @error('twitter_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>   
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="twitter_status" class="form-check-input" id="twitter_status" value="1" {{ @$editData->twitter_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="twitter_status">Show Status</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label>Instagram Link</label>
                            <input id="instagram_link" type="text" value="{{ !empty($editData->instagram_link)? $editData->instagram_link : old('instagram_link') }}" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link" placeholder="Enter Instagram Link"> @error('instagram_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>     
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="instagram_status" class="form-check-input" id="instagram_status" value="1" {{ @$editData->instagram_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="instagram_status">Show Status</label>
                            </div>
                        </div>           
                        <div class="form-group col-sm-10">
                            <label>Linkedin Link</label>
                            <input id="linkedin_link" type="text" value="{{ !empty($editData->linkedin_link)? $editData->linkedin_link : old('linkedin_link') }}" class="form-control @error('linkedin_link') is-invalid @enderror" name="linkedin_link" placeholder="Enter Linkedin Link"> @error('linkedin_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> 
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="linkedin_status" class="form-check-input" id="linkedin_status" value="1" {{ @$editData->linkedin_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="linkedin_status">Show Status</label>
                            </div>
                        </div>  
                        <div class="form-group col-sm-10">
                            <label>Youtube Link</label>
                            <input id="youtube_link" type="text" value="{{ !empty($editData->youtube_link)? $editData->youtube_link : old('youtube_link') }}" class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" placeholder="Enter Youtube Link"> @error('youtube_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>   
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="youtube_status" class="form-check-input" id="youtube_status" value="1" {{ @$editData->youtube_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="youtube_status">Show Status</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label>Whatsapp Link</label>
                            <input id="whatsapp_link" type="text" value="{{ !empty($editData->whatsapp_link)? $editData->whatsapp_link : old('whatsapp_link') }}" class="form-control @error('whatsapp_link') is-invalid @enderror" name="whatsapp_link" placeholder="Enter Whatsapp Link"> @error('whatsapp_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>   
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="whatsapp_status" class="form-check-input" id="whatsapp_status" value="1" {{ @$editData->whatsapp_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="whatsapp_status">Show Status</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label>P-interest Link</label>
                            <input id="pinterest_link" type="text" value="{{ !empty($editData->pinterest_link)? $editData->pinterest_link : old('pinterest_link') }}" class="form-control @error('pinterest_link') is-invalid @enderror" name="pinterest_link" placeholder="Enter P-interest Link"> @error('pinterest_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>   
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="pinterest_status" class="form-check-input" id="pinterest_status" value="1" {{ @$editData->pinterest_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="pinterest_status">Show Status</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-10">
                            <label>Mail Link</label>
                            <input id="mail_link" type="text" value="{{ !empty($editData->mail_link)? $editData->mail_link : old('mail_link') }}" class="form-control @error('mail_link') is-invalid @enderror" name="mail_link" placeholder="Enter Mail Link"> @error('mail_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>   
                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="mail_status" class="form-check-input" id="mail_status" value="1" {{ @$editData->mail_status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="mail_status">Show Status</label>
                            </div>
                        </div>
                          
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
   
    @endsection