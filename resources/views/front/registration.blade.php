@extends('front.layout.master');
@section('title')
    Profile
@endsection
@section('style')
    {{-- here style css --}}
@endsection


@section('content')
    


    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- start Registration section -->
    <section  class="login registration section">
        <div class="container">
            <div class="row">
                <div  class="col-lg-6  m-auto  col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Registration</h4>
                        <form action="{{ route('store_register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="socila-login">
                                <ul>
                                    <li><a href="javascript:void(0)" class="facebook"><i class="lni lni-facebook-original"></i>Import
                                            From Facebook</a></li>
                                    <li><a href="javascript:void(0)" class="google"><i class="lni lni-google"></i>Import From Google
                                            Plus</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="alt-option">
                                <span>Or</span>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Firstname &amp; Lastname</label> <input class="form-control" placeholder="Enter your firstname and lastname" type="text" name="name" value="{{ old('name') }}">

                            </div>
                            <div class="form-group">
                                <label>Email</label> <input class="form-control" placeholder="Enter your email" type="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group mb-5">
                                <label>password_confirmation</label> <input class="form-control" placeholder="Enter your password" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"  autocomplete="new-password">
                                </div>
                           
                            <div class=" mb-4">
                                <label>image</label> <input class="form-control"  type="file" name="image" value="{{ old('image') }}"  >
                                </div>
                                <select class="form-select" name="role" aria-label="Default select example">
                                    <option selected value="Passager">Passager</option>
                                    <option value="driver">Driver</option>
                                  </select>
                            </div>

                            <div class="button">
                                <button type="submit" class="btn">Registration</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ route('login') }}"> Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Registration section -->

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