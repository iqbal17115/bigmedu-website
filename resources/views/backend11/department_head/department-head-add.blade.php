
@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Head of Department' : 'Add Head of Department' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Head of Department</li>
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
            @if(session()->has('route'))

            @else
            <div class="card-header">
                <a href="{{route('site-setting.department.head.information')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Department Head</a>
            </div>
            @endif
            <div class="card-body">
                <form id="socialsite" action="{{ !empty($editData)? route('site-setting.department.head.information.update',$editData->id) : route('site-setting.department.head.information.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-4">
                            <label>Faculty Name</label>
                            <input id="name" type="text" value="{{ !empty($editData->name)? $editData->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"> @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Faculty Designation</label>
                            <input id="designation" type="text" value="{{ !empty($editData->designation)? $editData->designation : old('designation') }}" class="form-control @error('designation') is-invalid @enderror" name="designation" placeholder="Designation"> @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Faculty Email</label>
                            <input id="email" type="text" value="{{ !empty($editData->email)? $editData->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"> @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Faculty Contact</label>
                            <input id="phone" type="text" value="{{ !empty($editData->phone)? $editData->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Contact"> @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Faculty Website</label>
                            <input id="website" type="text" value="{{ !empty($editData->website)? $editData->website : old('website') }}" class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Website"> @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Faculty Image</label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Facebook URL</label>
                            <input id="facebook_url" type="text" value="{{ !empty($editData->facebook_url)? $editData->facebook_url : old('facebook_url') }}" class="form-control @error('email') is-invalid @enderror" name="facebook_url" placeholder="Facebook"> @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Twitter URL</label>
                            <input id="twitter_url" type="text" value="{{ !empty($editData->twitter_url)? $editData->twitter_url : old('twitter_url') }}" class="form-control @error('twitter_url') is-invalid @enderror" name="twitter_url" placeholder="Twitter"> @error('twitter_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Google Plus URL</label>
                            <input id="googleplus_url" type="text" value="{{ !empty($editData->googleplus_url)? $editData->googleplus_url : old('googleplus_url') }}" class="form-control @error('googleplus_url') is-invalid @enderror" name="googleplus_url" placeholder="GooglePlus"> @error('googleplus_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Instagram URL</label>
                            <input id="instagram_url" type="text" value="{{ !empty($editData->instagram_url)? $editData->instagram_url : old('instagram_url') }}" class="form-control @error('instagram_url') is-invalid @enderror" name="instagram_url" placeholder="Instagram"> @error('instagram_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                           
                        <div class="form-group col-sm-4">
                            <label>Address</label>
                            <textarea type="text" class="form-control @error('address') is-invalid @enderror  " name="address">{{ !empty($editData->address)? $editData->address : old('address') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label>Short Message</label>
                            <textarea type="text" class="form-control @error('short_description') is-invalid @enderror textarea " name="short_description">{{ !empty($editData->short_description)? $editData->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> 
                        <div class="form-group col-sm-6">
                            <label>Long Message</label>
                            <textarea type="text" class="form-control @error('long_description') is-invalid @enderror textarea " name="long_description">{{ !empty($editData->long_description)? $editData->long_description : old('long_description') }}</textarea>
                            @error('long_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>                  

                        
                        

  
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
    $(function() {

        $("#socialsite").validate({
            rules: {
                'facebook_url':{
                    url:true,
                },
                'twitter_url':{
                    url:true,
                },
                'googleplus_url':{
                    url:true,
                },
                // 'youtube_url':{
                //     url:true,
                // },
                'instagram_url':{
                    url:true,
                }
            },
            message:{
                'facebook_url':{
                    url:"habahahdgjsa",
                },
                'twitter_url':{
                    url:"habahahdgjsa",
                },
                'googleplus_url':{
                    url:"habahahdgjsa",
                },
                // 'youtube_url':{
                //     url:"habahahdgjsa",
                // },
                'instagram_url':{
                    url:"habahahdgjsa",
                }
            }
        });
    });
</script>
    @endsection