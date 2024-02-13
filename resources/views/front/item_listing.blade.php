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
                        <h1 class="page-title">Ad Listings</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Ad Listings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Items Listing List -->
    <section class="category-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="category-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>Search Ads</h3>
                            <form action="#">
                                <input type="text" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                <li>
                                    <a href="javascript:void(0)"><i class="lni lni-dinner"></i> Hotel & Travels<span>15</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="lni lni-control-panel"></i> Services <span>20</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="lni lni-bullhorn"></i> Marketing <span>55</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="lni lni-home"></i> Real Estate<span>35</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="lni lni-bolt"></i> Electronics <span>60</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="lni lni-tshirt"></i> Dress & Clothing <span>55</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="lni lni-diamond-alt"></i> Jewelry & Accessories
                                        <span>45</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                                value="10" onchange="rangePrimary.value=value">
                            <div class="range-inner">
                                <label>$</label>
                                <input type="text" id="rangePrimary" placeholder="100" />
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget condition">
                            <h3>Condition</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                <label class="form-check-label" for="flexCheckDefault1">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">
                                    New
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">
                                    Used
                                </label>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        {{-- <div class="single-widget banner">
                            <h3>Advertisement</h3>
                            <a href="javascript:void(0)">
                                <img src="assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div> --}}
                        <!-- End Single Widget -->
                    </div>
                </div>
              
                <div class="col-lg-9 col-md-8 col-12">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="category-grid-list">
                        <div class="row">
                            <div class="col-12">
                                <div class="category-grid-topbar">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <h3 class="title">Showing 1-12 of 21 ads found</h3>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link" id="nav-grid-tab" data-bs-toggle="tab"
                                                        data-bs-target="#nav-grid" type="button" role="tab"
                                                        aria-controls="nav-grid" aria-selected="false"><i
                                                            class="lni lni-grid-alt"></i></button>
                                                    <button class="nav-link active" id="nav-list-tab"
                                                        data-bs-toggle="tab" data-bs-target="#nav-list" type="button"
                                                        role="tab" aria-controls="nav-list" aria-selected="true"><i
                                                            class="lni lni-list"></i></button>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-content" id="nav-tabContent">
                                  
                                    <div class="tab-pane fade show active" id="nav-list" role="tabpanel"
                                        aria-labelledby="nav-list-tab">
                                        <div class="row">
                                            
                                            @foreach ($results as $item)
                                                
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <!-- Start Single Item -->
                                                <div class="single-item-grid">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-5 col-md-7 col-12">
                                                            <div class="image">
                                                                <a href="javascript:void(0)"><img src="https://images.unsplash.com/photo-1556122071-e404eaedb77f?q=80&w=2034&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"  height="240px" alt="#"></a>
                                                                <i class=" cross-badge lni lni-bolt"></i>
                                                                <span class="flat-badge sale">Sale</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 col-md-5 col-12">
                                                            <div class="content">
                                                                <div class=" d-flex  justify-content-between ">
                                                                <a href="javascript:void(0)" class="tag">driver : {{ $item->name }}</a>
                                                                <a href="javascript:void(0)" class="tag">{{ $item->date }}</a>
                                                            </div>
                                                                <h3 class="title">
                                                                    <a href="javascript:void(0)"><i
                                                                        class="lni lni-map-marker">
                                                                    </i>{{ $item->start_city }}</a>
                                                                </h3>
                                                                <h3 class="title">
                                                                    <a href="javascript:void(0)"><i
                                                                        class="lni lni-map-marker">
                                                                    </i>{{ $item->end_city }}</a>
                                                                </h3>
                                                                {{-- <p class="location"><a href="javascript:void(0)"><i
                                                                            class="lni lni-map-marker">
                                                                        </i>{{ $item->end_city }}</a></p> --}}
                                                                <ul class="info">
                                                                    @auth
                                                                        
                                                                
                                                                  
                                                                        <form action="{{ route('add_reservation') }}" method="post">
                                                                            @csrf
                                                                            <input type="text"  name="horaire_id" value="{{ $item->id }}" style="display: none">
                                                                            <input type="text"  name="routes_id" value="{{ $item->routes_id }}" style="display: none">
                                                                            <input type="text"  name="driver_id" value="{{ $item->driver_id }}" style="display: none">
                                                                        <li class="price"><button type="submit" class="btn btn-primary">Buy</button></li>
                                                                    </form>
                                                                    @endauth
                                                              
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Single Item -->
                                            </div>
                                            @endforeach
                                     
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Items Listing List -->

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