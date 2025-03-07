@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Member to Course as Faculty' : 'Add Member to Course as Faculty' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Member to Course as Faculty</li>
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
                <a href="{{route('member_to_course.list')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Member to Course as Faculty</a>
            </div>
            <div class="card-body">
                <form id="addMemberToCourse" action="{{ !empty($editData)? route('member_to_course.update',$editData->id) : route('member_to_course.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-6">

                            @php
                                $program_infos = \App\Model\ProgramInfo::all();
                            @endphp

                            <label class="control-label">Program</label>
                            <select id="program_info_id" class="form-control form-control-sm select2" name="program_info_id">
                                <option value="" disabled selected>Select Program</option>

                                @foreach($program_infos as $program_info)
                                    <option @if( !empty($editData) && $editData->course_info->program_info_id == $program_info->id) selected @endif value="{{ $program_info->id }}">{{ $program_info->name }}</option>                 
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
                            if(!empty($editData))
                            {
                                $courseInfos = \App\Model\CourseInfo::where('program_info_id',$editData->course_info->program_info_id)->get();
                                //dd($courseInfos);
                            }
                            @endphp

                            <label class="control-label">Course</label>
                            {{-- <input id="course_id_for_ajax_use" type="hidden" value="{{ $editData->course_info_id }}"> --}}
                            <select id="course_info_id" class="form-control form-control-sm select2" name="course_info_id">
                                <option value="" disabled selected>Select Course</option>
                                @if(!empty($editData))
                                    @foreach($courseInfos as $courseInfo)
                                        <option @if( !empty($editData) && $editData->course_info->id == $courseInfo->id) selected @endif value="{{ $courseInfo->id }}">{{ $courseInfo->name }}</option>                 
                                    @endforeach
                                @endif
                            </select>
                            @error('course_info_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 

                        <div class="form-group col-sm-4">

                            @php
                                $facultyTypes = \App\Model\FacultyType::get();
                            @endphp

                            <label class="control-label">Faculty Type</label>
                            <select id="faculty_type_id" class="form-control form-control-sm select2" name="faculty_type_id">
                                <option value="" disabled selected>Select Faculty Type</option>

                                @foreach($facultyTypes as $facultyType)
                                    <option @if( !empty($editData) && $editData->faculty_type_id == $facultyType->id) selected @endif value="{{ $facultyType->id }}">{{ $facultyType->type }}</option>                 
                                @endforeach

                            </select>
                            @error('faculty_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Select Member</label>
                            <select id="governing_member_id" class="form-control form-control-sm select2" name="member_id">
                                <option value="" disabled selected>Select Member</option>
                                
                                @foreach($members as $member)
                                <option @if( !empty($editData) && $editData->member_id == $member->id) selected @endif value="{{ $member->id }}">{{ $member->name }}</option>                 
                                @endforeach
                            </select>
                            @error('member_id')
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
                        
                        <div class="form-group col-sm-4">
                            <label>Sort Order</label>
                            <input id="sort_order" type="number" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Enter Sort Order">
                            @error('sort_order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Member to Course as Faculty' : 'Save Member to Course as Faculty' }}</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
    
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
                        $('#course_info_id').append('<option disabled selected value ="">Select Course</option>');
                        $.each(data,function(index,subcatObj){
                            $('#course_info_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
                        });
                    }
                    else
                    {
                        console.log('failed');
                    }
                }
            });
        });
        // $(function(){
        //     $('#addMemberToCourse').validate({
        //         rules:{
        //             program_info_id:{
        //                 required: true
        //             },  
        //             course_info_id:{
        //                 required: true
        //             },  
        //             faculty_type_id:{
        //                 required: true
        //             },    
        //             member_id:{
        //                 required: true
        //             }, 
        //         },
        //         messages:{
        //             program_info_id:{
        //                 required: "Please select a Program."
        //             },  
        //             course_info_id:{
        //                 required: "Please select a Course."
        //             },  
        //             faculty_type_id:{
        //                 required: "Please select a Course."
        //             },  
        //             member_id:{
        //                 required: "Please select a Course."
        //             },       
        //         } 
        //     });
        // });

    </script>
    @endsection