@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Member To Employee' : 'Add Member To Employee' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Member To Employee</li>
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
                        <a href="{{route('member_to_employee.list')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Member To Employee</a>
                    </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('member_to_employee.update',$editData->id) : route('member_to_employee.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        
                        <div class="form-group col-sm-12">
                            @if($editData)
                                <img class="" src="{{ asset('public/upload/members/'.$editData['member']['image']) }}" width="150" height="200">
                                <h6 style="color: #2e848eeb;padding: 0; margin-top: 5px;" class="col-sm-12">{{ $editData['member']['name'] }}</h6>
                            @endif
                        </div>
                        <div class="form-group col-sm-8">
                            <label class="control-label">Select Member</label>
                            <select id="member_id" {{ !empty($editData) ? "readonly" : "" }} class="form-control form-control-sm select2" name="member_id">
                                <option value="" disabled selected>Select Member</option>
                                @if(!empty($editData)) 
                                    <option selected value="{{ $editData->member->id }}">{{ $editData->member->name }}</option>
                                @else
                                    @foreach($members as $member)
                                        <option @if( !empty($editData) && $editData->member_id == $member->id) selected @endif value="{{ $member->id }}">{{ $member->name }}</option>                 
                                    @endforeach
                                @endif
                            </select>
                        </div>    
                        <div class="form-group col-sm-4">
                            <label class="control-label">Select Department / Project</label>
                            <select id="dept_or_project" class="form-control form-control-sm select2" name="dept_or_project" required>
                                <option value="" disabled selected>Select Department / Project</option>

                                <option value="1" @if(!empty($editData) && $editData->dept_or_project == 1) selected @endif>Department</option>
                                <option value="2" @if(!empty($editData) && $editData->dept_or_project == 2) selected @endif>Project</option>
                            </select>
                        </div>
                        
                        <style>
                            .select2-container--default .select2-selection--single .select2-selection__rendered {
                                line-height: 20px;
                            }
                        </style>
                        
                        <div class="form-group col-sm-4">
                            <label>Extension Number</label>
                            <input id="ext_no" type="text" value="{{ !empty($editData->ext_no)? $editData->ext_no : old('ext_no') }}" class="form-control @error('ext_no') is-invalid @enderror" name="ext_no" placeholder="Enter Extension Number">
                            @error('ext_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Sort Order</label>
                            <input id="sort_order" type="number" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Enter Sort Order">
                            @error('sort_order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div id="dept_div" class="form-group col-sm-4" @if(empty($editData)) style="display: none;" @elseif(!empty($editData) && $editData->dept_or_project == 1) style="display: block;" @else style="display: none;" @endif >
                            <label class="control-label">Select Department</label>
                            <select id="dept_id" class="form-control form-control-sm select2" name="dept_id" style="width: 100%;">
                                <option id="first_option" value="" disabled selected>Select Department</option>
                                
                                @foreach($departments as $dept)
                                <option @if( !empty($editData) && $editData->dept_id == $dept->id) selected @endif value="{{ $dept->id }}">{{ $dept->dept_name }}</option>                 
                                @endforeach
                            </select>
                        </div>
                        <div id="project_div" class="form-group col-sm-4" @if(empty($editData)) style="display: none;" @elseif(!empty($editData) && $editData->dept_or_project == 2) style="display: block;" @else style="display: none;" @endif>
                            <label class="control-label">Select Project</label>
                            <select id="project_id" class="form-control form-control-sm select2" name="project_id" style="width: 100%;">
                                <option value="" disabled selected>Select Project</option>
                                
                                @foreach($projects as $project)
                                <option @if( !empty($editData) && $editData->project_id == $project->id) selected @endif value="{{ $project->id }}">{{ $project->project_name }}</option>                 
                                @endforeach
                            </select>
                        </div>

                    </div>    
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update' : 'Save' }}</button>
                    
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
        $(function() {
            $('#tour_name').on('keyup', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#tour_slug").val(Text);
            });
        });
    </script>
    <script>
        $(document).on('select change','#dept_or_project',function(){
            var dept_or_project = $('#dept_or_project').val();
            console.log(dept_or_project);
            if(dept_or_project == 1)
            {
                document.getElementById("dept_div").style.display = "block";
                document.getElementById("project_div").style.display = "none";

            }
            else if(dept_or_project == 2)
            {
                document.getElementById("project_div").style.display = "block";
                document.getElementById("dept_div").style.display = "none";
            }
        });
    </script>
    @endsection