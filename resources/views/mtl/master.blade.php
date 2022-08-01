<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MTL Express </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/theme/img/favicon.ico') }}">

    <!-- CSS here -->
    @include('mtl.layouts.maincss')
    @yield('addoncss')
    <link rel="stylesheet" href="{{ asset('assets/theme/css/style.css') }}">
    @yield('addonscriptcss')
    <style>
        .main-header .main-menu ul li a {
            color: #000;
        }
        .header-sticky.sticky-bar {
            background: #ffffff;
        }
        .footer-tittle h4, a {
            color: #2c234d;
        }
        .footer-tittle ul li>a:hover {
            color: #f15f22;
        }
    </style>
</head>
<body>
<!--? Preloader Start -->
@include('mtl.layouts.preloader')
<!-- Preloader Start -->
@include('mtl.layouts.header')
<main>
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9">
                            <div class="hero__caption">
                                <h1 >Safe & Reliable <span>Logistic</span> Solutions!</h1>
                            </div>
                            <!--Hero form -->
                            <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Your Tracking ID">
                                </div>
                                <div class="search-form">
                                    <a href="#">Track & Trace</a>
                                </div>	
                            </form>	
                            <!-- Hero Pera -->
                            <div class="hero-pera">
                                <p>For order status inquiry</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? our info Start -->
    <div class="our-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="info-caption">
                            <p>Call Us Anytime</p>
                            <span>0853-3514-9955</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-clock"></span>
                        </div>
                        <div class="info-caption">
                            <p>Sunday CLOSED</p>
                            <span>Mon - Sat 8.00 - 18.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-place"></span>
                        </div>
                        <div class="info-caption">
                            <p>JL. Sidosermo VI No. 67</p>
                            <span>Surabaya</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our info End -->
    <!--? Categories Area Start -->
    <div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>Our Services</span>
                        <h2>What We Can Do For You</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Land Transport</a></h5>
                            <p>The sea freight service has grown conside rably in recent years. We spend timetting to know your processes to.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-ship"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Ship Transport</a></h5>
                            <p>The sea freight service has grown conside rably in recent years. We spend timetting to know your processes to.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-plane"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Air Transport</a></h5>
                            <p>The sea freight service has grown conside rably in recent years. We spend timetting to know your processes to.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Area End -->
    <!--? About Area Start -->
    <div class="about-low-area padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span>About Our Company</span>
                            <h2> MTL Express Logistic & Transport  Solutions That Saves our Valuable Time!</h2>
                        </div>
                        <p>Brook presents your services with flexible, convenient and cdpose layouts. You can select your favorite layouts & elements for cular ts with unlimited ustomization possibilities. Pixel-perfect replication of the designers is intended.</p>
                        <p>Brook presents your services with flexible, convefnient and chient anipurpose layouts. You can select your favorite layouts.</p>
                        <a href="about.html" class="btn">More About Us</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img">
                            <img src="{{ asset('assets/theme/img/gallery/about2.png') }}" alt="">
                        </div>
                        <div class="about-back-img d-none d-lg-block">
                            <img src="{{ asset('assets/theme/img/gallery/about1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->
    <!--? contact-form start -->
    <section class="contact-form-area section-bg  pt-115 pb-120 fix" data-background="{{ asset('assets/theme/img/gallery/section_bg02.jpg') }}">
        <div class="container">
            <div class="row justify-content-end">
                <!-- Contact wrapper -->
                <div class="col-xl-8 col-lg-9">
                    <div class="contact-form-wrapper">
                        <!-- From tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Section Tittle -->
                                <div class="section-tittle mb-50">
                                    <span>Get a Qote For Free</span>
                                    <h2>Request a Free Quote</h2>
                                    <p>Brook presents your services with flexible, convenient and cdpose layouts. You can select your favorite layouts & elements for.</p>
                                </div>
                            </div>
                        </div>
                        <!-- form -->
                        <form action="#" class="contact-form">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-form">
                                        <input type="text" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="select-items">
                                        <select name="select" id="select1">
                                            <option value="">Freight Type</option>
                                            <option value="">Catagories One</option>
                                            <option value="">Catagories Two</option>
                                            <option value="">Catagories Three</option>
                                            <option value="">Catagories Four</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="City of Departure">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="Incoterms">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="Weight">
                                    </div>
                                </div>
                                <!-- Height Width length -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="Height">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="Width">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="input-form">
                                        <input type="text" placeholder="length">
                                    </div>
                                </div>
                                <!-- Radio Button -->
                                <div class="col-lg-12">
                                    <div class="radio-wrapper mb-30 mt-15">
                                        <label>Extra services:</label>
                                        <div class="select-radio">
                                            <div class="radio">
                                                <input id="radio-1" name="radio" type="radio" checked="">
                                                <label for="radio-1" class="radio-label">Freight</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-2" name="radio" type="radio">
                                                <label for="radio-2" class="radio-label">Express Delivery</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-4" name="radio" type="radio">
                                                <label for="radio-4" class="radio-label">Insurance</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-5" name="radio" type="radio">
                                                <label for="radio-5" class="radio-label">Packaging</label>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <!-- Button -->
                                <div class="col-lg-12">
                                    <button name="submit" class="submit-btn">Request a Quote</button>
                                </div>
                            </div>
                        </form>	
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-form end -->
    <!--Team Ara Start -->
    {{-- <div class="team-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Our Team Mambers</span>
                        <h2>What We Can Do For You</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-team mb-30 text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/theme/img/gallery/team1.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a href="#">Mancherwan Kolin</a></h3>
                                <p>Health agent</p>
                                <!-- Blog Social -->
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-team mb-30 text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/theme/img/gallery/team2.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a href="#">Mancherwan Kolin</a></h3>
                                <p>Health agent</p>
                                <!-- Blog Social -->
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-team mb-30 text-center">
                        <div class="team-img">
                            <img src="{{ asset('assets/theme/img/gallery/team3.png') }}" alt="">
                            <div class="team-caption">
                                <h3><a href="#">Mancherwan Kolin</a></h3>
                                <p>Health agent</p>
                                <!-- Blog Social -->
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Team Ara End -->
    <!--? Testimonial Start -->
    {{-- <div class="testimonial-area testimonial-padding section-bg" data-background="{{ asset('assets/theme/img/gallery/section_bg04.jpg') }}">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-7">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-25">
                        <span>Clients Testimonials</span>
                        <h2>What Our Clients Say!</h2>
                    </div> 
                    <div class="h1-testimonial-active mb-70">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Srem ipsum adolor dfsit amet, consectetur adipiscing elit, sed dox beiusmod tempor incci didunt ut labore et dolore magna aliqua. Quis cipsucm suspendisse ultrices gravida. Risus commodo vivercra maecenas accumsan lac.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    <div class="founder-img">
                                        <img src="{{ asset('assets/theme/img/gallery/Homepage_testi.png') }}" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Jhaon smith</span>
                                        <p>Creative designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Srem ipsum adolor dfsit amet, consectetur adipiscing elit, sed dox beiusmod tempor incci didunt ut labore et dolore magna aliqua. Quis cipsucm suspendisse ultrices gravida. Risus commodo vivercra maecenas accumsan lac.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    <div class="founder-img">
                                        <img src="{{ asset('assets/theme/img/gallery/Homepage_testi.png') }}" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Jhaon smith</span>
                                        <p>Creative designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Start -->
                <div class="col-xl-4 col-lg-5 col-md-8">
                    <div class="testimonial-form text-center">
                        <h3>Always listening, always understanding.</h3>
                        <input type="text" placeholder="Incoterms">
                        <button name="submit" class="submit-btn">Request a Quote</button>
                    </div>
                </div>
                <!-- Form End -->
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->
    <!--? Blog Area Start -->
    {{-- <div class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-70">
                        <span>Our Recent news</span>
                        <h2>Tourist Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ asset('assets/theme/img/gallery/blog01.png') }}" alt="">
                            </div>
                        </div>
                        <div class="blog-caption">
                            <div class="blog-date text-center">
                                <span>27</span>
                                <p>SEP</p>
                            </div>
                            <div class="blog-cap">
                                <ul>
                                    <li><a href="#"><i class="ti-user"></i> Jessica Temphers</a></li>
                                    <li><a href="#"><i class="ti-comment-alt"></i> 12</a></li>
                                </ul>
                                <h3><a href="blog_details.html">Here’s what you should know before.</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ asset('assets/theme/img/gallery/blog1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="blog-caption">
                            <div class="blog-date text-center">
                                <span>27</span>
                                <p>SEP</p>
                            </div>
                            <div class="blog-cap">
                                <ul>
                                    <li><a href="#"><i class="ti-user"></i> Jessica Temphers</a></li>
                                    <li><a href="#"><i class="ti-comment-alt"></i> 12</a></li>
                                </ul>
                                <h3><a href="blog_details.html">Here’s what you should know before.</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ asset('assets/theme/img/gallery/blog02.png') }}" alt="">
                            </div>
                        </div>
                        <div class="blog-caption">
                            <div class="blog-date text-center">
                                <span>27</span>
                                <p>SEP</p>
                            </div>
                            <div class="blog-cap">
                                <ul>
                                    <li><a href="#"><i class="ti-user"></i> Jessica Temphers</a></li>
                                    <li><a href="#"><i class="ti-comment-alt"></i> 12</a></li>
                                </ul>
                                <h3><a href="blog_details.html">Here’s what you should know before.</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Blog Area End -->
</main>
<footer>
    <!--? Footer Start-->
    <div class="footer-bg" style="background: #f5f5f5">
        <div class="container">
            <div class="footer-top footer-padding">
                <!-- footer Heading -->
                <div class="footer-heading">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>We Understand The Importance Approaching Each Work!</h2>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <span class="contact-number f-right">0853-3514-9955</span>
                        </div>
                    </div>
                </div>
                <!-- Footer Menu -->
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>COMPANY</h4>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#"> Press & Blog</a></li>
                                    <li><a href="#"> Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Open hour</h4>
                                <ul>
                                    <li><a href="#">Monday 11am-7pm</a></li>
                                    <li><a href="#"> Tuesday-Friday 11am-8pm</a></li>
                                    <li><a href="#"> Saturday 10am-6pm</a></li>
                                    <li><a href="#"> Sunday 11am-6pm</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>RESOURCES</h4>
                                <ul>
                                    <li><a href="#">Home Insurance</a></li>
                                    <li><a href="#">Travel Insurance</a></li>
                                    <li><a href="#"> Car Insurance</a></li>
                                    <li><a href="#"> Business Insurance</a></li>
                                    <li><a href="#"> Heal Insurance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{ asset('assets/theme/img/logo/mtl-logo.png') }}" alt="" style="max-height: 39px;"></a>
                            </div>
                            {{-- <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">GThe trade war currently ensuing between te US anfd several natxions around thdhe globe, most fiercely with.</p>
                                </div>
                            </div> --}}
                            <!-- Footer Social -->
                            <div class="footer-social ">
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

    <!-- JS here -->
    @include('mtl.layouts.mainjs')
    @yield('addonjs')
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('assets/theme/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/theme/js/main.js') }}"></script>
    @yield('addonscriptjs')
    
</body>
</html>