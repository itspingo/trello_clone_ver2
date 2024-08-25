

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="bootstrap 5, premium, multipurpose, sass, scss, saas, software, startup, technology" />
    <meta name="description" content="HTML5 Template" />
    <meta name="author" content="www.themeht.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>Soften - Software & Saas Landing Page</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- inject css start -->

    <!--== bootstrap -->
    <link href="{{url('website/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!--== bootstrap-icons -->
    <link href="{{url('website/assets/css/bootstrap-icons.css')}}" rel="stylesheet" type="text/css" />

    <!--== animate -->
    <link href="{{url('website/assets/css/animate.css')}}" rel="stylesheet" type="text/css" />

    <!--== magnific-popup -->
    <link href="css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />

    <!--== owl-carousel -->
    <link href="{{url('website/assets/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" />

    <!--== odometer -->
    <link href="{{url('website/assets/css/odometer.css')}}" rel="stylesheet" type="text/css" />

    <!--== spacing -->
    <link href="{{url('website/assets/css/spacing.css')}}" rel="stylesheet" type="text/css" />

    <!--== base -->
    <link href="{{url('website/assets/css/base.css')}}" rel="stylesheet" type="text/css" />

    <!--== shortcodes -->
    <link href="{{url('website/assets/css/shortcodes.css')}}" rel="stylesheet" type="text/css" />

    <!--== default-theme -->
    <link href="{{url('website/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!--== responsive -->
    <link href="{{url('website/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />

    <!--== color-customizer -->
    <link href="{{url('website/assets/css/theme-color/color-10.css')}}" data-style="styles" rel="stylesheet">

    <!-- inject css end -->

</head>

