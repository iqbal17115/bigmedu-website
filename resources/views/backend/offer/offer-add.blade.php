
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Offer' : 'Add Offer' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Offer</li>
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
                        <a href="{{route('site-setting.offer')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Offer</a>
                    </div>
            <div class="card-body">
                <form id="offerForm" action="{{ !empty($editData)? route('site-setting.offer.update',$editData->id) : route('site-setting.offer.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-8">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-8">
                            <label>URL</label>
                            {{-- <input id="offer_url" type="url" value="{{ !empty($editData->offer_url)? $editData->offer_url : old('offer_url') }}" class="form-control @error('offer_url') is-invalid @enderror" name="offer_url" placeholder="URL"> @error('offer_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror --}}
                            <input data-toggle="modal" data-target="#myModal" type="text" name="offer_url" id="url_link" class="form-control form-control-sm url_link" value="{{ !empty($editData->offer_url)? $editData->offer_url : old('offer_url') }}" readonly>
                            <input type="hidden" name="url_link_file" id="url_link_file" class="url_link_file" value="{{ !empty($editData->url_link_file)? $editData->url_link_file : old('url_link_file') }}">
                            <input type="hidden" name="url_link_type" id="url_link_type" class="url_link_type" value="{{ !empty($editData->url_link_type)? $editData->url_link_type : old('url_link_type') }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Sort Order</label>
                            <input id="sort_order" type="text" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Sort Order"> @error('sort_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Short Description</label>
                            <textarea type="text" class="form-control @error('short_description') is-invalid @enderror " name="short_description">{{ !empty($editData->short_description)? $editData->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>                 
                        <div class="form-group col-sm-6">
                            <label>Long Description</label>
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
        $("#offerForm").validate({
            rules: {
                'title':{
                    required:true
                }
            }
        });
    });
</script>
    @endsection