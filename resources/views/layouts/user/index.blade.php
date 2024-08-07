<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/user/img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Tiket Bola</title>
    <!--
  CSS
  ============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/main.css') }}">
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/">
                        {{-- <img src="{{ asset('assets/user/img/logo.png') }}"
                            alt=""> --}}
                        <b>
                            APLIKASI TIKET BOLA
                        </b>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link"
                                    href="/">Home</a></li>
                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-product.html">Product
                                            Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                                    <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                </ul>
                            </li> --}}
                            <li class="nav-item {{ Request::is('jadwal-tiket') ? 'active' : '' }}"
                                style="cursor: pointer"><a class="nav-link" href="/jadwal-tiket">Tiket</a></li>
                            {{-- <li class="nav-item" style="cursor: pointer"><a class="nav-link"
                                    onclick="alert('comming soon')">Kontak</a></li> --}}
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            {{-- <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li> --}}
                            <li class="nav-item">
                                <button class="search">
                                    <span class="lnr lnr-magnifier" id="search"></span>
                                </button>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="">
                                        <span id="search">Login</span>
                                    </a>
                                </li>
                            @else
                                <li class="ms-4 nav-item dropdown mt-3">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset('images/user.png') }}" alt="{{ Auth::user()->name }}"
                                            class="rounded-circle" width="30" height="30">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item">{{ Auth::user()->name }}</a>
                                        <hr>
                                        <a class="dropdown-item" href="/user/tiket-saya">
                                            {{ __('Tiket Saya') }}
                                        </a>
                                        <hr>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
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
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form action="/jadwal-tiket" method="GET" class="d-flex justify-content-between">
                    <input type="text" class="form-control" name="search-club" id="search_input"
                        placeholder="Cari berdasarkan nama club">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Tutup Pencarian"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header Area -->

    @yield('content')

    <!-- start banner Area -->

    <!-- End banner Area -->

    <!-- start features Area -->
    {{-- <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/user/img/features/f-icon1.png') }}" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/user/img/features/f-icon2.png') }}" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/user/img/features/f-icon3.png') }}" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('assets/user/img/features/f-icon4.png') }}" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end features Area -->

    <!-- Start category Area -->
    {{-- <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/user/img/category/c1.jpg') }}"
                                    alt="">
                                <a href="{{ asset('assets/user/img/category/c1.jpg') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/user/img/category/c2.jpg') }}"
                                    alt="">
                                <a href="{{ asset('assets/user/img/category/c2.jpg') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/user/img/category/c3.jpg') }}"
                                    alt="">
                                <a href="{{ asset('assets/user/img/category/c3.jpg') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Product for Couple</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="{{ asset('assets/user/img/category/c4.jpg') }}"
                                    alt="">
                                <a href="{{ asset('assets/user/img/category/c4.jpg') }}" class="img-pop-up"
                                    target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">Sneaker for Sports</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-deal">
                        <div class="overlay"></div>
                        <img class="img-fluid w-100" src="{{ asset('assets/user/img/category/c5.jpg') }}"
                            alt="">
                        <a href="{{ asset('assets/user/img/category/c5.jpg') }}" class="img-pop-up" target="_blank">
                            <div class="deal-details">
                                <h6 class="deal-title">Sneaker for Sports</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End category Area -->


    <!-- Start brand Area -->
    {{-- <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/user/img/brand/1.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/user/img/brand/2.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/user/img/brand/3.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/user/img/brand/4.png') }}"
                        alt="">
                </a>
                <a class="col single-img" href="#">
                    <img class="img-fluid d-block mx-auto" src="{{ asset('assets/user/img/brand/5.png') }}"
                        alt="">
                </a>
            </div>
        </div>
    </section> --}}
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    {{-- <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Deals of the Week</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r1.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r2.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r3.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r5.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r6.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r7.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r9.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r10.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('assets/user/img/r11.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto"
                                src="{{ asset('assets/user/img/category/c5.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End related-product Area -->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Tentang Kami</h6>
                        <b>Aplikasi Pemesanan Tiket Pertandingan Bola</b>
                        <p>
                            Hai, kami dari kelompok 2 dengan anggota :
                        <ul>
                            <li>Kidam Kusnandi</li>
                            <li>Irwan Adhiyanto</li>
                            <li>Vicky Muhammad Akbar</li>
                            <li>Alyani Nurhayati</li>
                            <li>Adzra Maisa Fayyadh</li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Anggota</h6>
                        <ul class="instafeed d-flex ">
                            <li><img src="{{ asset('images/a1.jpeg') }}" width="100px" alt=""></li>
                            <li><img src="{{ asset('images/a2.jpeg') }}" width="100px" alt=""></li>
                            <li><img src="{{ asset('images/a3.jpeg') }}" width="100px" alt=""></li>
                            <li><img src="{{ asset('images/a4.jpeg') }}" width="100px" alt=""></li>
                            <li><img src="{{ asset('images/a5.jpeg') }}" width="100px" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | created <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="" target="_blank">Tiket Bola</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{ asset('assets/user/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/user/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/user/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/owl.carousel.min.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('assets/user/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/main.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                title: 'Error!',
                html: '<ul>' +
                    @foreach ($errors->all() as $error)
                        '<li>{{ $error }}</li>' +
                    @endforeach
                '</ul>',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
</body>

</html>
