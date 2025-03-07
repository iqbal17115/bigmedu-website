@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<style>
    /*! CSS Used from: http://localhost/bigm/public/backend/css/adminlte.css */
*,*::before,*::after{box-sizing:border-box;}
p{margin-top:0;margin-bottom:1rem;}
a{color:#007bff;text-decoration:none;background-color:transparent;}
a:hover{color:#0056b3;text-decoration:none;}
label{display:inline-block;margin-bottom:0.5rem;}
button{border-radius:0;}
button:focus{outline:1px dotted;outline:5px auto -webkit-focus-ring-color;}
input,button{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
button,input{overflow:visible;}
button{text-transform:none;}
button,[type="submit"]{-webkit-appearance:button;}
button::-moz-focus-inner,[type="submit"]::-moz-focus-inner{padding:0;border-style:none;}
input[type="checkbox"]{box-sizing:border-box;padding:0;}
.row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-7.5px;margin-left:-7.5px;}
.col-8,.col-12{position:relative;width:100%;padding-right:7.5px;padding-left:7.5px;}
.col-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%;}
.col-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%;}
.form-control{display:block;width:100%;height:calc(2.25rem + 2px);padding:0.375rem 0.75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#495057;background-color:#ffffff;background-clip:padding-box;border:1px solid #ced4da;border-radius:0.25rem;box-shadow:inset 0 0 0 rgba(0, 0, 0, 0);transition:border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}
@media (prefers-reduced-motion: reduce){
.form-control{transition:none;}
}
.form-control::-ms-expand{background-color:transparent;border:0;}
.form-control:focus{color:#495057;background-color:#ffffff;border-color:#80bdff;outline:0;box-shadow:inset 0 0 0 rgba(0, 0, 0, 0), none;}
.form-control::-webkit-input-placeholder{color:#6c757d;opacity:1;}
.form-control::-moz-placeholder{color:#6c757d;opacity:1;}
.form-control:-ms-input-placeholder{color:#6c757d;opacity:1;}
.form-control::-ms-input-placeholder{color:#6c757d;opacity:1;}
.form-control::placeholder{color:#6c757d;opacity:1;}
.form-control:disabled{background-color:#e9ecef;opacity:1;}
.form-group{margin-bottom:1rem;}
.btn{display:inline-block;font-weight:400;color:#212529;text-align:center;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;transition:color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}
@media (prefers-reduced-motion: reduce){
.btn{transition:none;}
}
.btn:hover{color:#212529;text-decoration:none;}
.btn:focus{outline:0;box-shadow:none;}
.btn:disabled{opacity:0.65;box-shadow:none;}
.btn-info{color:#ffffff;background-color:#17a2b8;border-color:#17a2b8;box-shadow:none;}
.btn-info:hover{color:#ffffff;background-color:#138496;border-color:#117a8b;}
.btn-info:focus{box-shadow:none, 0 0 0 0 rgba(58, 176, 195, 0.5);}
.btn-info:disabled{color:#ffffff;background-color:#17a2b8;border-color:#17a2b8;}
.btn-block{display:block;width:100%;}
.input-group{position:relative;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-align:stretch;align-items:stretch;width:100%;}
.input-group > .form-control{position:relative;-ms-flex:1 1 auto;flex:1 1 auto;width:1%;margin-bottom:0;}
.input-group > .form-control:focus{z-index:3;}
.input-group > .form-control:not(:last-child){border-top-right-radius:0;border-bottom-right-radius:0;}
.input-group-append{display:-ms-flexbox;display:flex;}
.input-group-append{margin-left:-1px;}
.input-group-text{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;padding:0.375rem 0.75rem;margin-bottom:0;font-size:1rem;font-weight:400;line-height:1.5;color:#495057;text-align:center;white-space:nowrap;background-color:#e9ecef;border:1px solid #ced4da;border-radius:0.25rem;}
.card{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#ffffff;background-clip:border-box;border:0 solid rgba(0, 0, 0, 0.125);border-radius:0.25rem;}
.card-body{-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem;}
.mb-1{margin-bottom:0.25rem!important;}
.mb-3,.card{margin-bottom:1rem!important;}
@media print{
*,*::before,*::after{text-shadow:none!important;box-shadow:none!important;}
a:not(.btn){text-decoration:underline;}
p{orphans:3;widows:3;}
}
label:not(.form-check-label):not(.custom-file-label){font-weight:700;}
.card{box-shadow:0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);}
.card-body::after{display:block;clear:both;content:"";}
.login-card-body{background:#ffffff;border-top:0;color:#666;padding:20px;}
.login-card-body .input-group .form-control{border-right:0;}
.login-card-body .input-group .form-control:focus{box-shadow:none;}
.login-card-body .input-group .input-group-text{background-color:transparent;border-bottom-right-radius:0.25rem!important;border-left:0;border-top-right-radius:0.25rem!important;color:#777;transition:border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}
.login-box-msg{margin:0;padding:0 20px 20px;text-align:center;}
.icheck-primary > input:first-child:checked + label::before{background-color:#007bff;border-color:#007bff;}
</style>

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
    @media (max-width: 576px)
    {
        #teacher, .container .card {
            margin-top: 20px;
            width: 90% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }
    }
</style>

<section id="teacher" style="@if(@$fmenu) padding-top: 0px; @else padding-top: 75px; @endif">
    <div class="container">
        <div class="card" style="width: 60%; margin-left: auto; margin-right: auto;">
            <div class="card-body login-card-body">
                {{-- @dd(Session::get('info')) --}}
                <p class="login-box-msg">Blog User Register</p>
          
                <form action="" method="post">
                  @csrf
                  <div class="form-group @error('name') has-error @enderror">
                      <div class="input-group mb-3">
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name')}}">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
                  <div class="form-group @error('email') has-error @enderror">
                      <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
                  <div class="form-group @error('password') has-error @enderror">
                      <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
                  <div class="form-group @error('password_confirmation') has-error @enderror">
                      <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        @error('password_confirmation')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
                  {{-- <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                          Remember Me
                        </label>
                      </div>
                    </div>          
                  </div> --}}
                  <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                      <button type="submit" class="btn btn-block" style="background: #002D68;color: white;margin-top: 5px;">Register</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
                <!-- /.social-auth-links -->
                {{-- <div class="social-auth-links text-center mb-3">
                  <p>- OR -</p>
                  <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                  </a>
                </div> --}}
                <!-- /.social-auth-links -->
          
          
                <p class="mb-1 mt-1">
                  <a href="{{route('blog_user.login')}}"><i>Go to Login Page</i></a>
                </p>      
          
              </div>
        </div>
    </div>
</section>

@include('frontend.layouts.footer')
@endsection