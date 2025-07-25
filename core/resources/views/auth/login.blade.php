<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <title>CMS</title>
      <link href="{{asset('cms/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('cms/css/icons.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('cms/css/style.css')}}" rel="stylesheet" type="text/css" />
      <script src="{{asset('cms/js/modernizr.min.js')}}"></script>
   </head>
   <body>
      <div class="account-pages"></div>
      <div class="clearfix"></div>
      <div class="wrapper-page">
         <div class="text-center">
            <!--<a href="#" class="logo"><span>OUI<span> SOCIAL</span></span></a>-->
         </div>
         <div class="m-t-40 card-box">
            <div class="text-center">
               <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
            </div>
            <div class="p-20">

			<form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
			@csrf
				<div class="form-group">
					<div class="col-xs-12">
						<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
						@if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password"  required>
						@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="form-group ">
                     <div class="col-xs-12">
                        <div class="checkbox checkbox-custom">
                           <input id="checkbox-signup" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                           <label for="checkbox-signup">
								{{ __('Remember Me') }}
                           </label>
                        </div>
                     </div>
                </div>
				<div class="form-group text-center m-t-30">
					<div class="col-xs-12">
						<button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">{{ __('Login') }}</button>
					</div>
				</div>
				<!--<div class="form-group m-t-30 m-b-0">
					<div class="col-sm-12">
						<a href="{{ route('password.request') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
					</div>
				</div>-->
			</form>
            </div>
         </div>
      </div>
      <script src="{{asset('cms/js/jquery.min.js')}}"></script>
      <script src="{{asset('cms/js/popper.min.js')}}"></script>
      <script src="{{asset('cms/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('cms/js/detect.js')}}"></script>
      <script src="{{asset('cms/js/fastclick.js')}}"></script>
      <script src="{{asset('cms/js/jquery.blockUI.js')}}"></script>
      <script src="{{asset('cms/js/waves.js')}}"></script>
      <script src="{{asset('cms/js/jquery.nicescroll.js')}}"></script>
      <script src="{{asset('cms/js/jquery.slimscroll.js')}}"></script>
      <script src="{{asset('cms/js/jquery.scrollTo.min.js')}}"></script>
      <script src="{{asset('cms/js/jquery.core.js')}}"></script>
      <script src="{{asset('cms/js/jquery.app.js')}}"></script>
   </body>
</html>
