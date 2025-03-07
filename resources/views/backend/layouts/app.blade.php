<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BIGM | Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('public/backend/plugins/summernote/summernote-bs4.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('public/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/sweetalert2/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/plugins/jstree/style.css')}}">
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <style type="text/css">
    .nav-tabs .nav-item {
      margin-bottom: 0px;
    }
    input[type="file"]{
      padding: 0.175rem 0.75rem;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
      background-color: #17a2b8 !important;
      border-color: #17a2b8 !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
      color: #000 !important;
    }
    .bg-gradient-success{
      background: #17a2b8 !important;
      border-color: #17a2b8 !important;
    }
    .error{
      color: red;
    }
  </style>
  <script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      @include('backend.layouts.navbar')
    </nav>
    @include('backend.layouts.sidebar')
    <div class="content-wrapper">
      @yield('content')
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; {{date('Y')}} <a target="_blank" href="http://www.nanoit.biz">Nano Information Technology</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>
  </div>
  <script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('public/backend/js/adminlte.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
  <script src="{{asset('public/backend/js/handlebars-v4.0.12.js')}}"></script>
  <script src="{{asset('public/backend/js/demo.js')}}"></script>
  <script src="{{ asset('public/backend') }}/plugins/moment/moment.min.js"></script>
  <script src="{{ asset('public/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="{{ asset('public/backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  {{-- <script src="{{asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
  <script src="{{asset('public/backend/plugins/select2/js/select2.min.js')}}"></script>
  <script src="{{asset('public/backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{asset('public/backend/plugins/jstree/jstree.js')}}"></script>
  <script src="{{ asset('public/backend/js/validate.min.js') }}"></script>
  <script src="{{ asset('public/backend/js/additional-methods.js') }}"></script>
  <script src="{{asset('public/backend/plugins/toastr/toastr.min.js')}}"></script>
  <script src="{{asset('public/backend/js/notify.js')}}"></script>
  <script src="{{asset('public/backend/js/nestable.js')}}"></script>

  <script src="{{ asset('public/backend/ckeditor/ckeditor/ckeditor.js')}}"></script>
  <script src="{{ asset('public/backend/ckeditor/ckfinder/ckfinder.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      var ck = CKEDITOR.replaceAll('textarea');
      CKFinder.setupCKEditor( ck, '/ckfinder/' );
    })
  </script>

<script type="text/javascript">
  $(function() {
    $('.singledatepicker').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      autoUpdateInput: false,
            // drops: "up",
            autoApply:true,
            locale: {
              format: 'DD-MM-YYYY',
              daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
              firstDay: 0
            },
            minDate: '01/01/1930',
          },
          function(start) {
            this.element.val(start.format('DD-MM-YYYY'));
            this.element.parent().parent().removeClass('has-error');
          },
          function(chosen_date) {
            this.element.val(chosen_date.format('DD-MM-YYYY'));
          });

    $('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
    });
  });
</script>
<script>
  $(function () {
    $('.select2').select2();
      // $('.textarea').summernote({
      //    height: 150
      // });
    // Summernote
    // $('.textarea').summernote({
    //   toolbar: [
    //     // [groupName, [list of button]]
    //     ['style', ['bold', 'italic', 'underline', 'clear']],
    //     ['font', ['strikethrough', 'superscript', 'subscript','fontname']],
    //     ['fontsize', ['fontsize']],
    //     ['color', ['color']],
    //     ['para', ['ul', 'ol', 'paragraph']],
    //     ['height', ['height']]
    //     ]
    //   });
      //Toastr notification settings
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }      
    });

  $('#dataTable').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
  });

  $(document).on('click','.delete', function(){
    var btn = this;
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        var url = $(this).data('route');
        var id  = $(this).data('id');

        $.get(url, {id:id}, function(result){
          Swal.fire(
            'Deleted!',
            'Record has been deleted.',
            'success'
            );
          $(btn).closest('tr').fadeOut(1500);
        });
      }     

    })
  });     

</script>

