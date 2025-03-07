<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>BIGM</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('public/frontend/images/bigm_logo.jpeg') }}">
	<link href="{{asset('public/frontend/')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{asset('public/frontend/')}}/font/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="{{asset('public/frontend/')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('public/frontend/')}}/css/styles.css">
	
	<script src="{{asset('public/frontend/')}}/js/jquery-3.6.0.min.js"></script>

	<link rel="stylesheet" href="{{asset('public/backend/plugins/toastr/toastr.min.css')}}">

	@section('extra_css_files')
		@show
	
	<style>
		@media only screen and (max-width: 768px)
		{
			.row {
				--bs-gutter-x: 0;
			}
		}
	</style>

	{{-- From PGU --}}
	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}
	{{-- <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}"> --}}
	{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}
	<!-- jQuery -->
	{{-- <script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script> --}}
	<!-- Toastr -->
	{{-- <link rel="stylesheet" href="{{asset('public/backend/plugins/toastr/toastr.min.css')}}"> --}}
	{{-- End From PGU --}}
</head>
<body>
	@yield('content')
	
	<script src="{{asset('public/frontend/')}}/js/popper.min.js"></script>
	<script src="{{asset('public/frontend/')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('public/frontend/')}}/js/owl.carousel.min.js"></script>
	<script src="{{asset('public/frontend/')}}/font/fontawesome-free/js/all.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js"></script>

	
	


	{{-- From PGU --}}
	{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
	{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}
	{{-- <script src="{{asset('public/backend/js/handlebars-v4.0.12.js')}}"></script>
	<script src="{{asset('public/backend/plugins/toastr/toastr.min.js')}}"></script> --}}
	{{-- End From PGU --}}

	<script src="{{asset('public/backend/plugins/toastr/toastr.min.js')}}"></script>

	@section('extra_script_files')
		@show
	

	<script>
		$(function () {     
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
	</script>
	
	@if (session()->has('success'))                   {{-- Toastr success Notification --}}
		<script type="text/javascript">
			$(function () {
				toastr.success("","{{session()->get("success")}}");
			});
		</script>
	@endif
	
	@if (session()->has('info'))                      {{-- Toastr info Notification --}}
		<script type="text/javascript">
			$(function () {
				toastr.info("","{{session()->get("info")}}");
			});
		</script>
	@endif
	
	@if (session()->has('warning'))                  {{-- Toastr warning Notification --}}
		<script type="text/javascript">
			$(function () {
				toastr.warning("","{{session()->get("warning")}}");
			});
		</script>
	@endif  
	
	@if (session()->has('error'))                   {{-- Toastr error Notification --}}
		<script type="text/javascript">
			$(function () {
				toastr.error("","{{session()->get("error")}}");
			});
		</script>
	@endif

	<script>
		var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
		})
	</script>

	<script type="text/javascript">
		var a = 0;
		$(window).scroll(function() {
			var oTop = $('#counter').offset().top - window.innerHeight;
			if (a == 0 && $(window).scrollTop() > oTop) {
				$('.counter-value').each(function() {
					var $this = $(this),
					countTo = $this.attr('data-count');
					$({
						countNum: $this.text()
					}).animate({
						countNum: countTo
					},{
						duration: 7000,
						easing: 'swing',
						step: function() {
							$this.text(Math.floor(this.countNum));
						},
						complete: function() {
							$this.text(this.countNum);
						}
					});
				});
				a = 1;
			}
		});
		$(document).ready(function(){
			$('.owl-carousel').owlCarousel({
				loop: true,
				autoplay:true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: true,
						margin: 20
					}
				}
			})
		});
	</script>

	<script>
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		});
	</script>


</body>
</html>