@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Advisor' : 'Add Advisor' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Advisor</li>
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
                        <a href="{{route('site-setting.advisor')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Advisor</a>
                    </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.advisor.update',$editData->id) : route('site-setting.advisor.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        
                        <div class="form-group col-sm-12">
                            @if($editData)
                                <img class="" src="{{ asset('public/upload/members/'.$editData['member']['image']) }}" width="150" height="200">
                                <h6 style="color: #2e848eeb;padding: 0; margin-top: 5px;" class="col-sm-12">{{ $editData['member']['name'] }}</h6>
                            @endif
                        </div>
                        <div class="form-group col-sm-9">
                            <label class="control-label">Select Member</label>
                            <select id="member_id" @if(!empty($editData)) readonly @endif  class="form-control form-control-sm select2" name="member_id" required>
                                @if(!empty($editData)) 
                                <option value="{{ $editData->member->id }}" readonly selected>{{ $editData->member->name }}</option>
                                @else
                                    <option value="" disabled selected>Select Member</option>
                                    
                                    @foreach($members as $member)
                                    <option @if( !empty($editData) && $editData->member_id == $member->id) selected @endif value="{{ $member->id }}">{{ $member->name }}</option>                 
                                    @endforeach
                                @endif
                            </select>
                        </div>    
                        <style>
                            .select2-container--default .select2-selection--single .select2-selection__rendered {
                                line-height: 20px;
                            }
                        </style>
                        
                        <div class="form-group col-sm-3">
                            <label>Sort Order</label>
                            <input id="sort_order" type="number" value="{{ !empty($editData->sort_order)? $editData->sort_order : old('sort_order') }}" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" placeholder="Enter Sort Order">
                            @error('sort_order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
    @endsection