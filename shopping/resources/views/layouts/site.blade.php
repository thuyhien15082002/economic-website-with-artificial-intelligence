<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Male-Fashion shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public/site')}}/img/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('public/site')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/slicknav.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/slick.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{url('public/site')}}/css/style.css">

    <style>
    .nav-search {
        width: 260px;
        margin-right: 15px;
    }

    .input-search {
        position: relative;
    }

    .search-result {
        position: absolute;
        background-color: #fff;
        padding: 10px;
        width: 260px;
        max-height: 500px;
        overflow: auto;
        z-index: 1000;
    }

    .comments-area .comment-list {
        padding-bottom: 0px;
    }

    .comments-area {
        padding: 20px 0px;
        margin-top: 20px;
        max-height: 500px;
        overflow: auto;
    }

    .comment-form {
        padding-top: 0px;
        border-top: none;
        margin-top: 10px;
    }

    #count-pro {
        position: absolute;
        background: #ff003c;
        color: #fff;
        text-align: center;
        border-radius: 8px;
        font-size: 10px;
        top: 25px;
        right: 29px;
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s;
        box-shadow: 0 2px 5px rgb(0 0 0 / 30%);
        padding: 0px 6px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
    }
    </style>
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{url('public/site')}}/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{route('home.index')}}"><img src="{{url('public/site')}}/img/logo/logo.png"
                                    alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{route('home.index')}}">Home</a></li>
                                    <li><a href="{{route('home.shop')}}">shop</a>

                                    </li>
                                    <li><a href="">about</a></li>
                                    <li><a href="">Blog</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search">
                                        <input class="form-control input-search" type="text" placeholder="Search"
                                            aria-label="Search">

                                        <div class="search-result">

                                        </div>
                                    </div>
                                </li>
                                @guest
                                @if (Route::has('login'))
                                <li><a href="{{route('login')}}"><span class="flaticon-user"></span></a></li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        @if(Auth::user()->role==1)
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            {{ __('Admin') }}
                                        </a>
                                        @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                                <li><a href="{{route('cart.view')}}">
                                        <span class="flaticon-shopping-cart">
                                            @if(null !== session('cart'))
                                            <span id="count-pro">{{$cart->total_quantity}}</span>
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @yield('main')
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{route('home.index')}}"><img
                                            src="{{url('public/site')}}/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do
                                            eiusmod tem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#"> Offers & Discounts</a></li>
                                    <li><a href="#"> Get Coupon</a></li>
                                    <li><a href="#"> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>New Products</h4>
                                <ul>
                                    <li><a href="#">Woman Cloth</a></li>
                                    <li><a href="#">Fashion Accessories</a></li>
                                    <li><a href="#"> Man Accessories</a></li>
                                    <li><a href="#"> Rubber made Toys</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Report a Payment Issue</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                    aria-hidden="true"></i>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="{{url('public/site')}}/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{url('public/site')}}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{url('public/site')}}/js/popper.min.js"></script>
    <script src="{{url('public/site')}}/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{url('public/site')}}/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{url('public/site')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('public/site')}}/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{url('public/site')}}/js/wow.min.js"></script>
    <script src="{{url('public/site')}}/js/animated.headline.js"></script>
    <script src="{{url('public/site')}}/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{url('public/site')}}/js/jquery.scrollUp.min.js"></script>
    <script src="{{url('public/site')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{url('public/site')}}/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="{{url('public/site')}}/js/contact.js"></script>
    <script src="{{url('public/site')}}/js/jquery.form.js"></script>
    <script src="{{url('public/site')}}/js/jquery.validate.min.js"></script>
    <script src="{{url('public/site')}}/js/mail-script.js"></script>
    <script src="{{url('public/site')}}/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{url('public/site')}}/js/plugins.js"></script>
    <script src="{{url('public/site')}}/js/main.js"></script>
    @yield('js')

    <script>
    $('.search-result').hide();
    $('.input-search').keyup(function() {
        var _text = $(this).val();
        var _url = "{{url('public/uploads')}}";
        if (_text != '') {
            $.ajax({
                url: "{{route('ajax-search-product')}}?key=" + _text,
                type: 'GET',
                success: function(res) {
                    $('.search-result').show(200);
                    $('.search-result').html(res);
                }
            });
        } else {
            $('.search-result').html('');
            $('.search-result').hide(50);
        }
    });
    </script>
</body>

</html>