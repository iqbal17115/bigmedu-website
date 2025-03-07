 @extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Faculty' : 'Faculty Add' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Faculty</li>
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
                <a href="{{route('site-setting.teacher.information')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Faculty</a>
            </div>
            <div class="card-body">
                <form id="socialsite" action="{{ !empty($editData)? route('site-setting.teacher.information.update',$editData->id) : route('site-setting.teacher.information.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

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
                              <label>Faculty Slug</label>
                              <input id="faculty_slug" value="{{ !empty($editData->faculty_slug)? $editData->faculty_slug : old('name') }}" type="text" class="form-control @error('faculty_slug') is-invalid @enderror" name="faculty_slug" placeholder="Category Slug" readonly>
                              @error('faculty_slug')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div> 
                        <div class="form-group col-sm-4">
                            <label>Faculty Designation</label>
                            <select class="form-control @error('designation_id') is-invalid @enderror" name="designation_id" >
                                <option value="">--Select Designation--</option>
                                @foreach($designation as $p)
                                <option {{ @$editData->designation_id == $p->id ? 'selected':''}} value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                            @error('designation_id')
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
                            <label>Faculty Contact</label>
                            <input id="phone" type="text" value="{{ !empty($editData->phone)? $editData->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Contact"> @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Faculty Room</label>
                            <input id="room" type="text" value="{{ !empty($editData->room)? $editData->room : old('room') }}" class="form-control @error('room') is-invalid @enderror" name="room" placeholder="Room"> @error('room')
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
                            <label>Google Scholar Link</label>
                            <input id="scholar_url" type="text" value="{{ !empty($editData->scholar_url)? $editData->scholar_url : old('scholar_url') }}" class="form-control @error('scholar_url') is-invalid @enderror" name="scholar_url" placeholder="Google scholar link"> @error('scholar_url')
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
                            <label>Serial</label>
                            <input id="serial" type="text" value="{{ !empty($editData->serial)? $editData->serial : old('serial') }}" class="form-control @error('serial') is-invalid @enderror" name="serial" placeholder="serial"> @error('serial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="form-group col-sm-6">
                            <label>Faculty Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror textarea " name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Degrees</label>
                            <textarea type="text" class="form-control @error('degree') is-invalid @enderror textarea " name="degree">{{ !empty($editData->degree)? $editData->degree : old('degree') }}</textarea>
                            @error('degree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> 
                        <div class="form-group col-sm-6">
                            <label>Awards/Honors</label>
                            <textarea type="text" class="form-control @error('award') is-invalid @enderror textarea " name="award">{{ !empty($editData->award)? $editData->award : old('award') }}</textarea>
                            @error('award')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Keywords/ Research Interest</label>
                            <textarea type="text" class="form-control @error('research') is-invalid @enderror textarea " name="research">{{ !empty($editData->research)? $editData->research : old('research') }}</textarea>
                            @error('research')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Patents</label>
                            <textarea type="text" class="form-control @error('patent') is-invalid @enderror textarea " name="patent">{{ !empty($editData->patent)? $editData->patent : old('patent') }}</textarea>
                            @error('patent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Recent/Selected Publications</label>
                            <textarea type="text" class="form-control @error('publication') is-invalid @enderror textarea " name="publication">{{ !empty($editData->publication)? $editData->publication : old('publication') }}</textarea>
                            @error('publication')
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
    $(function(){
      $('#name').on('keyup',function(){ 
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#faculty_slug").val(Text);
        });
    });
</script>

<script type="text/javascript">
    $(function() {

        $("#socialsite").validate({
            rules: {
                'facebook_url':{
                    url:true,
                },
                'scholar_url':{
                    url:true,
                },
                'website':{
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
                'scholar_url':{
                    url:"habahahdgjsa",
                },
                'website':{
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