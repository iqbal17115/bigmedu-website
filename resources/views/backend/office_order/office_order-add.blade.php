
@extends('backend.layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update NOC/Office Order' : 'Add NOC/Office Order' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">NOC/Office Order</li>
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
                        <a href="{{route('footer-menu.office.order')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View NOC/Office Order</a>
                    </div>
            <div class="card-body">
                <form id="" action="{{ !empty($editData)? route('footer-menu.office.order.update',$editData->id) : route('footer-menu.office.order.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-7" style="margin-bottom: 0;">
                            <label>Title</label>
                            <input id="title" type="text" value="{{ !empty($editData->title)? $editData->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3" style="margin-bottom: 0;">
                            <label>Publish Date</label>
                            <input id="publish_date" type="text" value="{{ !empty($editData->publish_date)? date('d-m-Y',strtotime($editData->publish_date)) : old('publish_date') }}" class="form-control singledatepicker @error('publish_date') is-invalid @enderror" name="publish_date" placeholder="Date"> @error('publish_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="col-sm-2" style="margin-top: 35px;" style="margin-bottom: 0;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
                              <label class="form-check-label" for="status">Show Status</label>
                            </div>
                        </div>   
                        <div class="form-group col-sm-12 increment">
                            {{-- <div class="control-group input-group"> --}}
                                
                                @php $attachments = \App\Model\OfficeOrderAttachment::where('office_order_id', !empty($editData->id)? $editData->id : '')->get(); @endphp
                                @if($attachments->count() != 0)
                                    <label>Existing Files</label>
                                @endif
                                <div class="form-group">
                                    @foreach($attachments as $attachment)
                                        {{-- <img src="{{ asset('public/upload/office_order/'.$attachment['attachment']) }}" height="80"> --}}
                                        @php 
                                            if($attachment->attachment != Null)
                                            {
                                                $ext = explode('.',$attachment->attachment);
                                                //dd($ext[1]);
                                            }
                                        @endphp
                                        @if($attachment->attachment != Null && $ext[1] == 'pdf') <a target="_blank" href="{{ asset('public/upload/office_order/'.$attachment['attachment']) }}"><img src="{{ asset('public/frontend/images/pdf_icon.png') }}" height="80"></a>@endif
                                        @if($attachment->attachment != Null && ($ext[1] == 'doc' || $ext[1] == 'docm' || $ext[1] == 'docx')) <a target="_blank" href="{{ asset('public/upload/office_order/'.$attachment['attachment']) }}"><img src="{{ asset('public/frontend/images/doc_icon.png') }}" height="80"></a>@endif

                                        <a href="{{ route('remove_office_order_attachment',$attachment->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        {{-- <a class="btn btn-sm btn-danger" type="button"><i class="fas fa-trash-alt"></i></a> --}}
                                    @endforeach
                                </div>
                            {{-- </div> --}}
                        </div>    
                        <div class="form-group col-sm-12">
                                <label>Upload new Attachment<small style="color: brown"> (Max 2 mb)</small></label>
                                <input id="attachment" type="file" value="" multiple="multiple" class="form-control @error('attachment') is-invalid @enderror" name="attachment[]"> @error('attachment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                        </div>

                        {{-- <div id="taught_courses" class="col-sm-12" style="margin-bottom: 8px;">
                            <h4>Attachments</h4>
                            
                            @if(!empty($editDataAttachments))
                            
                                @foreach($editDataAttachments as $key => $editDataAttachment)
                                <div class="" id="add_taught_courses_extra_div">
                                    <div class="row remove_taught_courses_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
                                        <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label>Upload new Attachments</label>
                                                    <input type="hidden" value="{{ !empty($editDataAttachment->id)? $editDataAttachment->id : "" }}" name="attachment_id[{{$key}}]">
                                                    <input id="attachment" type="file" value="" multiple="multiple" class="form-control @error('attachment') is-invalid @enderror" name="attachment[{{$key}}]"> @error('attachment')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">
                                
                                            <div class="form-group col-md-2">  
                                                @if($key != 0)
                                                <a href="{{ route('remove_office_order_attachment',$editDataAttachment->id) }}"> <i class="btn btn-danger fas fa-trash"> </i>  </a>
                                                @endif
                                                <i class="btn btn-info fa fa-plus-circle add_taught_courses_extra"></i>
                                            </div> 
                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
    
                            @if(empty($editDataAttachments) || count($editDataAttachments) == 0)
                            <div class="" id="add_taught_courses_extra_div">
                                <div class="row remove_taught_courses_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
                                    <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label>Upload new Attachments</label>
                                                <input id="attachment" type="file" value="" multiple="multiple" class="form-control @error('attachment') is-invalid @enderror" name="attachment[5000]"> @error('attachment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">
                            
                                        <div class="form-group col-md-2">
                                            <i class="btn btn-info fa fa-plus-circle add_taught_courses_extra"></i>
                                        </div> 
                        
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="" id="extra_taught_courses_div_here"></div>
                        </div> --}}
                          
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update ' : 'Save' }}</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>

    <script type="text/javascript">

        $(document).ready(function() {
    
          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
    
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });
    
        });
    
    </script>

<script id="extra_taught_courses_templete" type="text/x-handlebars-template">
    <div class="row remove_taught_courses_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
        <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Upload new Attachments</label>
                    <input id="attachment" type="file" value="" multiple="multiple" class="form-control @error('attachment') is-invalid @enderror" name="attachment[@{{counter}}]"> @error('attachment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                </div>
            </div>
        </div>
        <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

            <div class="form-group col-md-2">
                <i class="btn btn-info fa fa-plus-circle add_taught_courses_extra"></i>
                <i class="btn btn-danger fa fa-minus-circle remove_taught_courses_extra"> </i>
            </div> 

        </div>
    </div>
</script>

<script type="text/javascript">  
    $(document).ready(function(){  
        var counter = 10000;  
        $(document).on("click",".add_taught_courses_extra",function(){  
            var source = $("#extra_taught_courses_templete").html();  
            var template = Handlebars.compile(source);   
            var data= {counter:counter};   
            var html = template(data);   
            counter ++;  
            $("#extra_taught_courses_div_here").append(html);  
            $('.select2').select2(); 
        });   

        $(document).on("click", ".remove_taught_courses_extra", function (event) {  
            $(this).closest(".remove_taught_courses_extra_div").remove();         
        });   
    });   
</script>
   
@endsection