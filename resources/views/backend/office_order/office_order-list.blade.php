@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">NOC/Office Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">NOC/Office Order</li>
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
                <a href="{{ route('footer-menu.office.order.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add NOC/Office Order</a>
                <a target="_blank" href="{{route('noc.office.order')}}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View on Website</a>
	        		</div>

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
                        <th>SI</th>
                        <th>Title</th>
                        <th>Publish Date</th>
                        <th>Attachments</th>
                        <th>Status</th>
                        <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @foreach($officeOrders as $officeOrder)  
                    <tr>    
                      <td>{{ $loop->iteration }}</td>                                     
                      <td>{{$officeOrder['title']}}</td>
                      <td>{{date('d/m/Y',strtotime($officeOrder['publish_date']))}}</td>
                      <td style="text-align: center;">
                          @php $attachments = \App\Model\OfficeOrderAttachment::where('office_order_id',$officeOrder->id)->get(); @endphp
                          @foreach($attachments as $attachment)
                          {{-- <img src="{{ asset('public/frontend/images/pdf_icon.png') }}" height="40"> --}}
                          @php 
                            if($attachment->attachment != Null)
                            {
                                $ext = explode('.',$attachment->attachment);
                                //dd($ext[1]);
                            }
                          @endphp
                          @if($attachment->attachment != Null && $ext[1] == 'pdf') <a target="_blank" href="{{ asset('public/upload/office_order/'.$attachment->attachment) }}"><img src="{{ asset('public/frontend/images/pdf_icon.png') }}" height="40"></a>@endif
                          @if($attachment->attachment != Null && ($ext[1] == 'doc' || $ext[1] == 'docm' || $ext[1] == 'docx')) <a target="_blank" href="{{ asset('public/upload/office_order/'.$attachment->attachment) }}"><img src="{{ asset('public/frontend/images/doc_icon.png') }}" height="40"></a>@endif
                          {{-- <img src="{{ asset('public/frontend/images/doc_icon.png') }}" height="40"> --}}
                          @endforeach
                      </td>
                      <td><span class="badge {{ $officeOrder['status'] == 1 ? 'badge-success' : 'badge-danger' }}">{{ $officeOrder['status'] == 1 ? 'Active' : 'Inactive' }}</span></td>
                      <td><a href="{{ route('footer-menu.office.order.edit',$officeOrder->id) }}" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('footer-menu.office.order.delete') }}" data-id="{{ $officeOrder->id }}" ><i class="fas fa-trash"></i></a>
                      
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
        </div>
      </div>
      <!--/. container-fluid -->
    </section>
@endsection