<script>
  $(document).ready(function () {
    $(document).on('click','.statuschange',function(){
      var id = ($(this).data("id"));
      var tabName = $(this).data("tabname");
      var _token=$(this).data("token");
      if ($("#status" + id).val() == '1') {
        var status = 0;
      } else {
        var status = 1;
      }

      $.ajax({
        url:"{{route('table.status.change')}}",
        type: 'post',
        data: {'id':id,'status': status,'tablename':tabName,'_token':_token},
        success: function (data) {
          $('.notifyjs-corner').html('');
          if(data == '1'){
            $.notify("Active", {globalPosition: 'top right',className: 'success'});
          }else{
            $.notify("Inactive", {globalPosition: 'top right',className: 'error'});
          }
          $('#status' + id).val(status);
        }
      });
    });
  });
</script>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card-body" style="padding: 0;">
        <div id="accordion" role="tablist">
          <div class="card" style="margin-bottom: 0px !important;">
            <div class="card-header" role="tab" id="headingHomeLink" style="padding: 0 0;">
              <h5 class="mb-0">
                <a style="display: block;padding: .75rem 1.25rem;" class="collapsed plusminuscollapse" data-toggle="collapse" href="#collapseHomeLink" aria-expanded="false" aria-controls="collapseHomeLink">
                  Home list link<i class="fa fa-plus plusminusbutton" style="float:right"></i>
                </a>
              </h5>
            </div>
            <div id="collapseHomeLink" class="collapse" role="tabpanel" aria-labelledby="headingHomeLink" data-parent="#accordion">
              <table class="table table-hover" style="margin-bottom: 0;">
                <tbody>
                  @php
                  $homelinks = App\Model\HomeLink::where('status','1')->get();
                  @endphp
                  @foreach($homelinks as $homelink)
                  <tr>
                    <td class="linkdata" data-url_type="1" data-id="{{$homelink->url_link}}" style="cursor: pointer;background: #584200;color:white;font-weight: bold;">{{$homelink->name}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-header" role="tab" id="headingPostList" style="padding: 0 0;">
              <h5 class="mb-0">
                <a style="display: block;padding: .75rem 1.25rem;" class="collapsed plusminuscollapse" data-toggle="collapse" href="#collapsePostList" aria-expanded="false" aria-controls="collapsePostList">
                  Post List<i class="fa fa-plus plusminusbutton" style="float:right"></i>
                </a>
              </h5>
            </div>
            <div id="collapsePostList" class="collapse" role="tabpanel" aria-labelledby="headingPostList" data-parent="#accordion">
              <table class="table table-hover" style="margin-bottom: 0;">
                <tbody>
                  @php
                  $menuposts = App\Model\MenuPost::where('status','1')->get();
                  @endphp
                  @foreach($menuposts as $menupost)
                  <tr>
                    <td class="linkdata" data-url_type="2" data-id="{{str_slug($menupost->title,'-')}}" style="cursor: pointer;background: #584200;color:white;font-weight: bold;">{{$menupost->title}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-header" role="tab" id="headingExternalList" style="padding: 0 0;">
              <h5 class="mb-0">
                <a style="display: block;padding: .75rem 1.25rem;" class="collapsed plusminuscollapse" data-toggle="collapse" href="#collapseExternalList" aria-expanded="false" aria-controls="collapseExternalList">
                  Others List<i class="fa fa-plus plusminusbutton" style="float:right"></i>
                </a>
              </h5>
            </div>
            <div id="collapseExternalList" class="collapse" role="tabpanel" aria-labelledby="headingExternalList" data-parent="#accordion">
              <table class="table table-hover" style="margin-bottom: 0;">
                <tbody>
                  <li style="background: #584200;color:white; padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6;list-style: none;font-weight: bold;">
                    <label for="">External Link</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control external_link" placeholder="External link">
                      <input type="hidden" class="external_link_url_type" name="external_link_url_type" value="3">
                      <div class="input-group-append external_link_data">
                        <span class="input-group-text" style="background: #2682f5;color: white; cursor: pointer;">Click</span>
                      </div>
                    </div>
                  </li>
                  <li style="background: #584200;color:white; padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6;list-style: none;font-weight: bold;">
                    <label>PDF/Doc Link</label>
                    <div class="input-group mb-3 filediv">
                      <input type="text" class="file_open_input_field form-control" name="file_open_input_field" placeholder="Choose image" readonly style="cursor: pointer;">   
                      <input type="file" name="file" class="file_trigger"  accept="application/pdf" style="display: none;">
                      <input type="hidden" name="fileurl" class="fileurl">
                      <input type="hidden" class="file_url_type" name="file_url_type" value="4">
                      <div class="input-group-append pdf_link_data">
                        <span class="input-group-text" style="background: #2682f5;color: white; cursor: pointer;">Click</span>
                      </div>
                    </div> 
                  </li>
                </tbody>
              </table>
            </div>
            <li class="linkdata" data-url_type="5" data-id="#" style="background: #2682f5;color: white;cursor: pointer;padding: .75rem;vertical-align: top;border-top: 1px solid #dee2e6;list-style: none;font-weight: bold;">No Link</li>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $( ".linkdata" ).click(function() {
    var id=$(this).attr('data-id');
    var url_type=$(this).attr('data-url_type');
    $(".url_link").val(id);
    $(".url_link_type").val(url_type);
    $('#myModal').modal('toggle');
  });
</script>
<script type="text/javascript">
  $( ".external_link_data" ).click(function() {
    var id=$('.external_link').val();
    var url_type=$('.external_link_url_type').val();
    if(validURL(id)){
      $(".url_link").val(id);
      $(".url_link_type").val(url_type);
      $('#myModal').modal('toggle');
    }else{
      $('.notifyjs-corner').html('');
      $(function () {
        $.notify("External Link URL is not correct", {globalPosition: 'top right',className: 'error'});
      });
    }
  });
</script>
<script type="text/javascript">
  function validURL(str) {
    var pattern = new RegExp('(?:(?:https?|ftp|file):\/\/|www\.|ftp\.)(?:\([-A-Z0-9+&@#\/%=~_|$?!:,.]*\)|[-A-Z0-9+&@#\/%=~_|$?!:,.])*(?:\([-A-Z0-9+&@#\/%=~_|$?!:,.]*\)|[A-Z0-9+&@#\/%=~_|$])','i');
    return !!pattern.test(str);
  }
</script>

<script type="text/javascript">
  $('.file_open_input_field').click(function(){ 
    $(this).parents('.filediv').find('.file_trigger').trigger('click'); 
  });
</script>
<script type="text/javascript">
  $(document).on('change','.file_trigger',function(e){
    var btnThis = $(this);
    var img = e.target.files[0];
    var filename = $(btnThis).val().split("\\").pop();
    if(img){
     var reader = new FileReader();
     reader.readAsDataURL(img); 
     reader.onloadend = function() {
       var base64data = reader.result;
       $(btnThis).parents('.filediv').find('.file_open_input_field').val(filename);
       $('.fileurl').attr('value',base64data);
     }
   }else{        
    $(btnThis).parents('.filediv').find('.file_open_input_field').val('');
    $('.fileurl').attr('value','');
  }
});
</script>

<script type="text/javascript">
  $( ".pdf_link_data" ).click(function() {
    var file_open_input_field=$('.file_open_input_field').val();
    var fileurl=$('.fileurl').val();
    var file_url_type=$('.file_url_type').val();
    $(".url_link").val(file_open_input_field);
    $(".url_link_file").val(fileurl);
    $(".url_link_type").val(file_url_type);
    $('#myModal').modal('toggle');
  });
</script>

<script type="text/javascript">
  $(document).on('click','.plusminuscollapse',function(){
    var hasclasss = $(this).hasClass('collapsed');
    if(hasclasss==true){
      $(this).closest('h5').find('.plusminusbutton').removeClass('fa-minus').addClass('fa-plus');
      $('.plusminuscollapse').not(this).closest('h5').find('.plusminusbutton').removeClass('fa-minus').addClass('fa-plus');
    }else{
      $(this).closest('h5').find('.plusminusbutton').removeClass('fa-plus').addClass('fa-minus');
      $('.plusminuscollapse').not(this).closest('h5').find('.plusminusbutton').removeClass('fa-minus').addClass('fa-plus');
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.checkboxesTree').jstree({
      'core' : {
        'themes' : {
          'responsive': false
        }
      },
      'types' : {
        'default' : {
          'icon' : 'fa fa-file-text-o'
        },
        'file' : {
          'icon' : 'fa fa-file-text'
        }
      },
      'plugins' : ['types', 'checkbox']
    });
  });
</script>
@yield('script')
@include('backend.layouts.notification')
</body>
</html>