<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

        <!-- preloader start -->

        <div id="ht-preloader">
            <div class="loader clear-loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="loader-text">Loading</div>
            </div>
        </div>

        <!-- preloader end -->


        <!--header start-->

        <header id="site-header" class="header">
            <div id="header-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <!-- Navbar -->
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand logo" href="{{route('home')}}">
                                    <span>Sof</span>ten.
                                </a>
                                <button class="navbar-toggler ht-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <svg width="100" height="100" viewBox="0 0 100 100">
                                        <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path>
                                        <path class="line line2" d="M 20,50 H 80"></path>
                                        <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path>
                                    </svg>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <!-- Left nav -->
                                    <ul class="nav navbar-nav mx-auto">
                                        <!-- Home -->
                                        <li class="nav-item ">
                                            <a class="nav-link " href="{{route('home')}}">Home</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link " href="{{route('about')}}">About</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link " href="{{route('price')}}">Price</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link " href="{{route('team')}}">Team</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link " href="{{route('faqs')}}">FAQ</a>
                                        </li>
                                        
                                        <li class="nav-item ">
                                            <a class="nav-link " href="{{route('contact')}}">Contact</a>
                                        </li>
                                        

                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="about-us.html">About Us</a>
                                                </li>
                                                <li>
                                                    <a href="team.html">Team</a>
                                                </li>
                                                <li>
                                                    <a href="team-single.html">Team Single</a>
                                                </li>
                                                <li class="dropdown dropdown-submenu">
                                                    <a class="dropdown-toggle" href="#">Portfolio</a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="portfolio-one.html">Portfolio One</a>
                                                        </li>
                                                        <li>
                                                            <a href="portfolio-single.html">Portfolio Single</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="price-table.html">Price Table</a>
                                                </li>
                                                <li>
                                                    <a href="faq.html">Faq</a>
                                                </li>
                                                <li>
                                                    <a href="login.html">Login</a>
                                                </li>
                                                <li>
                                                    <a href="coming-soon.html">Coming Soon</a>
                                                </li>
                                                <li>
                                                    <a href="error-404.html">Error 404</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="product-grid.html">Product Grid</a>
                                                </li>
                                                <li>
                                                    <a href="product-list.html">Product List</a>
                                                </li>
                                                <li>
                                                    <a href="product-single.html">Product Single</a>
                                                </li>
                                                <li>
                                                    <a href="product-cart.html">Cart</a>
                                                </li>
                                                <li>
                                                    <a href="product-checkout.html">Checkout</a>
                                                </li>
                                                <li>
                                                    <a href="order-complete.html">Order Completed</a>
                                                </li>
                                                <li>
                                                    <a href="forgot-password.html">Forgot Password</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="services.html">Service 01</a>
                                                </li>
                                                <li>
                                                    <a href="services-2.html">Service 02</a>
                                                </li>
                                                <li>
                                                    <a href="services-single.html">Service Single</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">News</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-single.html">Blog Single</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Contact</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="contact.html">Contact 1</a>
                                                </li>
                                                <li>
                                                    <a href="contact-2.html">Contact 2</a>
                                                </li>
                                            </ul>
                                        </li> -->

                                    </ul>
                                </div>
                                <a class="themeht-btn dark-btn" href="{{route('login')}}">Login / Register</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!--header end-->


        @yield('content')

        


        <!--footer start-->

        <footer class="footer" data-bg-img="images/bg/02.png">
            <div class="container">
                <div class="primary-footer">
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <h5>Get In Touch</h5>
                            <ul class="media-icon list-unstyled mb-8">
                                <li>
                                    <p class="mb-0">5th Street, 21st Floor, New York, USA </p>
                                </li>
                                <li>
                                    <a href="mailto:themeht23@gmail.com">themeht23@gmail.com</a>
                                </li>
                                <li>
                                    <a href="tel:+912345678900">+91-234-567-8900</a>
                                </li>
                            </ul>
                            <h5>Follow Us</h5>
                            <ul class="list-inline ps-0 ms-0 footer-social">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="bi bi-dribbble"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-7 col-md-12 mt-6 mt-lg-0">
                            <h5>Information</h5>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 mt-5 mt-md-0 footer-menu">
                                    <ul class="list-unstyled w-100">
                                        <li>
                                            <a href="about-us.html">About Us</a>
                                        </li>
                                        <li>
                                            <a href="services.html">Service</a>
                                        </li>
                                        <li>
                                            <a href="team.html">Team</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 mt-5 mt-md-0 footer-menu">
                                    <ul class="list-unstyled w-100">
                                        <li>
                                            <a href="blog-right-sidebar.html">Blog</a>
                                        </li>
                                        <li>
                                            <a href="error-404.html">Error 404</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 mt-5 mt-md-0 footer-menu">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="faq.html">Faq</a>
                                        </li>
                                        <li>
                                            <a href="privacy-policy.html">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="terms-and-conditions.html">Terms</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-8">
                                <div class="col-md-10">
                                    <h5>Subscribe Our Newsletter</h5>
                                    <div class="subscribe-form">
                                        <form id="mc-form" class="mc-form">
                                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                                            <input class="subscribe-btn" type="submit" name="subscribe" value="Subscribe Now">
                                        </form>
                                        <small class="d-block mt-3">Get started for 1 Month free trial No Purchace required.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="secondary-footer">
                <div class="container">
                    <div class="copyright">
                        <div class="row text-center">
                            <div class="col">Copyright 2023 Soften Theme by <u>
                                    <a href="#">ThemeHt</a>
                                </u> | All Rights Reserved </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--footer end-->


    </div>

    <!-- page wrapper end -->


    <!--back-to-top start-->

    <div class="scroll-top">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!--back-to-top end-->


    <!-- inject js start -->

    <!--== jquery -->
    <script src="{{url('website/assets/js/jquery.min.js')}}"></script>

    <!--== bootstrap -->
    <script src="{{url('website/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!--== jquery-appear -->
    <script src="{{url('website/assets/js/jquery-appear.js')}}"></script>

    <!--== owl-carousel -->
    <script src="{{url('website/assets/js/owl.carousel.min.js')}}"></script>

    <!--== magnific-popup -->
    <script src="{{url('website/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <!--== counter -->
    <script src="{{url('website/assets/js/odometer.min.js')}}"></script>

    <!--== countdown -->
    <script src="{{url('website/assets/js/jquery.countdown.min.js')}}"></script>

    <!--== wow -->
    <script src="{{url('website/assets/js/wow.min.js')}}"></script>

    <!--== theme-script -->
    <script src="{{url('website/assets/js/theme-script.js')}}"></script>

    <!-- inject js end -->

</body>

</html>