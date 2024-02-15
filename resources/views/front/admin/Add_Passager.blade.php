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
                        <h1 class="page-title">Profile Settings</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Profile Settings</li>
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
                <div class="col-lg-3 col-md-4 col-12">
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
                                <li><a href="{{ route('dashboard_admin') }}"><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                <li><a class="active" href="{{ route('form_add_passeger') }}"><i class="lni lni-pencil-alt"></i>
                                    Add passager
                                </a></li>
                              
                            </ul>
                            <div class="button">
                                <a class="btn" href="javascript:void(0)">Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Start Dashboard Sidebar -->
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <!-- Start Profile Settings Area -->
                      
                        <div class="dashboard-block mt-0 profile-settings-block">
                            <h3 class="block-title">Add passager</h3>
                            <div class="inner-block">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form class="profile-setting-form" action="{{ route('store_register_passager') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>First Name*</label>
                                                <input  type="text" placeholder="Steve" name="name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                   
                                     
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Email Address*</label>
                                                <input name="email" value="{{ old('email') }}" type="email" placeholder="username@gmail.com">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group upload-image">
                                                <label>Profile Image*</label>
                                                <input  type="file" placeholder="Upload Image" name="image" value="{{ old('image') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="password" value="{{ old('password') }}">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>password_confirmation</label> <input class="form-control" placeholder="Enter your password" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"  autocomplete="new-password">
                                            </div>
                                           <div class="col-lg-6 col-12 mb-4">
                                            <select class="form-select" name="role" aria-label="Default select example">
                                                <option selected value="Passager">Passager</option>
                                              </select>
                                           </div>
                                        <div class="col-12">
                                            <div class="form-group button mb-0">
                                                <button type="submit" class="btn ">Add passager
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </form>
                        <!-- End Profile Settings Area -->
                    
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