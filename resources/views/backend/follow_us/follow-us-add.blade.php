 @extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update FollowUs' : 'Add FollowUs' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Follow Us</li>
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
            <div class="card-header">
                <a href="{{route('site-setting.follow.us')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Follow Us</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.follow.us.update',$editData->id) : route('site-setting.follow.us.store') }}" id="socialsite" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label>Facebook URL</label>
                            <input id="facebook_url" type="text" value="{{ !empty($editData->facebook_url)? $editData->facebook_url : old('facebook_url') }}" class="form-control @error('facebook_url') is-invalid @enderror" name="facebook_url" placeholder="Facebook"> @error('facebook_url')
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
                            <label>Youtube URL</label>
                            <input id="youtube_url" type="text" value="{{ !empty($editData->youtube_url)? $editData->youtube_url : old('youtube_url') }}" class="form-control @error('youtube_url') is-invalid @enderror" name="youtube_url" placeholder="Youtube"> @error('youtube_url')
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

                    </div>
                    <button type="submit" class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button>
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
                'youtube_url':{
                    url:true,
                },
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
                'youtube_url':{
                    url:"habahahdgjsa",
                },
                'instagram_url':{
                    url:"habahahdgjsa",
                }
            }
        });
    });
</script>
@endsection