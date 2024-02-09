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
                        <h1 class="page-title">Post Ad</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Post Ad</li>
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
                                <li><a href="dashboard.html"><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                <li><a href="profile-settings.html"><i class="lni lni-pencil-alt"></i> Edit Profile</a>
                                </li>
                                <li><a href="my-items.html"><i class="lni lni-bolt-alt"></i> My Ads</a></li>
                                <li><a href="favourite-items.html"><i class="lni lni-heart"></i> Favourite ads</a></li>
                                <li><a class="active" href="post-item.html"><i class="lni lni-circle-plus"></i> Post An
                                        Ad</a></li>
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
                        <!-- Start Post Ad Block Area -->
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Post Ad</h3>
                            <div class="inner-block">
                                <!-- Start Post Ad Tab -->
                                <div class="post-ad-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-item-info-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-item-info" type="button" role="tab"
                                                aria-controls="nav-item-info" aria-selected="true">
                                                <span class="serial">01</span>
                                                Step
                                                <span class="sub-title">Ad Information</span>
                                            </button>
                                            <button class="nav-link" id="nav-item-details-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-item-details" type="button" role="tab"
                                                aria-controls="nav-item-details" aria-selected="false">
                                                <span class="serial">02</span>
                                                Step
                                                <span class="sub-title">Ad Details</span>
                                            </button>
                                            <button class="nav-link" id="nav-user-info-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-user-info" type="button" role="tab"
                                                aria-controls="nav-user-info" aria-selected="false">
                                                <span class="serial">03</span>
                                                Step
                                                <span class="sub-title">User Information</span>
                                            </button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-item-info" role="tabpanel"
                                            aria-labelledby="nav-item-info-tab">
                                            <!-- Start Post Ad Step One Content -->
                                            <div class="step-one-content">
                                                <form class="default-form-style" method="post" action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Add Title*</label>
                                                                <input name="title" type="text"
                                                                    placeholder="Enter Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Category*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select a Category</option>
                                                                        <option value="none">Mobile Phones</option>
                                                                        <option value="none">Electronics</option>
                                                                        <option value="none">Computers</option>
                                                                        <option value="none">Headphones</option>
                                                                        <option value="none">Furnitures</option>
                                                                        <option value="none">Books</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group button mb-0">
                                                                <button type="submit" class="btn ">Next Step</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Start Post Ad Step One Content -->
                                        </div>
                                        <div class="tab-pane fade" id="nav-item-details" role="tabpanel"
                                            aria-labelledby="nav-item-details-tab">
                                            <!-- Start Post Ad Step Two Content -->
                                            <div class="step-two-content">
                                              
                                                    <form class="default-form-style" id="imageUploadForm" action="{{ route('storee') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                    <div class="row">
                                                        <div class="col-12 mb-5">
                                                            <div class="form-group mb-5">
                                                                <label>Add Price*</label>
                                                                <input name="price" type="text"
                                                                    placeholder="Enter Price">
                                                            </div>
                                                        </div>
                                                    
                                                        {{-- <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Select Currency*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Dollar</option>
                                                                        <option value="none">Euro</option>
                                                                        <option value="none">Rupee</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-lg-12 col-12">
                                                            <div class="upload-input">
                                                                <label for="" class="text-center content">
                                                                    <span class="text">
                                                                        <span class="d-block mb-15">Drop image 
                                                                            to Upload</span>
                                                                        <span class=" mb-15 ">
                                                                           
                                                                                <label for="images" class="btn btn-primary">
                                                                                    <input type="file" id="images" name="images[]" multiple accept="image/*,.pdf" style="display:none;">Get file
                                                                                </label>
                                                                    
                                                                                <input type="hidden" id="all_ImageInput" name="all_Image" value="">
                                                                    
                                                                                <div id="error-container" class="mt-3"></div>
                                                                    
                                                                                <div class="mt-3 row" id="preview"></div>
                                                                    
                                                                                <button type="submit" class="btn btn-primary mt-3">Submitt</button>
                                                                          
                                                                        </span>
                                                                        <span class="main-btn d-block btn-hover">MAX
                                                                           5 image</span>
                                                                        <span class="d-block">Maximum upload file size
                                                                            2Mb</span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="col-12 mt-3">
                                                            <div class="form-group mt-30 mt-5">
                                                                <label>Ad Description*</label>
                                                                <textarea name="message"
                                                                    placeholder="Input ad description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Type of Ad*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Option 1</option>
                                                                        <option value="none">Option 2</option>
                                                                        <option value="none">Option 3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Item Condition*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Used</option>
                                                                        <option value="none">Brand New</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="tag-label">Tags* <span>Comma(,)
                                                                        separated</span></label>
                                                                <input name="tag" type="text"
                                                                    placeholder="Type Product tag">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group button mb-0">
                                                                <button type="submit"
                                                                    class="btn alt-btn">Previous</button>
                                                                <button type="submit" class="btn ">Next Step</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Start Post Ad Step Two Content -->
                                        </div>
                                        <div class="tab-pane fade" id="nav-user-info" role="tabpanel"
                                            aria-labelledby="nav-user-info-tab">
                                            <!-- Start Post Ad Step Three Content -->
                                            <div class="step-three-content">
                                                <form class="default-form-style" method="post" action="#">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Name*</label>
                                                                <input name="name" type="text"
                                                                    placeholder="Enter your name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Mobile Numbe*</label>
                                                                <input name="number" type="text"
                                                                    placeholder="Enter mobile number">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Country*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select a Country</option>
                                                                        <option value="none">Afghanistan</option>
                                                                        <option value="none">America</option>
                                                                        <option value="none">Albania</option>
                                                                        <option value="none">Bangladesh</option>
                                                                        <option value="none">Brazil</option>
                                                                        <option value="none">India</option>
                                                                        <option value="none">South Africa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Select City*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select City</option>
                                                                        <option value="none">New York</option>
                                                                        <option value="none">Los Angeles</option>
                                                                        <option value="none">Chicago</option>
                                                                        <option value="none">San Diego</option>
                                                                        <option value="none">San Jose</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Select State*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select State</option>
                                                                        <option value="none">New York</option>
                                                                        <option value="none">Texas</option>
                                                                        <option value="none">Arizona</option>
                                                                        <option value="none">Florida</option>
                                                                        <option value="none">Washington</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Address*</label>
                                                                <input name="address" type="text"
                                                                    placeholder="Enter a location">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="google-map">
                                                                <div class="mapouter">
                                                                    <div class="gmap_canvas"><iframe width="100%"
                                                                            height="300" id="gmap_canvas"
                                                                            src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                                            frameborder="0" scrolling="no"
                                                                            marginheight="0" marginwidth="0"></iframe><a
                                                                            href="https://123movies-to.org"></a><br>
                                                                        <style>
                                                                            .mapouter {
                                                                                position: relative;
                                                                                text-align: right;
                                                                                height: 300px;
                                                                                width: 100%;
                                                                            }
                                                                        </style><a
                                                                            href="https://www.embedgooglemap.net">embed
                                                                            google maps wordpress</a>
                                                                        <style>
                                                                            .gmap_canvas {
                                                                                overflow: hidden;
                                                                                background: none !important;
                                                                                height: 300px;
                                                                                width: 100%;
                                                                            }
                                                                        </style>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    I agree to all Terms of Use & Posting Rules
                                                                </label>
                                                            </div>
                                                            <div class="form-group button mb-0">
                                                                <button type="submit"
                                                                    class="btn alt-btn">Previous</button>
                                                                <button type="submit" class="btn ">Submit Ad</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Start Post Ad Step Three Content -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Post Ad Tab -->
                            </div>
                        </div>
                        <!-- End Post Ad Block Area -->
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