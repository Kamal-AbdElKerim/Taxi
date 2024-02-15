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
                        <h1 class="page-title">Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Dashboard</li>
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
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <!-- Start Details Lists -->
                        <div class="details-lists">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list">
                                        <div class="list-icon">
                                            <i class="lni lni-checkmark-circle"></i>
                                        </div>
                                        <h3>
                                           {{ count($drivers) }}
                                            <span>Total Drivers</span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list two">
                                        <div class="list-icon">
                                            <i class="lni lni-bolt"></i>
                                        </div>
                                        <h3>
                                            {{ count($Passagers) }}

                                            <span>Total Passagers</span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list three">
                                        <div class="list-icon">
                                            <i class="lni lni-emoji-sad"></i>
                                        </div>
                                        <h3>
                                            {{ count($reservations) }}

                                            <span>Total reservations</span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                            </div>
                        </div>
                        <!-- End Details Lists -->
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <!-- Start Activity Log -->
                                <div class="activity-log dashboard-block">
                                    <h3 class="block-title">List Passagers</h3>
                                    <ul>
                                        @foreach ($Passagers as $Passager)
                                            
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">{{ $Passager->name }}</a>
                                            <span class="time">{{ $Passager->email }}</span>
                                            @if ($Passager->deleted_at === null)
                                            <span class="remove"><a href="{{ route('delete_Passager',$Passager->user_id) }}"><i class="lni lni-close"></i></a></span>
                                            <span class="restore"><a class="mt-4" href="{{ route('reserv_passeger',$Passager->user_id) }}"><i class="fa-solid fa-plus"></i></a></span>
                                            @else 
                                            <span class="restore"><a href="{{ route('restore_Passager',$Passager->user_id) }}"><i class="fa-solid fa-rotate-left"></i></a></span>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End Activity Log -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                 <!-- Start Activity Log -->
                                 <div class="activity-log dashboard-block">
                                    <h3 class="block-title">List Drivers</h3>
                                    <ul>
                                        @foreach ($drivers as $driver)
                                            
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">{{ $driver->name }}</a>
                                            <span class="time">{{ $driver->email }}</span>
                                            @if ($driver->deleted_at === null)
                                            <span class="remove"><a href="{{ route('delete_driver',$driver->user_id) }}"><i class="lni lni-close"></i></a></span>
                                            @else 
                                            <span class="restore  "><a href="{{ route('restore_driver',$driver->user_id) }}"><i class="fa-solid fa-rotate-left"></i></a></span>
                                            @endif
                                        </li>
                                        @endforeach
                                  
                                    </ul>
                                </div>
                                <!-- End Activity Log -->
                            </div>
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