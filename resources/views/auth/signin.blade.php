@extends('Dashboard.layouts.master2')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
@include('Dashboard.layouts.messages_alert')

		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<ul class="nav">
											<li class="">
												<div class="dropdown  nav-itemd-none d-md-flex">
													@if (App::getLocale() =='ar')
													<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
														<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/ma-flag.svg')}}" alt="img"></span>
														<div class="my-auto">
															<strong class="mr-2 ml-2 my-auto">العربية</strong>
														</div>
													</a>
				
													@else
													<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
														<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/us_flag.jpg')}}" alt="img"></span>
														<div class="my-auto">
															<strong class="mr-2 ml-2 my-auto">English</strong>
														</div>
													</a>
													@endif
												
				
													<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
														@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
											
													<a class="dropdown-item d-flex " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
														@if ($properties['native'] === "العربية")
														<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/ma-flag.svg')}}" alt="img"></span>
				
														@else
														<span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/us_flag.jpg')}}" alt="img"></span>
				
														@endif
														<div class="my-auto">
															<strong class="mr-2 ml-2 my-auto">{{ $properties['native'] }}</strong>
														</div>	
													</a>
											
														@endforeach
													
													</div>
												</div>
											</li>
										</ul>
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{ trans("Dashboard/login_trans.Welcome") }}</h2>
												<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
												<form action="{{ route('login') }}" method="post" >
													@csrf
													<div class="form-group">
														<label>Email</label> <input class="form-control" placeholder="Enter your email" type="text" name="email" value="{{ old('email') }}">
														{{-- <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger " /> --}}

													</div>
													<div class="form-group">
														<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="password">
													</div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button  class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="">Forgot password?</a></p>
													<p>Don't have an account? <a href="{{ route('register') }}">Create an Account</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
  <!--Internal  Notify js -->
  <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
  <script src="{{URL::asset('Dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection