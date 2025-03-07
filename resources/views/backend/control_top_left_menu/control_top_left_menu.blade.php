@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Control Top Left Menu</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Control Top Left Menu</li>
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
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                  <form action="{{ route('top-menu.store_control_top_left_menu') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                      @php
                        $controlTopLeftMenu = App\Model\ControlTopLeftMenu::first();
                      @endphp
                      <div class="col-md-1 col-lg-1 col-xl-1" style="margin-left: 20px;margin-top: 8px;color: red;">
                        <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$controlTopLeftMenu->status == 1 ? 'checked':'' }}>
                        <label class="form-check-label" for="status">On/Off</label>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1">
                        <button type="submit" class="btn bg-gradient-success btn-flat">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<!--/. container-fluid -->
</section>
@endsection

