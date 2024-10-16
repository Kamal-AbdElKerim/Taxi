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
                            <img src="front/assets/images/dashboard/user-image.jpg" alt="#">
                            <h3>Steve Aldridge
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a class="active" href="dashboard.html"><i class="lni lni-dashboard"></i>
                                        Dashboard</a></li>
                                <li><a href="profile-settings.html"><i class="lni lni-pencil-alt"></i> Edit Profile</a>
                                </li>
                                <li><a href="my-items.html"><i class="lni lni-bolt-alt"></i> My Ads</a></li>
                                <li><a href="favourite-items.html"><i class="lni lni-heart"></i> Favourite ads</a></li>
                                <li><a href="post-item.html"><i class="lni lni-circle-plus"></i> Post An Ad</a></li>
                                <li><a href="bookmarked-items.html"><i class="lni lni-bookmark"></i> Bookmarked</a></li>
                                <li><a href="messages.html"><i class="lni lni-envelope"></i> Messages</a></li>
                                <li><a href="delete-account.html"><i class="lni lni-trash"></i> Close account</a></li>
                                <li><a href="invoice.html"><i class="lni lni-printer"></i> Invoice</a></li>
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
                                            340
                                            <span>Total Ad Posted</span>
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
                                            23
                                            <span>Featured Ads </span>
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
                                            45
                                            <span>Expired Ads </span>
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
                                    <h3 class="block-title">My Activity Log</h3>
                                    <ul>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">Your Profile Updated!</a>
                                            <span class="time">12 Minutes Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">You change your password</a>
                                            <span class="time">59 Minutes Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">Your ads approved!</a>
                                            <span class="time">5 Hours Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">You submit a new ads</a>
                                            <span class="time">8 hours Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-alarm"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">You subscribe as a pro user!</a>
                                            <span class="time">1 day Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Activity Log -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <!-- Start Recent Items -->
                                <div class="recent-items dashboard-block">
                                    <h3 class="block-title">Recent Ads</h3>
                                    <ul>
                                        <li>
                                            <div class="image">
                                                <a href="javascript:void(0)"><img src="front/assets/images/dashboard/recent-items/item1.jpg" alt="#"></a>
                                            </div>
                                            <a href="javascript:void(0)" class="title">iPhone 11 Pro Max</a>
                                            <span class="time">12 Minutes Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="javascript:void(0)"><img src="front/assets/images/dashboard/recent-items/item2.jpg" alt="#"></a>
                                            </div>
                                            <a href="javascript:void(0)" class="title">Polaris 600 Assault 144</a>
                                            <span class="time">5 days Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="javascript:void(0)"><img src="front/assets/images/dashboard/recent-items/item3.jpg" alt="#"></a>
                                            </div>
                                            <a href="javascript:void(0)" class="title">Brand New Bagpack</a>
                                            <span class="time">1 week Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <a href="javascript:void(0)"><img src="front/assets/images/dashboard/recent-items/item4.jpg" alt="#"></a>
                                            </div>
                                            <a href="javascript:void(0)" class="title">Honda Civic VTi 2023</a>
                                            <span class="time">3 week Ago</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Recent Items -->
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