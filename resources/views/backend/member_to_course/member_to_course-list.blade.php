@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h5 class="m-0 text-dark">Member to Course as Faculty</h5>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Member to Course as Faculty</li>
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
                <h5>Select Program and Course</h5>
            </div>
            <div class="card-body">
                <form id="permission" class="form-horizontal" action="" method="get">
                    <input id="jsondata" type="hidden" value=""> 
                    <div class="form-group row">
                        <div class="col-sm-4">

                            @php
                                $prgramInfos = \App\Model\ProgramInfo::all();
                            @endphp

                            <label class="control-label">Program<span class="required">*</span></label>
                            <select id="program_info_id" name="program_info_id" class="form-control select2">
                                <option value="">Select Program</option>
                                @foreach($prgramInfos as $prgramInfo)
                                <option {{ ( $program_info_id == $prgramInfo->id ) ? 'selected':'' }} value="{{ $prgramInfo->id }}">{{ $prgramInfo->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <style>
                            .select2-container .select2-selection--single {
                                height: 38px;
                            }
                        </style>
                        <div class="col-sm-4">

                            @php
                                $courseInfos = \App\Model\CourseInfo::where('program_info_id',$program_info_id)->get();
                            @endphp

                            <label class="control-label">Course<span class="required">*</span></label>
                            <select name="course_info_id" class="form-control form-control-sm select2" id="course_info_id">
                                <option value="">Select Course</option>
                                {{-- @foreach($courseInfos as $courseInfo)
                                <option value="{{ $courseInfo->id }}" {{ ( request()->course_info_id == $courseInfo->id ) ? 'selected' : '' }}>{{ $courseInfo->name }}</option>                 
                                @endforeach --}}
                                @if(!empty($memberToCourses))
                                    @foreach($courseInfos as $courseInfo)
                                        <option @if( !empty($memberToCourses) && $course_info_id == $courseInfo->id) selected @endif value="{{ $courseInfo->id }}">{{ $courseInfo->name }}</option>                 
                                    @endforeach
                                @endif
                            </select>
                        </div>           
                        <div class="col-sm-4 mt-auto">              
                            <button id="search" class="btn btn-info">
                            <i class="ion-search"></i> Search</button>        
                            <a href="{{ route('member_to_course.add') }}" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Member as Faculty</a>       
                        </div>
                        {{-- <div class="col-sm-2 mt-auto">              
                            <a href="" class="btn btn-info"><i class="fas fa-plus"></i> Add Member</a>             
                        </div> --}}
                    </div>       
                </form>
            </div>
        </div>
        <br>
        @if(isset($memberToCourses)&& !empty($memberToCourses))
            <div id="deleteifchangeselectoption">
                <div class="card"> 
                    
                    <div class="card-header">
                        <h5>Found faculty member according to program and course</h5>
                    </div>
                    
                    <div class="card-body">
                    <table id="dataTable" class="table table-sm table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SI</th>
                            <th>Member Name</th>
                            <th>Faculty Type</th>
                            <th>Sort Order</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @php dd($memberToCourses); @endphp	 --}}
                        @foreach($memberToCourses as $memberToCourse)
                        <tr>
                            {{-- @php
                            if($loop->iteration == 6)
                            {
                                dd($memberToCourse->sort_order);
                            }
                            @endphp --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $memberToCourse->member->name }}</td>
                            <td>{{ $memberToCourse->faculty_type->type }}</td>
                            <td>{{ $memberToCourse->sort_order }}</td>
                            <td>
                                <a href="{{ route('member_to_course.edit',$memberToCourse->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | 
                                <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('member_to_course.delete') }}" data-id="{{ $memberToCourse->id }}" ><i class="fas fa-trash"></i></a> 
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
        @endif
    </div>
  </div>
</div>
<!--/. container-fluid -->
</section>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','#program_info_id,#course_info_id',function(){
            $('#deleteifchangeselectoption').remove();
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

        $('#search').on('click',function(){
            //$('.preload').show();
            var url="{{ route('member_to_course.list') }}";
            //var role_id="{{request()->user_role}}";
            var program_info_id = $('#program_info_id').val();
            var course_info_id = $('#course_info_id').val();        
            if(course_info_id){
                $.ajax({
                    'url':url,
                    'type':'get',
                    'data':{ program_info_id:program_info_id,course_info_id:course_info_id },
                    success:function(response){
                        if(response.status=='success'){
                            //$('.preload').hide();
                            //window.location.href="{{ route('user.permission') }}";
                            //$('#deleteifchangeselectoption').show();
                        }
                    }
                });
                }else{
                    //$('.preload').hide();   
                    //$.notify("Permission doesn't select","error");
                }     
        });

        $(function(){
            $('#permission').validate({
                rules:{
                    program_info_id:{
                        required: true
                    },  
                    course_info_id:{
                        required: true
                    },     
                },
                messages:{
                    program_info_id:{
                        required: "Please select a Program."
                    },  
                    course_info_id:{
                        required: "Please select a Course."
                    },       
                } 
            });
        });

    });
  </script>

@endsection

