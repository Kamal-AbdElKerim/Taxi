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
                        <h1 class="page-title">My Reserve</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>My Reserve</li>
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
                            <img src="assets/images/dashboard/user-image.jpg" alt="#">
                            <h3>Steve Aldridge
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a href="dashboard.html"><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                <li><a href="profile-settings.html"><i class="lni lni-pencil-alt"></i> Edit Profile</a>
                                </li>
                                <li><a class="active" href="my-items.html"><i class="lni lni-bolt-alt"></i> My Reserve</a>
                                </li>
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
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">My Reserve</h3>
                            <nav class="list-nav">
                                <ul>
                                    <li class="active"><a href="javascript:void(0)">All Ads <span>42</span></a></li>
                                    <li><a href="javascript:void(0)">Published <span>88</span></a></li>
                                    <li><a href="javascript:void(0)">Featured <span>12</span></a></li>
                                    <li><a href="javascript:void(0)">Sold <span>02</span></a></li>
                                    <li><a href="javascript:void(0)">Active <span>45</span></a></li>
                                    <li><a href="javascript:void(0)">Expired <span>55</span></a></li>
                                </ul>
                            </nav>
                            <!-- Start Items Area -->
                            <div class="my-items">
                                <!-- Start Item List Title -->
                                <div class="item-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <p>Job Title</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Category</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Condition</p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12 align-right">
                                            <p>Action</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End List Title -->
                                @foreach ($reservation as $item)
                                    
                              
                                <!-- Start Single List -->
                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <div class="item-image">
                                                <img src="https://images.unsplash.com/photo-1556122071-e404eaedb77f?q=80&w=2034&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)">driver :{{ $item->name }}</a></h3>
                                                    <span class="price">{{ $item->date }}</span>
                                                    <span class="price">numéro de réservation : {{ $item->reservations_id }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>{{ $item->start_city }}</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>{{ $item->end_city }}</p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12 align-right">
                                            <ul class="action-btn">
                                                @if ($item->start_time === null)
                                                <li><a href="{{ route('delete_reserv',$item->horaire_id ) }}"><i class="lni lni-trash"></i></a></li>
                                                @elseif($item->end_time !== null)
                                                @if ($item->reting == 0)
                                                <form action="{{ route('add_rating',$item->horaire_id) }}" method="post">
                                                    @csrf
                                                <div class="" id="f_star">
                                                    <input class="form-control" type="text" value="{{ $item->driver_id }}" name="driver_id" placeholder="" style="display: none">
                                                    <input class="form-control" type="text" value="{{ $item->reservations_id }}" name="reservations_id" placeholder="" style="display: none">
                                                    <textarea name="comment" placeholder="add comment"  cols="25" rows="2"></textarea>
                                                    <span onclick="gfg(1)" class="star">★</span>
                                                    <span onclick="gfg(2)" class="star">★</span>
                                                    <span onclick="gfg(3)" class="star">★</span>
                                                    <span onclick="gfg(4)" class="star">★</span>
                                                    <span onclick="gfg(5)" class="star">★</span>
                                                 <div  id="output"></div>
                                                 <button type="submit"  class="btn btn-primary" >done</button>
                                                </div> 
                                            </form>
                                            @else
                                            <p class=" text-success ">done</p>
                                            @endif
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List -->
                                @endforeach
                                <!-- Pagination -->
                                <div class="pagination left">
                                    <ul class="pagination-list">
                                        <li><a href="javascript:void(0)">1</a></li>
                                        <li class="active"><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">4</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                                <!--/ End Pagination -->
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
        <script>
            let stars = 
    document.getElementsByClassName("star");
let output = 
    document.getElementById("output");
            function gfg(n) {
    remove();
    for (let i = 0; i < n; i++) {
        if (n == 1) cls = "one";
        else if (n == 2) cls = "two";
        else if (n == 3) cls = "three";
        else if (n == 4) cls = "four";
        else if (n == 5) cls = "five";
        stars[i].className = "star " + cls;
    }
    output.innerHTML = `<input type="text" id="num" name="rating"  value="${n}" style="display: none">`;
    console.log(n)
}
 
// To remove the pre-applied styling
function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
    }
}
        </script>
    @endsection