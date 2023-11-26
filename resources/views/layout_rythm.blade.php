<!DOCTYPE html>
<!-- Change the value of lang="en" attribute if your website's language is not English.
You can find the code of your language here - https://www.w3schools.com/tags/ref_language_codes.asp -->
<html lang="en">
    <head>
        <title>Blog App</title>
        <meta name="description" content="Rhythm &mdash; One & Multi Page Creative Template">  
        <meta charset="utf-8">
        <meta name="author" content="https://themeforest.net/user/bestlooker/portfolio">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{asset('assets/rhytm')}}/images/favicon.png">

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/style.css">
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/style-responsive.css">
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/owl.carousel.css">
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/animate.min.css">
        <link rel="stylesheet" href="{{asset('assets/rhytm')}}/css/splitting.css">
        <style>
            .comment{
                margin-top: -120px;
            }
        </style>
    </head>
    <body class="appear-animate">
        <!-- Page Wrap -->
        <div class="page bg-dark light-content" id="top">
            
            <!-- Navigation panel -->
            <nav class="main-nav dark light-after-scroll transparent stick-fixed wow-menubar">
                <div class="full-wrapper relative clearfix">
                    
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <a href="/" class="logo">
                            Blog App
                        </a>
                    </div>

                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist">
                            
                            <!-- Item With Sub -->
                            <li>
                                @if (Auth::user() != null)
                                <a href="{{route('logout')}}" class="mn-has-sub">Logout</a>
                                @else
                                <a href="{{route('login')}}" class="mn-has-sub">Login</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->
            
            <main id="main">    
            
                <!-- Home Section -->
                <section class="small-section bg-dark-alfa-50 bg-scroll light-content" data-background="images/full-width-images/section-bg-19.jpg" id="home">
                    <div class="container relative pt-70">
                    
                        <div class="row">
                            
                            <div class="col-md-8">
                                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                    <h1 class="hs-line-7 mb-20 mb-xs-10">Blog</h1>
                                </div>
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                        Share your best ideas in our blog
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    
                    </div>
                </section>
                <!-- End Home Section -->
                               
                @yield('content')
                
                <!-- Divider -->
                <hr class="mt-0 mb-0 white"/>
                <!-- End Divider -->      
                
            </main>
            
            <!-- Footer -->
            <footer class="page-section bg-dark-lighter light-content footer pb-100 pb-sm-50">
                <div class="container">
                
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
                        <div class="footer-copy">
                            <a href="{{asset('assets/rhytm')}}/index.html">© Rhythm 2022</a>.
                        </div>
                        <!-- End Copyright -->
                        
                        <div class="footer-made">
                            Made with love for great people.
                        </div>
                        
                    </div>
                    <!-- End Footer Text --> 
                    
                 </div>
                
                 
            </footer>
            <!-- End Footer -->
        
        </div>
        <!-- End Page Wrap -->
        
        
        <!-- JS -->
        <script src="{{asset('assets/rhytm')}}/js/jquery-3.5.1.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.easing.1.3.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/SmoothScroll.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.scrollTo.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.localScroll.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.viewport.mini.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.countTo.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.appear.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.parallax-1.1.3.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.fitvids.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/owl.carousel.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/isotope.pkgd.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/masonry.pkgd.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.lazyload.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/wow.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/morphext.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/typed.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/all.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/contact-form.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/jquery.ajaxchimp.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/objectFitPolyfill.min.js"></script>
        <script src="{{asset('assets/rhytm')}}/js/splitting.min.js"></script>
        
    </body>
</html>
