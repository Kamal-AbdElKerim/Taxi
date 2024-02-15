@extends('front.layout.master');
@section('title')
    Home
@endsection
@section('style')
    {{-- here style css --}}
@endsection


@section('content')
    
    <!-- Start Hero Area -->
    <section class="hero-area style2 overlay">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-lg-12  col-md-12 col-12">
                    <div class="hero-text wow  fadeInLeft" data-wow-delay=".3s">
                        <!-- Start Hero Text -->
                        <div class="section-heading  ">
                            <h2>Welcome to ClassiGrids</h2>
                            <p>Buy And Sell Everything From Used Cars To Mobile Phones And <br>Computers,
                                Or Search For Property, Jobs And More.</p>
                        </div>
                        <!-- End Hero Text -->
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
               
     <!-- Start Search Form -->
     <div class="search-form wow fadeInUp" data-wow-delay=".7s">
        <form action="{{ route('search_forrm') }}" method="post">
            @csrf
        <div class="row">
            {{-- <div class="col-lg-2 col-md-2 col-12 p-0">
                <div class="search-input">
                    <label for="keyword">Time</label>
                    <input class="input_icone" type="time" name="keyword" id="keyword" placeholder="Heure de départ">
                </div>
            </div> --}}
          
         
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

        @if (isset($route))

     <div class="search-form wow fadeInUp" data-wow-delay=".7s">
        <h5 class="mb-5 text-white  ">Trajets Fréquents</h5>
        <form action="{{ route('search_forrm') }}" method="post">
            @csrf
        <div class="row">

            <div class="col-lg-3 col-md-3 col-12 p-0">
                <div class="search-input">
                    <label for="location"><i class="lni lni-map-marker theme-color"></i></label>
                    <select class="input_icone" name="start_city" id="location">
                      
                        <option value="{{ $route->start_city }}">{{ $route->start_city }}</option>
                     
                     
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 p-0">
                <div class="search-input">
                    <label for="location"><i class="lni lni-map-marker theme-color"></i></label>
                    <select class="input_icone" name="end_city" id="location">
                       
                        <option value="{{ $route->end_city }}">{{ $route->end_city }}</option>
                       
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
        @endif
    </div>
    <!-- End Search Form -->
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

        <!-- Start Achievement Area -->
        <section class="our-achievement section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                            <h3 class="counter"><span id="secondo1" class="countup" cup-end="1250">1250</span>+</h3>
                            <p>Regular Ads</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                            <h3 class="counter"><span id="secondo2" class="countup" cup-end="350">350</span>+</h3>
                            <p>Locations</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                            <h3 class="counter"><span id="secondo3" class="countup" cup-end="2500">2500</span>+</h3>
                            <p>Reguler Members</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                            <h3 class="counter"><span id="secondo3" class="countup" cup-end="250">250</span>+</h3>
                            <p>Premium Ads</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Achievement Area -->




       <!-- Start Why Choose Area -->
       <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Why Choose Us</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="choose-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-book"></i>
                                    <h4>Fully Documented</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-leaf"></i>
                                    <h4>Clean & Modern Design</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-cog"></i>
                                    <h4>Completely Customizable</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-pointer-up"></i>
                                    <h4>User Friendly</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-layout"></i>
                                    <h4>Awesome Layout</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-laptop-phone"></i>
                                    <h4>Fully Responsive</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Why Choose Area -->

    @endsection

    @section('script')
        
    @endsection