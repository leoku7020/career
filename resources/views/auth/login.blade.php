<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
	</script>
	<!--end::Web font -->
    <!--begin::Base Styles -->
    <!-- Styles -->
    <link href="{{ asset('vendor/metronic5.2/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/metronic5.2/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('vendor/metronic5.2/images/favicon.ico')}}" />
    <link rel='shortcut icon' type='image/x-icon' href='{{asset('vendor/metronic5.2/images/favicon.ico')}}' />
	<!--end::Base Styles -->

</head>
<style>
	.m-login.m-login--2.m-login-2--skin-1 .m-login__container .m-login__form .form-control{
		color:#777777 !important;
		background: white;
	}
	.m-login.m-login--2.m-login-2--skin-1 .m-login__container .m-login__form .form-control::placeholder{
		color:#777777;
	}
	.m-checkbox.m-checkbox--light>span{
	 	border: 1px solid #BD9060;
	}
	.m-checkbox.m-checkbox--light>span:after{
		border: 1px solid #BD9060;
	}
	.m-checkbox>span:after{
		border: 1px solid #BD9060;
	}
</style>
<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	@if ($message = Session::get('error'))
	<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-danger alert-dismissible m--margin-bottom-30" role="alert">
	    <div class="m-alert__icon">
	        <i class="flaticon-exclamation m--font-brand"></i>
	    </div>
	    <div class="m-alert__text">
	        <strong>@lang('admin.error')!</strong><br><br>
	        <ul>
	            <li>{{ $message }}</li>
	        </ul>
	    </div>
	    <div class="m-alert__close">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	    </div>
	</div>
	@endif
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url({{asset('vendor/metronic5.2/images/background.jpg')}});">
			<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
				<div class="m-login__container">
					<div class="m-login__logo">
						<a href="#">
							<img src="{{asset('vendor/metronic5.2/images/logo_loginpage.png')}}">
						</a>
					</div>
					<div class="m-login__signin">
						<div class="m-login__head">
							{{-- <h3 class="m-login__title">
								@lang('messages.Sign In')
							</h3> --}}
						</div>
                        @if ($errors->any())
                            <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
								<div class="m-alert__icon">
									<i class="flaticon-exclamation-1"></i>
									<span></span>
								</div>
								<div class="m-alert__text">
									<strong>
										錯誤
									</strong>
									@if($errors->email == "These credentials do not match our records.")
										帳號或密碼錯誤
									@else
										{{ $errors->first() }}
									@endif
								</div>
								<div class="m-alert__close">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
                        @endif
						<form class="m-login__form m-form" action="{{url('login')}}" method="POST">
                            {{ csrf_field() }}
							<div class="form-group m-form__group">
								<input class="form-control m-input m-input--air m-input--pill"  type="text" placeholder="@lang('messages.Email')" name="email" autocomplete="off" value="">
							</div>
							<div class="form-group m-form__group">
								<input class="form-control m-input m-input--air m-input--pill" type="password" placeholder="@lang('messages.Password')" name="password" value="">
							</div>
							<div class="row m-login__form-sub">
								<div class="col m--align-left m-login__form-left">
									{{-- <label class="m-checkbox  m-checkbox--light" style="color:#777777">
										<input type="checkbox" name="remember">
										@lang('messages.Remember me')
										<span style="border: 1px solid #BD9060;"></span>
									</label> --}}
									<label class="m-checkbox  m-checkbox--light pull-right" style="color:#777777">
										<a href="{{route('password.request')}}" id="m_login_forget_password" class="m--font-primary">
    										@lang('admin.Forget Password')
    									</a>
									</label>
								</div>
                                @if(env('ACTIVE_RECAPTCHA'))
                                    {{-- 是否啟用驗證碼登入 --}}
    								<div class="col m--align-right m-login__form-right">
    									<a href="javascript:;" id="m_login_forget_password" class="m-link">
    										{{ $captcha->display() }}
    									</a>
    								</div>
                                @endif
							</div>
							<div class="m-login__form-action">
								<button id="m_login_signin_submit" class="btn btn-lg" style="background: #BD9060;border-color:none; color:white">
									@lang('messages.Sign In')
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:: Page -->
    <script src="{{ asset('vendor/metronic5.2/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic5.2/scripts.bundle.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('vendor/metronic5.2/pages/login.js') }}" type="text/javascript"></script> --}}
</body>
</html>

{{--
    @if(Auth::check())
        {{ Auth::user()->username}} 已登入，{{ HTML::link('logout', '登出') }}
    @endif

--}}
