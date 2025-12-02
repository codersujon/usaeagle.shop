<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{$generalsetting->name}}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="author" content="Fashion In Dhaka" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontEnd2') }}/assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontEnd2') }}/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd2') }}/assets/css/main.css?v=5.3" />

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

</head>

<body>
    <!-- Header  -->
    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <h5 class="text-white">"অসম্ভব সুন্দর বোরকার কালেকশন নিয়ে আমরা আছি আপনার পাশে"</h5>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar py-4">
            <div class="container">
               <div class="row text-center">
                   <div class="col-12 d-flex justify-content-center">
                        <div class="header-wrap">
                            <div class="hotline d-flex">
                                <img src="{{ asset('public/frontEnd2') }}/assets/imgs/theme/icons/icon-headphone.svg" alt="hotline" />
                                <p>01845-862150<span>24/7 Support Center</span></p>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
        </div>
    </header>

   <!-- End Header  -->


    <main class="main">
        <section class="customer-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-8 offset-sm-2 text-center">
                        <div class="success-img">
                            <img src="{{asset('frontEnd/images/order-success.png')}}" alt="">
                        </div>
                        <div class="success-title">
                            <h3>আপনার অর্ডারটি আমাদের কাছে সফলভাবে পৌঁছেছে, কিছুক্ষনের মধ্যে আমাদের একজন প্রতিনিধি আপনার নাম্বারে কল করবেন </h3>
                        </div>

                        <h5 class="my-3">Your Order Details</h5>
                        <div class="success-table">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Invoice ID</p>
                                            <p><strong>{{$order->invoice_id}}</strong></p>
                                        </td>
                                        <td>
                                            <p>Date</p>
                                            <p><strong>{{$order->created_at->format('d-m-y')}}</strong></p>
                                        </td>
                                        <td>
                                            <p>Phone</p>
                                            <p><strong>{{$order->shipping?$order->shipping->phone:''}}</strong></p>
                                        </td>
                                        <td>
                                            <p>Total</p>
                                            <p><strong>৳ {{$order->amount}}</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        @php 
                                            $payments = App\Models\Payment::where('order_id',$order->id)->first();
                                        @endphp
                                        <td colspan="4">
                                            <p>Payment Method</p>
                                            <p><strong>{{$payments->payment_method}}</strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- success table -->
                        <h5 class="my-4">Pay with cash upon delivery</h5>
                        <div class="success-table">
                            <h6 class="mb-3">Order Delivery</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderdetails as $key=>$value)
                                    <tr>
                                        <td>
                                            <p>{{$value->product_name}} x {{$value->qty}}</p>
                                            
                                        </td>
                                        <td><p><strong>৳ {{$value->sale_price}}</strong></p></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th  class="text-end px-4">Net Total</th>
                                        <td><strong id="net_total">৳{{$order->amount-$order->shipping_charge}}</strong></td>
                                    </tr>
                                    <tr>
                                        <th  class="text-end px-4">Shipping Cost</th>
                                        <td>
                                            <strong id="cart_shipping_cost">৳{{$order->shipping_charge}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th  class="text-end px-4">Grand Total</th>
                                        <td>
                                            <strong id="grand_total">৳{{$order->amount}}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="my-4">Billing Address</h5>
                                            <p>{{$order->shipping?$order->shipping->name:''}}</p>
                                            <p>{{$order->shipping?$order->shipping->phone:''}}</p>
                                            <p>{{$order->shipping?$order->shipping->address:''}}</p>
                                            <p>{{$order->shipping?$order->shipping->area:''}}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- success table -->
                        <a href="{{route('home')}}" class=" my-5 btn btn-primary">Go To Home</a>
                    </div>
                </div>
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
                        <img src="{{ asset('public/frontEnd2') }}/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                        <p>01845862150<span>24/7 Support Center</span></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="https://www.facebook.com/FashionBorkaZone" target="_blank"><img src="{{ asset('public/frontEnd2') }}/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    </div>
                    <p class="font-sm">ঈদ উপলক্ষে 2টি বোরকা অর্ডার করলে ডেলিভারি চার্জ ফ্রি!</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Vendor JS-->
    <script src="{{ asset('public/frontEnd2') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/slick.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/waypoints.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/wow.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/magnific-popup.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/select2.min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/counterup.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/images-loaded.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/isotope.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/scrollup.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="{{ asset('public/frontEnd2') }}/assets/js/main.js?v=5.3"></script>
    <script src="{{ asset('public/frontEnd2') }}/assets/js/shop.js?v=5.3"></script>
</body>

</html>



