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
                            <img src="assets/images/dashboard/user-image.jpg" alt="#">
                            <h3>Steve Aldridge
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a href="dashboard.html"><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                <li><a class="active" href="{{ route('profile') }}"><i class="lni lni-pencil-alt"></i>
                                        Edit Profile</a></li>
                                <li><a href="{{ route('dashboard_driver') }}"><i class="lni lni-bolt-alt"></i> My Ads</a></li>
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
                        <!-- Start Profile Settings Area -->
                        <div class="dashboard-block mt-0 profile-settings-block">
                            <h3 class="block-title">Profile Settings</h3>
                            <div class="inner-block">
                                <div class="image">
                                    <img src="assets/images/dashboard/user-image.jpg" alt="#">
                                </div>
                                <form class="profile-setting-form" method="post" action="{{ route('Store_profile') }}">
                                    @csrf
                                    <div class="row">
                                    
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>plate_number*</label>
                                                <input name="plate_number" type="text" placeholder="Plate Number" value="{{ old('plate_number', $profile->plate_number ?? '' ) }}">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group upload-image">
                                                <label>vehicle_type*</label>
                                                <input name="vehicle_type" type="text" placeholder="vehicle_type" value="{{ old('vehicle_type', $profile ? $profile->vehicle_type : '') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <label>Status*</label>
                                            <select name="status" class="form-select" aria-label="Default select example">
                                                <option value="Available" {{ $profile && $profile->status === 'Available' ? 'selected' : '' }}>Available</option>
                                                <option value="En route" {{ $profile && $profile->status === 'En route' ? 'selected' : '' }}>En route</option>
                                                <option value="Not available" {{ $profile && $profile->status === 'Not available' ? 'selected' : '' }}>Not available</option>
                                            </select>
                                        </div>
                                          <div class="col-12 mb-5">
                                            <label>Payment Method*</label>
                                            <select name="payment_method" class="form-select" aria-label="Default select example">
                                                <option value="espèces" {{ old('payment_method', $profile ? $profile->payment_method : '') === 'espèces' ? 'selected' : '' }}>espèces</option>
                                                <option value="carte" {{ old('payment_method', $profile ? $profile->payment_method : '') === 'carte' ? 'selected' : '' }}>carte</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <label>About You*</label>
                                                <textarea name="description" placeholder="Enter about yourself">{{ old('description', $profile ? $profile->description : '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button mb-0">
                                                <button type="submit" class="btn ">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Profile Settings Area -->
                        <!-- Start Password Change Area -->
                        <div class="dashboard-block password-change-block">
                            <h3 class="block-title">Change Password</h3>
                            <div class="inner-block">
                                <form class="default-form-style" method="post" action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Current Password*</label>
                                                <input name="current-password" type="password"
                                                    placeholder="Enter old password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>New Password*</label>
                                                <input name="new-password" type="password"
                                                    placeholder="Enter new password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Retype Password*</label>
                                                <input name="retype-password" type="password"
                                                    placeholder="Retype password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button mb-0">
                                                <button type="submit" class="btn ">Update Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Password Change Area -->
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
        // Declare an array to store image URLs
        const all_Image = [];

        document.getElementById('images').addEventListener('change', function () {
            const preview = document.getElementById('preview');

            for (const file of this.files) {
                // Check the size of the image (in bytes)
                const imageSize = file.size;
                const maxSize = 4000000; // Set your desired maximum size in bytes (e.g., 1 MB)

                if (imageSize > maxSize) {
                    // Display an error message or handle the oversized image as needed
                    console.error('Image size exceeds the maximum allowed size.');
                    $('#error-container').empty().append('<div>' + 'Image size exceeds the maximum allowed size' + '</div>');
                    continue; // Skip the oversized image
                }

                readImageAsDataURL(file);
            }

            // Update the hidden input value with the current all_Image array
            document.getElementById('all_ImageInput').value = JSON.stringify(all_Image);
        });

        function readImageAsDataURL(file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imageUrl = e.target.result;

                 // Check if the array already contains 5 images
        if (all_Image.length >= 5) {
            // Remove the oldest image to make room for the new one
            const removedImage = all_Image.shift();
            // Remove the corresponding image element and close button
            const removedImageElement = document.querySelector(`[src="${removedImage}"]`);
            if (removedImageElement) {
                const parent = removedImageElement.parentNode;
                parent.removeChild(parent.querySelector(`[src="${removedImage}"]`));
                parent.removeChild(parent.querySelector(`[aria-label="Close"]`));
            }
        }
                all_Image.push(imageUrl);
                console.log(all_Image);
                document.getElementById('all_ImageInput').value = JSON.stringify(all_Image);

                createImagePreview(imageUrl);
            };

            reader.readAsDataURL(file);
        }

        function createImagePreview(imageUrl) {
            const preview = document.getElementById('preview');

            // Create a close button
            const closeButton = document.createElement('button');
            closeButton.type = 'button';
            closeButton.className = 'btn-close';
            closeButton.setAttribute('aria-label', 'Close');
            closeButton.addEventListener('click', function () {
                closeFunction(imageUrl, closeButton);
            });

            // Create an image element
            const imageElement = document.createElement('img');
            imageElement.src = imageUrl;
            imageElement.className = ' rounded col-4 col-sm-2 col-md-2 col-lg-2 col-xl-2';

            // Append the button and image to the same parent element (e.g., preview)
            preview.appendChild(closeButton);
            preview.appendChild(imageElement);
        }

        function closeFunction(imageUrl, closeButton) {
            // Implement the logic to remove the image and update the all_Image array
            // You might want to use imageUrl or closeButton to identify which image to remove
            const indexToRemove = all_Image.indexOf(imageUrl);
            if (indexToRemove !== -1) {
                all_Image.splice(indexToRemove, 1);
            }

          // Remove the corresponding image element and close button
      const parent = closeButton.parentNode;
      parent.removeChild(closeButton);
      parent.removeChild(parent.querySelector(`[src="${imageUrl}"]`));
      console.log(all_Image)
            
            document.getElementById('all_ImageInput').value = JSON.stringify(all_Image);
        }
    </script>
    @endsection