@extends('frontend.layouts.index')

@section('extra_css_files')
<link rel="stylesheet" href="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
@include('frontend.layouts.header')
@php
$urll = request()->fullUrl();
if($urll) {
    $url = explode('=',$urll);
    if(sizeOf($url) >= 3)
    {
        $ur = $url[2];
        $fmenu = DB::table('frontend_menus')->where('id', $ur)->first();
    }
}
//dd($fmenu);
@endphp

<style>
    .select2-container .select2-selection--single {
        height: 36px;
    }
</style>

<section id="news-event-notice" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 75px; @endif">
    <div class="container">
        <div class="row-">
            <div class="col-12">
                <div class="card" style="background: white;">
                    <div class="card-header">
                        <h4 class="m-0 text-dark" style="text-align: center;">Find Alumni according to program and batch</h4>
                    </div>
                    <div class="card-body">
                        <form id="" class="form-horizontal" action="{{ route('alumni') }}" method="get">
                            <div class="row">
                              <div class="col-md-5">
                                <label class="control-label">Program Name</label>
                                <select id="program_name" name="program_name" class="form-control select2" required>
                                  <option disabled selected value="">@lang('Select Program')</option>
                                  @foreach($programs as $program)
                                  <option value="{{ @$program->program_name }}" @if(@$program->program_name == request()->program_name) selected @endif>{{ @$program->program_name }}</option>
                                  @endforeach
                                </select>
                              </div>  
                              <div class="col-md-5">
                                <label class="control-label">Batch</label>
                                <select id="batch" name="batch" class="form-control select2" required>
                                  <option disabled selected value="">@lang('Select Batch')</option>
                                  @foreach($batches as $batch)
                                  <option value="{{ @$batch->batch }}" @if(@$batch->batch == request()->batch) selected @endif>{{ @$batch->batch }}</option>
                                  @endforeach
                                </select>
                              </div> 
                              <div id="search_reset" class="col-md-2 mt-auto" style="">              
                                  <button id="search" class="btn btn-info">
                                  <i class="ion-search"></i> Search</button>        
                                  {{-- <a href="{{ route('alumni') }}" class="btn btn-primary" style="text-decoration: none;">Reset</a>        --}}
                              </div>
                            </div>
                          </div>       
                        </form>
                    </div>
                </div>
                <h3 style="text-align: center;margin-top: 20px;">{{ request()->program_name }}</h3>
                @if(request()->batch)
                <h4 style="text-align: center;">Batch: {{ request()->batch }}</h4>
                @endif
                @if(@$alumnies[0]->duration)
                <h6 style="text-align: center;">Duration: {{ @$alumnies[0]->duration }}</h6>
                @endif
                @if(@$alumnies[0]->completion_year)
                <h6 style="text-align: center;">Completion Year: {{ @$alumnies[0]->completion_year }}</h6>
                @endif
                @if(request()->program_name && request()->batch)
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <table id="dataTable" class="table table-sm table-bordered table-striped ">
                            <thead style="background: #becea9;">
                                <tr>
                                    <th>Membership No</th>
                                    <th>Job Title</th>
                                    <th>Phone<br> Email</th>
                                    <th>Designation</th>
                                    <th>Organization Name</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl = 1; @endphp
                                @foreach($alumnies as $alumni)  
                                <tr>    
                                    <td>{{ "BIGM".$sl++ }}</td>
                                    <td>{{ @$alumni->title }}</td>
                                    <td>{{ @$alumni->mobile_no }}<br>{{ @$alumni->email }}</td>
                                    <td>{{ @$alumni->designation }}</td>
                                    <td>{{ @$alumni->organization_name }}</td>
                                    <td>
                                        <img src="{{asset( 'public/upload/alumni/'.@$alumni->image)}}" style="height: 100px;width: 100px;">
                                    </td>
                                </tr>
                                @endforeach    
                            </tbody>                
                          </table>
                    </div>
                </div>
                @endif
                {{-- @php
                $last = \App\Model\Career::latest()->first();
                @endphp
                @if(@$last['updated_at'])
                <div style="margin-top: 2px;color: #070101;margin-bottom: 5px;text-align: right;">
                    Updated at {{date('d-M-Y',strtotime(@$last['updated_at']))}}
                    </div>
                </div>
                @endif --}}
            </div>
        </div>
    </div>
</section>

@include('frontend.layouts.footer')

<script type="text/javascript">
	$(document).ready(function () {
        $(document).on('select change','#program_name',function(){
            var program_name = $('#program_name').val();
            console.log(program_name);
            $.ajax({
                url: "{{ route('program_wise_batch') }}",
                type: "GET",
                data: { program_name: program_name },
                success: function(data)
                {
                    //console.log(data);
                    if(data != 'fail')
                    {
                        $('#batch').empty();
                        $('#batch').append('<option disabled selected value ="">Select Batch</option>');
                        $.each(data,function(index,subcatObj){
                            $('#batch').append('<option value ="'+subcatObj.batch+'">'+subcatObj.batch +'</option>');
                        });
                    }
                    else
                    {
                        console.log('failed');
                    }
                }
            });
        });
	});
</script>

    @section('extra_script_files')
        <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
        <script>
            $(function () {
            $('.select2').select2();     
            });
        
            $('#dataTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            });  
        </script>
        <script src="{{asset('public/backend/plugins/select2/js/select2.min.js')}}"></script>
    @endsection

@endsection