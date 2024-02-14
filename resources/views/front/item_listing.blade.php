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
                            <h3>Search By Vehicle_type</h3>
                            <form action="{{ route('affiche_card') }}" method="GET">
                                <select name="vehicle_type" class="form-select" aria-label="Select vehicle type">
                                    <option value="all" {{ request()->vehicle_type == 'all' ? 'selected' : '' }}>All</option>
                                    @foreach ($results as $item)
                                        <option value="{{ $item->vehicle_type }}" {{ request()->vehicle_type == $item->vehicle_type ? 'selected' : '' }}>
                                            {{ $item->vehicle_type }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit">Filter</button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>Sort</h3>
                            <ul class="list">
                                <li>
                                    <a href="{{ route('affiche_card', ['sort' => 'desc']) }}"><i class="lni lni-dinner"></i>sort by Reting</a>
                                </li>
                             
                            
                            </ul>
                        </div>
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
                                                    <button class="nav-link active" id="nav-list-tab" data-bs-toggle="tab"
                                                        data-bs-target="#nav-list" type="button" role="tab"
                                                        aria-controls="nav-list" aria-selected="true"><i
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
                                                @if ($item->start_city !== null)
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <!-- Start Single Item -->
                                                        <div class="single-item-grid">
                                                            <div class="row align-items-center">
                                                                <div class="col-lg-5 col-md-7 col-12">
                                                                    <div class="image">
                                                                        <a href="javascript:void(0)"><img
                                                                                src="https://images.unsplash.com/photo-1556122071-e404eaedb77f?q=80&w=2034&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                                                height="240px" alt="#"></a>
                                                                        <i class=" cross-badge lni lni-bolt"></i>
                                                                        <span class="flat-badge sale">{{ $item->payment_method }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7 col-md-5 col-12">
                                                                    <div class="content">
                                                                        <div class=" d-flex  justify-content-between ">
                                                                            <?php $total = $item->All_reviews != 0 ? $item->num_reviews / $item->All_reviews : 0;
                                                                            ?>
                                                                            <a href="javascript:void(0)"
                                                                                class="tag">driver : {{ $item->name }}
                                                                                @if ($total != 0)
                                                                                    @if (round($total) == 1)
                                                                                        <div class="star-rating">
                                                                                            <span style="font-size: 3vh"
                                                                                                onclick=""
                                                                                                class="one">★</span>
                                                                                            <span style="font-size: 3vh"
                                                                                                onclick=""
                                                                                                class="">★</span>
                                                                                            <span style="font-size: 3vh"
                                                                                                onclick=""
                                                                                                class="">★</span>
                                                                                            <span style="font-size: 3vh"
                                                                                                onclick=""
                                                                                                class="">★</span>
                                                                                            <span style="font-size: 3vh"
                                                                                                onclick=""
                                                                                                class="">★</span>
                                                                                            <span>
                                                                                                <h6>({{ $item->All_reviews }}
                                                                                                    Ratings)</h6>
                                                                                            </span>
                                                                                        </div>
                                                                            </a>
                                                @endif
                                                @if (round($total) == 2)
                                                    <div class="star-rating">
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="two">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="two">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="">★</span>
                                                        <span>
                                                            <h6>({{ $item->All_reviews }} Ratings)</h6>
                                                        </span>
                                                    </div>
                                                    </a>
                                                @endif
                                                @if (round($total) == 3)
                                                    <div class="star-rating">
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="three">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="three">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="three">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="">★</span>
                                                        <span>
                                                            <h6>({{ $item->All_reviews }} Ratings)</h6>
                                                        </span>
                                                    </div>
                                                    </a>
                                                @endif
                                                @if (round($total) == 4)
                                                    <div class="star-rating">
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="four">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="four">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="four">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="four">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="">★</span>
                                                        <span>
                                                            <h6>({{ $item->All_reviews }} Ratings)</h6>
                                                        </span>
                                                    </div>
                                                    </a>
                                                @endif
                                                @if (round($total) == 5)
                                                    <div class="star-rating">
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="five">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="five">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="five">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="five">★</span>
                                                        <span style="font-size: 3vh" onclick=""
                                                            class="five">★</span>
                                                        <span>
                                                            <h6>({{ $item->All_reviews }} Ratings)</h6>
                                                        </span>
                                                    </div>
                                                    </a>
                                                @endif
                                            @else
                                                <div class="star-rating">
                                                    <span style="font-size: 3vh" onclick="" class="">★</span>
                                                    <span style="font-size: 3vh" onclick="" class="">★</span>
                                                    <span style="font-size: 3vh" onclick="" class="">★</span>
                                                    <span style="font-size: 3vh" onclick="" class="">★</span>
                                                    <span style="font-size: 3vh" onclick="" class="">★</span>
                                                    <span>
                                                        <h6>({{ $item->All_reviews }} Ratings)</h6>
                                                    </span>
                                                </div>
                                                </a>
                                            @endif
                                            </a>
                                            <a href="javascript:void(0)" class="tag">{{ $item->date }}</a>
                                        </div>
                                        <h3 class="title">
                                            <a href="javascript:void(0)"><i class="lni lni-map-marker">
                                                </i>{{ $item->start_city }}</a>
                                        </h3>
                                        <h3 class="title">
                                            <a href="javascript:void(0)"><i class="lni lni-map-marker">
                                                </i>{{ $item->end_city }}</a>
                                        </h3>
                                        {{-- <p class="location"><a href="javascript:void(0)"><i
                                    class="lni lni-map-marker">
                                </i>{{ $item->end_city }}</a></p> --}}
                                        <ul class="info">
                                            @auth



                                                <form action="{{ route('add_reservation') }}" method="post">
                                                    @csrf
                                                    <input type="text" name="horaire_id" value="{{ $item->id }}"
                                                        style="display: none">
                                                    <input type="text" name="routes_id" value="{{ $item->routes_id }}"
                                                        style="display: none">
                                                    <input type="text" name="driver_id" value="{{ $item->driver_id }}"
                                                        style="display: none">
                                                    <li class="price"><button type="submit"
                                                            class="btn btn-primary">Buy</button></li>
                                                        
                                                </form>
                                            @endauth

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    </div>
                    @endif
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-12">
                    
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
