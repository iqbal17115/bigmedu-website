@extends('backend.layouts.app') @section('content')
<style type="text/css">
.list-group li a{
  padding-left: 20px;
}

</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
        <div class="row">
            <div class="col-md-12">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('public/uploads/images/profile.jpg') }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $resource_person['name'] }}</h3>

                        <p class="text-muted text-center">{{ $resource_person['designation'] }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name :</b> <a class="">{{ $resource_person['name'] }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Designation :</b> <a class="">{{ $resource_person['designation'] }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email :</b> <a class="">{{ $resource_person['email'] }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Mobile :</b> <a class="">{{ $resource_person['contact_no'] }}</a>
                            </li>
                            
                            <li class="list-group-item">
                                <b>Present Address :</b> <a class="">{!!  $resource_person['present_address']  !!}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Permanent Address :</b> <a class="">{!!  $resource_person['permanent_address']  !!}</a>
                            </li>
                        </ul>
                        <div class="col-md-2">
                          <a href="{{ route('project-management.resource.profile.edit',$resource_person['id']) }}" class="btn btn-primary btn-block"><b>Edit</b></a>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->

                <!-- /.card -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection