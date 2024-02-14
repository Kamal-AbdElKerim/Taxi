
<!DOCTYPE html>
<html class="no-js" lang="zxx" 	@if (App::getLocale() =='ar') dir="rtl"  @endif >
    <!-- dir="rtl" -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="front/assets/images/favicon.svg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
  

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
 
  <!-- style css -->

    <!-- ========================= CSS here ========================= -->
    {{-- <link rel="stylesheet" href="{{URL::asset('front/assets/css/bootstrap.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/LineIcons.2.0.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/animate.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/glightbox.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('front/assets/css/main.css')}}" />

    @yield('style')
    <style>
        .card {
max-width: 20rem;
background: #fff;
margin: 0 1rem;
padding: 1rem;
box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
width: 100%;
border-radius: 0.5rem;
}

.star {
font-size: 5vh;
cursor: pointer;
}

.one {
color: rgb(255, 0, 0);
}

.two {
color: rgb(255, 106, 0);
}

.three {

color: rgb(149, 228, 12);

}

.four {
color: rgb(105, 187, 12);
}

.five {
color: rgb(24, 159, 14);
}


.disabled{

padding: 8px 20px ;
/* margin: 4px; */

}

</style>

</head>

<body>
   
    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="{{URL::asset('front/assets/images/logo/logo.svg')}}" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    @auth
                                        
                                 
                                    @if(auth()->user()->role !== 'driver')
                                    {{-- <li class="nav-item">
                                        <a class="active dd-menu collapsed" href="{{ route('index_searche') }}"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">{{ ' '.trans("Dashboard/main-Header_trans.Home") }}</a>
                                    </li> --}}
                                   
                                   
                                    <li class="nav-item">
                                       
                                        
                                        <a href="{{ route('index_searche') }}" aria-label="Toggle navigation">{{ ' '.trans("Dashboard/main-Header_trans.Home") }}</a>
                                    </li>
                                    <li class="nav-item">
                                       
                                        
                                        <a href="{{ route('Profile') }}" aria-label="Toggle navigation">Profile</a>
                                    </li>
                                    @endif
                                    @endauth
                                    <li class="nav-item">
                                       
                                      
                                    </li>
                                  
                                
                                </ul>
                            </div> <!-- navbar collapse -->
                            	<ul class="nav">
											<li class="">
												<div class="dropdown  nav-itemd-none d-md-flex">
													@if (App::getLocale() =='ar')
													<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
														<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/ma-flag.svg')}}" alt="img"></span>
														<div class="my-auto ">
															<strong class="mr-2  ml-2 my-auto">العربية</strong>
														</div>
													</a>
				
													@else
													<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown" aria-expanded="false">
														<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/us_flag.jpg')}}" alt="img"></span>
														<div class="my-auto">
															<strong class="mr-2 ml-2 my-auto"> English</strong>
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
                            <div class="login-button">
                                <ul>
                                    {{-- <li>
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                
                                        <a class="lni " rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            @if ($properties['native'] === "العربية")
                                            <span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/ma-flag.svg')}}" alt="img" width="50px"></span>
    
                                            @else
                                            <span class="avatar  ml-3 align-self-center bg-transparent"><img src="{{URL::asset('Dashboard/img/flags/us_flag.jpg')}}" alt="img" width="50px"></span>
    
                                            @endif
                                            <div class="my-auto">
                                                <strong class="mr-2 ml-2 my-auto">{{ $properties['native'] }}</strong>
                                            </div>	 
                                        </a>
                                
                                            @endforeach
                                        
                                    </li>  --}}
                                    @auth
                                    
                                    <li>
                                    <a href="{{ route('logout.user') }}"><i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>{{ ' '.trans("Dashboard/main-Header_trans.sign_out") }}</a>
                                </li>
                                    @endauth
                                    @guest
                                    <li>
                                        <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i>{{ ' '.trans("Dashboard/main-Header_trans.login") }}</a>
                                        
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}"><i class="fa-solid fa-user"></i> {{ ' '.trans("Dashboard/main-Header_trans.Register") }}</a>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                            {{-- <div class="button header-button">
                                <a href="post-item.html" class="btn">Post an Ad</a>
                            </div> --}}
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->


    @yield('content')

  



    
       





     


 <!-- Start Footer Area -->
 <footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer mobile-app">
                        <h3>Mobile Apps</h3>
                        <div class="app-button">
                            <a href="javascript:void(0)" class="btn">
                                <i class="lni lni-play-store"></i>
                                <span class="text">
                                    <span class="small-text">Get It On</span>
                                    Google Play
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="btn">
                                <i class="lni lni-apple"></i>
                                <span class="text">
                                    <span class="small-text">Get It On</span>
                                    App Store
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer f-link">
                        <h3>Locations</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <ul>
                                    <li><a href="javascript:void(0)">Chicago</a></li>
                                    <li><a href="javascript:void(0)">New York City</a></li>
                                    <li><a href="javascript:void(0)">San Francisco</a></li>
                                    <li><a href="javascript:void(0)">Washington</a></li>
                                    <li><a href="javascript:void(0)">Boston</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <ul>
                                    <li><a href="javascript:void(0)">Los Angeles</a></li>
                                    <li><a href="javascript:void(0)">Seattle</a></li>
                                    <li><a href="javascript:void(0)">Las Vegas</a></li>
                                    <li><a href="javascript:void(0)">San Diego</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer f-link">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">How It's Works</a></li>
                            <li><a href="javascript:void(0)">Login</a></li>
                            <li><a href="javascript:void(0)">Signup</a></li>
                            <li><a href="javascript:void(0)">Help & Support</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer f-contact">
                        <h3>Contact</h3>
                        <ul>
                            <li>23 New Design Str, Lorem Upsum 10<br> Hudson Yards, USA</li>
                            <li>Tel. +(123) 1800-567-8990 <br> Mail. support@classigrids.com</li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <ul class="footer-bottom-links">
                                <li><a href="javascript:void(0)">Terms of use</a></li>
                                <li><a href="javascript:void(0)"> Privacy Policy</a></li>
                                <li><a href="javascript:void(0)">Advanced Search</a></li>
                                <li><a href="javascript:void(0)">Site Map</a></li>
                                <li><a href="javascript:void(0)">Information</a></li>
                            </ul>
                            <p class="copyright-text">Designed and Developed by <a href="https://graygrids.com/"
                                    rel="nofollow" target="_blank">GrayGrids</a>
                            </p>
                            <ul class="footer-social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
</footer>
<!--/ End Footer Area -->

<script src="https://kit.fontawesome.com/e9ea9ee727.js" crossorigin="anonymous"></script>
<!-- JQuery min js -->
<script src="{{URL::asset('Dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- ========================= JS here ========================= -->
{{-- <script src="{{URL::asset('front/assets/js/bootstrap.min.js')}}"></script> --}}
<script src="{{URL::asset('front/assets/js/wow.min.js')}}"></script>
<script src="{{URL::asset('front/assets/js/tiny-slider.js')}}"></script>
<script src="{{URL::asset('front/assets/js/glightbox.min.js')}}"></script>
<script src="{{URL::asset('front/assets/js/count-up.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{URL::asset('front/assets/js/main.js')}}"></script>


@yield('script');

</body>

</html>