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
                        <h1 class="page-title">My Trajets</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="javascript:void(0)">Home</a></li>
                        <li>My Trajets</li>
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
                            <img src="{{ asset('images/' . $user['image']) }}" alt="#">
                            <h3>{{ $user['name'] }}
                                <span><a href="javascript:void(0)">{{ Str::limit($user['email'], 20) }}</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a href="{{ route('profile') }}"><i class="lni lni-pencil-alt"></i> Edit Profile</a>
                                </li>
                                <li><a class="active" href="my-items.html"><i class="lni lni-bolt-alt"></i> My Trajets</a>
                                </li>

                            </ul>
                            <div class="button">
                                {{-- <a class="btn" href="javascript:void(0)">Logout</a> --}}
                                <a class="btn" href="{{ route('logout.user') }}">{{ trans("Dashboard/main-Header_trans.sign_out") }}</a>

                            </div>
                        </div>
                    </div>
                    <!-- Start Dashboard Sidebar -->
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">My Trajets</h3>
                         
                            <!-- Start Items Area -->
                            <div class="my-items">
                                <form action="{{ route('add_route') }}" method="POST" >
                                    @csrf
                                <div class="row">
                              
                               @if (count($horaires) == 0 ||$horaires[0]->end_time !== null)
                                   
                            
                                   
                            
                                <div class="col-12 col-md-3">
                                    <label for="inputPassword5"  class="form-label">route</label>
                                    <select class="form-select mb-5" name='id' aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($route as $item)
                                        <option value="{{ $item->id }}">{{ $item->start_city . ' ' . '=>' . ' ' . $item->end_city}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-12 col-md-3 mb-4">
                                        <label for="inputPassword5" class="form-label">date</label>
                                        <input type="date" name="date" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
    
                                    </div>
                                    <div class="col-12 col-md-3 pt-4">
                                     
                                       <button type="submit" name="submit" id="" class="btn btn-primary" >ajouter</button>
                                    </div>
                                </form>
                                @endif
                              
                             
                            
  
                                </div>
                                @foreach ($horaires as $item)
                                    
                              
                                <!-- Start Single List -->
                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <div class="item-image">
                                                <img src="https://www.thoughtco.com/thmb/gKLmeBLUTBiDfmmQVidHhcBq0fE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-556712867-58e85b223df78c51620400d4.jpg" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)">Total :{{ $item->num_reserv }}</a></h3>
                                                    <span class="price">status : {{ $item->status }}</span>
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
                                            @if ($item->num_reserv == 5)
                                            <ul class="action-btn">
                                                @if ($item->status === "En route")

                                                <li><a href="{{ route('end_travle',$item->horaire_id ) }}"><i class="fa-solid fa-plane-arrival fa-flip-horizontal"></i>Arrived</a></li>
                              

                                                @else
                                                <li><a href="{{ route('start_travle',$item->horaire_id ) }}"><i class="fa-solid fa-plane-departure fa-flip-horizontal"></i>go</a></li>
                                                @endif
                                            </ul>  
                                            @endif
                                          
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List -->
                                @endforeach
                       
                            </div>
                            <!-- End Items Area -->
                        </div>
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">history Trajets</h3>
                         
                            <!-- Start Items Area -->
                            <div class="my-items">
                          
                        
                                @foreach ($reservations as $item)
                                    
                              
                                <!-- Start Single List -->
                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <div class="item-image">
                                                <img src="https://www.thoughtco.com/thmb/gKLmeBLUTBiDfmmQVidHhcBq0fE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-556712867-58e85b223df78c51620400d4.jpg" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)">Total :{{ $item->num_reserv }}</a></h3>
                                                    <span class="price">status : {{ $item->status }}</span>
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
                                            @if ($item->num_reserv == 5)
                                            <ul class="action-btn">
                                                @if ($item->status === "En route")

                                                <li><a href="{{ route('end_travle',$item->horaire_id ) }}"><i class="fa-solid fa-plane-arrival fa-flip-horizontal"></i>Arrived</a></li>
                              

                                                @else
                                                <li><a href="{{ route('start_travle',$item->horaire_id ) }}"><i class="fa-solid fa-plane-departure fa-flip-horizontal"></i>go</a></li>
                                                @endif
                                            </ul>  
                                            @endif
                                          
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List -->
                                @endforeach
                       
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