@extends('front.layout.master');
@section('title')
    Profile
@endsection
@section('style')

@endsection


@section('content')
    
     <!-- Start Breadcrumbs -->
     <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">drivers</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>drivers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Dashboard Section -->
    <section class="dashboard section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12">
                    <!-- Start Dashboard Sidebar -->
                    <div class="dashboard-sidebar">
                        <div class="user-image">
                            <img src="{{ asset('images/' . auth()->user()->image) }}" alt="#">
                            <h3>{{ auth()->user()->name }}
                                <span><a href="javascript:void(0)">{{ Str::limit(auth()->user()->email, 20) }}</a></span>

                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                              
                                <li><a class="active" href="{{ route('dashboard_admin') }}"><i class="lni lni-dashboard"></i>
                                    Dashboard</a></li>
                            <li><a href="{{ route('form_add_passeger') }}"><i class="lni lni-pencil-alt"></i>Add passager
                            </a>
                            </li>
                            {{-- <li><a class="active" href="{{ route('reserv_passeger') }}"><i class="lni lni-bolt-alt"></i> drivers</a>
                            </li> --}}
                            
                            </ul>
                            <div class="button">
                                <a class="btn" href="javascript:void(0)">Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Start Dashboard Sidebar -->
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">drivers</h3>
                      
                            <!-- Start Items Area -->
                            <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                                <form action="{{ route('search_forrm_passeger') }}" method="post">
                                    @csrf
                                <div class="row">
                                 <input type="text" name="user_id" value="{{ $id }}" style="display: none">
                                  
                                 
                                    <div class="col-lg-3 col-md-3 col-12 p-0">
                                        <div class="search-input">
                                            <label for="location"><i class="lni lni-map-marker theme-color"></i></label>
                                            <select class="input_icone" name="start_city" id="location">
                                                @foreach ($citys->cities as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12 p-0">
                                        <div class="search-input">
                                            <label for="location"><i class="lni lni-map-marker theme-color"></i></label>
                                            <select class="input_icone" name="end_city" id="location">
                                                @foreach ($citys->cities as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12 p-0">
                                        <div class="search-btn button">
                                            <button type="submit" class="btn"><i class="lni lni-search-alt"></i> Search</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                        
                            <!-- End Items Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->

    <!-- Start Newsletter Area -->
    <div class="newsletter section">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="title">
                            <i class="lni lni-alarm"></i>
                            <h2>Newsletter</h2>
                            <p>We don't send spam so don't worry.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form">
                            <form action="#" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe<span class="dir-part"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Newsletter Area -->



    @endsection

    @section('script')
    
    @endsection