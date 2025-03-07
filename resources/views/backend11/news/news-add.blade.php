
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update News | Event | Notice' : 'Add News | Event | Notice' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">News | Event | Notice</li>
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
                        <a href="{{ route('site-setting.news') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View News | Event | Notice</a>
                    </div>
            <div class="card-body">
                <form id="newsForm" action="{{ !empty($editData)? route('site-setting.news.update',$editData->id) : route('site-setting.news.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-9">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>File<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('file') is-invalid @enderror" name="file"> @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Date</label>
                            <input id="date" type="text" value="{{ !empty($editData->date)? date('d-m-Y',strtotime($editData->date)) : old('date') }}" class="form-control singledatepicker @error('date') is-invalid @enderror" name="date" placeholder="Date"> @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="1" {{(@$editData->type == '1')?('selected'):''}}>News</option>
                                <option value="2" {{(@$editData->type == '2')?('selected'):''}}>Event</option>
                                <option value="3" {{(@$editData->type == '3')?('selected'):''}}>Notice</option>
                                <option value="4" {{(@$editData->type == '4')?('selected'):''}}>General Notice</option>
                                <option value="5" {{(@$editData->type == '5')?('selected'):''}}>Special Notice</option>
                                <option value="6" {{(@$editData->type == '6')?('selected'):''}}>Tender Notice</option>
                            </select>
                        </div>
                        {{-- <div class="form-group  col-md-3" style="margin-top: 32px;">
                            
                            <input id="display_on_scrollbar" type="checkbox" value="1" class="form-check-input @error('display_on_scrollbar') is-invalid @enderror" name="display_on_scrollbar" checked>
                            <label for="display_on_scrollbar" class="form-check-label">Display on Scrollbar</label>
                            @error('display_on_scrollbar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div> --}}
                        <div class="col-sm-3" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="display_on_scrollbar" class="form-check-input" id="display_on_scrollbar" value="1" {{ @$editData->display_on_scrollbar == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="display_on_scrollbar">Display on Scrollbar</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Short Description</label>
                            <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description">{{ !empty($editData->short_description)? $editData->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Start Date</label>
                            <input id="start_date" type="text" value="{{ !empty($editData->start_date)? date('d-m-Y',strtotime($editData->start_date)) : old('start_date') }}" class="form-control singledatepicker @error('start_date') is-invalid @enderror" name="start_date" placeholder="Start Date"> @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>End Date</label>
                            <input id="end_date" type="text" value="{{ !empty($editData->end_date)? date('d-m-Y',strtotime($editData->end_date)) : old('end_date') }}" class="form-control singledatepicker @error('end_date') is-invalid @enderror" name="end_date" placeholder="End Date"> @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-6">

                            @php
                                $program_infos = \App\Model\ProgramInfo::all();
                            @endphp
                            {{-- @php
                                dd($editData->program_info_id);
                            @endphp --}}
                            <label class="control-label">Program</label>
                            <select id="program_info_id" class="form-control form-control-sm select2" name="program_info_id">
                                <option value="">General</option>
                                @foreach($program_infos as $program_info)               
                                    <option @if( !empty($editData) && $editData->program_info_id == $program_info->id) selected @endif value="{{ $program_info->id }}">{{ $program_info->name }}</option>                 
                                @endforeach

                            </select>
                            @error('program_info_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                        <div class="form-group col-sm-6">

                            @php
                            if(!empty($editData) && !empty($editData->program_info_id))
                            {
                                $courseInfos = \App\Model\CourseInfo::where('program_info_id',$editData->program_info_id)->get();
                                //dd($courseInfos);
                            }
                            @endphp

                            <label class="control-label">Course</label>
                            {{-- <input id="course_id_for_ajax_use" type="hidden" value="{{ $editData->course_info_id }}"> --}}
                            <select id="course_info_id" class="form-control form-control-sm select2" name="course_info_id">
                                <option value="">General</option>
                                @if(!empty($editData) && !empty($courseInfos))
                                    @foreach($courseInfos as $courseInfo)
                                        <option @if( !empty($editData) && $editData->course_info_id == $courseInfo->id) selected @endif value="{{ $courseInfo->id }}">{{ $courseInfo->name }}</option>                 
                                    @endforeach
                                @endif
                            </select>
                            @error('course_info_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <style>
                            .select2-container .select2-selection--single {
                                height: 38px;
                            }
                        </style>
                        {{-- <div class="form-group col-sm-6">
                            <label>Short Description</label>
                            <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror textarea" name="short_description">{{ !empty($editData->short_description)? $editData->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>                  --}}
                        <div class="form-group col-sm-12">
                            <label>Long Description</label>
                            <textarea id="long_description" type="text" class="form-control @error('long_description') is-invalid @enderror textarea" name="long_description">{{ !empty($editData->long_description)? $editData->long_description : old('long_description') }}</textarea>
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
            $("#newsForm").validate({
                rules: {
                    'title':{
                        required:true
                    },
                    'date':{
                        required:true
                    },
                    'type':{
                        required:true,
                    }
                }
            });
        });
        $(document).on('select change','#program_info_id',function(){
            var program_info_id = $('#program_info_id').val();
            console.log(program_info_id);
            $.ajax({
                url: "{{ route('program_wise_course') }}",
                type: "GET",
                data: { program_info_id: program_info_id },
                success: function(data)
                {
                    //console.log(data);
                    if(data != 'fail')
                    {
                        $('#course_info_id').empty();
                        if(program_info_id == "")
                        {
                            console.log("tuhin");
                            $('#course_info_id').append('<option value="">General</option>');
                        }
                        $.each(data,function(index,subcatObj){
                            $('#course_info_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
                        });
                    }
                    else
                    {
                        $('#course_info_id').append('<option value="">General</option>');
                        //console.log('failed');
                    }
                }
            });
        });
    </script>
    @endsection