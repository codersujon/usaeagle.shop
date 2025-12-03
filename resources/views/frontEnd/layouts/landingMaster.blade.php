<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{$generalsetting->name}}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="author" content="{{$generalsetting->name}}" />
    <meta name="description" content="Welcome to {{$generalsetting->name}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontEnd2') }}/assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontEnd2') }}/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('frontEnd2') }}/assets/css/main.css?v=5.3" />

    @foreach($pixels as $pixel)
        <!-- FACEBOOK PIXEL CODE -->
        <script>
            !(function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = "2.0";
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s);
            })(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
            fbq("init", "{{{$pixel->code}}}");
            fbq("track", "PageView");
        </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id={{{$pixel->code}}}&ev=PageView&noscript=1" />
        </noscript>
        <!-- END FACEBOOK PIXEL CODE -->
    @endforeach
        
    @foreach($gtm_code as $gtm)
        <!-- GOOGLE TAG (GTAG.JS) -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-{{ $gtm->code }}');</script>
        <!-- END GOOGLE TAG MANAGER -->
    @endforeach

    <style>
        .video-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
        }
        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body>
    <!-- Header  -->
    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <h5 class="text-white">"আমাদের USA Eagle Shop-এ আপনাকে আন্তরিক স্বাগতম!"</h5>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar py-4">
            <div class="container">
               <div class="row text-center">
                   <div class="col-12 d-flex justify-content-center">
                        <div class="header-wrap">
                            <div class="hotline d-flex">
                                <img src="{{ asset('frontEnd2') }}/assets/imgs/theme/icons/icon-headphone.svg" alt="hotline" />
                                <p>01787-388128<span>24/7 Support Center</span></p>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
        </div>
    </header>

   <!-- End Header  -->

    <main class="main">
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>এক্সকলুসিভ কালেকশন</h3>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4 d-flex justify-content-center">
                            @foreach($hotdeal_top as $key => $value)
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".3s">

                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                @php
                                                    $youtube = $value->pro_unit; // YouTube URL
                                                    $videoId = null;
                                                    if ($youtube) {
                                                        if (preg_match('/embed\/([A-Za-z0-9_-]{11})/', $youtube, $m)) {
                                                            $videoId = $m[1];
                                                        }
                                                    }
                                                @endphp

                                                @if($videoId)
                                                    <div class="video-wrapper">
                                                        <iframe 
                                                            src="https://www.youtube.com/embed/{{ $videoId }}" 
                                                            frameborder="1" 
                                                            allowfullscreen>
                                                        </iframe>
                                                    </div>
                                                @else
                                                    {{-- Backup image (optional) --}}
                                                    <img class="default-img" src="{{ asset($value->image->image ?? '') }}" alt="">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="product-content-wrap">
                                            <h2 class="mt-3">
                                                <a href="{{url('campaign', $value->slug)}}" target="_blank">
                                                    {{ $value->name }}
                                                </a>
                                            </h2>

                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>{{ $value->new_price }}</span>
                                                    <span class="old-price text-danger">{{ $value->old_price }}</span>
                                                </div>

                                                <div class="add-cart">
                                                    <a class="add" href="{{url('campaign', $value->slug)}}" target="_blank">
                                                        <i class="fi-rs-shopping-cart mr-5"></i>অর্ডার করুন
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                </div>
                <!--End tab-content-->
            </div>
        </section>
    </main>


    <footer class="main">
        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-center">
                    <p class="font-sm mb-0">~স্বত্ব © {{ date('Y') }} {{$generalsetting->name}} কর্তৃক সর্বস্বত্ব সংরক্ষিত~</p>
                    <!-- <p>~Developed By <a href="https://www.codersujon.com/" class="text-primary" target="_blank">CoderS</a>~</p> -->
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                     
                    <div class="hotline d-lg-inline-flex">
                        <img src="{{ asset('frontEnd2') }}/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                        <p>01787388128<span>24/7 Support Center</span></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="https://www.facebook.com/TheUSAEagle" target="_blank"><img src="{{ asset('frontEnd2') }}/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    </div>
                    <p class="font-sm">2টি অর্ডার করলে ডেলিভারি চার্জ ফ্রি!</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Vendor JS-->
    <script src="{{ asset('frontEnd2') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/slick.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/waypoints.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/wow.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/magnific-popup.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/select2.min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/counterup.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/images-loaded.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/isotope.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/scrollup.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/plugins/jquery.elevatezoom.js"></script>

     <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/67df57909a2cc71918efca50/1in06s3ka';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    <!-- Template  JS -->
    <script src="{{ asset('frontEnd2') }}/assets/js/main.js?v=5.3"></script>
    <script src="{{ asset('frontEnd2') }}/assets/js/shop.js?v=5.3"></script>
</body>

</html>