<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ui Barn | Raffle Draw</title>
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
</head>

<body>

<!-- Header Section Start -->
<header class="header" id="header">
    <div class="header-area">
        <img src="{{asset('assets/images/desktop.jpg')}}" alt="desktop-img" class="desktop-img d-none d-md-block">
        <img src="{{asset('assets/images/mobile.jpg')}}" alt="mobile-img" class="mobile-img d-md-none">
    </div>
</header>
<!-- Header Section End -->



<!-- Form Section Start -->
<div id="form" class="form section">
    <div class="form-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <form id="raffle-form" class="raffle-form" method="POST" action="{{route('participant_store')}}" enctype="multipart/form-data">
                        @csrf
                        <h2 class="form-title">Ui Barn Raffle Draw Form</h2>
                        <hr class="hr">
                        <div class="form-content">
                            <div class="form-group mb-4">
                                <label for="user-name" class="form-label">Name <sup>*</sup></label>
                                <input type="text" name="name" class="form-control" id="user-name"
                                       placeholder="Enter your full name" autocomplete="off">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="user-email" class="form-label">Email<sup>*</sup></label>
                                <input type="email" name="email" class="form-control" id="user-email"
                                       placeholder="mail@example.com" autocomplete="off">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="user-phone" class="form-label">Phone<sup>*</sup></label>
                                <input type="number" name="phone" class="form-control" id="user-phone"
                                       placeholder="Enter your phone number" autocomplete="off">
                                <span class="text-danger error-text phone_error"></span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="user-coupon" class="form-label">Coupon Code<sup>*</sup></label>
                                <input type="text" name="coupon_code" class="form-control" id="user-coupon" placeholder="UIBARN0001" autocomplete="off">
                                <span class="text-danger error-text coupon_code_error"></span>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Which Category You Work?<sup>*</sup></label>
                                <select class="form-select"  name="category" id="category" aria-label="Default select">
                                    <option value="">Select One</option>
                                    <option value="Web Design">Web Design</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Graphics Design">Graphics Design</option>
                                    <option value="Ui/Ux Design">Ui/Ux Design</option>
                                    <option value="Motion Graphics Design">Motion Graphics Design</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Others">Others</option>
                                </select>
                                <span class="text-danger error-text category_error"></span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="user-link" class="form-label">Give your facebook post link here<sup>*</sup></label>
                                <input type="text" name="link" class="form-control" id="user-link"
                                       placeholder="https://www.facebook.com/post" autocomplete="off">
                                <span class="text-danger error-text link_error"></span>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label">Upload your facebook post screenshot (optional)</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Choose File</label>
                                </div>
                                <span class="text-danger error-text image_error"></span>
                            </div>
                            <input class="btn btn-submit" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form Section End -->

<!-- Thanks Section Start -->
<div id="thanks" class="thanks section" style="display: none">
    <div class="thanks-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <div class="thanks-content">
                        <img src="{{asset('assets/images/like.gif')}}" alt="like" class="like">
                        <h3 class="thanks-text">Thanks For Submitting.</h3>
                        <a href="https://uibarn.com/" class="visit-link">Visit Website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Thanks Section End -->


<!-- Social Section Start -->
<footer id="footer" class="footer">
    <div class="footer-area">
        <div class="container">
            <ul class="social-collections">
                <li><a href="https://www.facebook.com/uibarnlimited"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/uibarn"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/company/uibarn/"><i class="fa-brands fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- Social Section End -->



<!-- jQuery JS -->
<script src="{{asset('assets/js/jquery-3.6.4.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Fontawesome JS -->
<script src="{{asset('assets/js/all.min.js')}}"></script>
<script src="{{asset('assets/js/fontawesome.min.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
