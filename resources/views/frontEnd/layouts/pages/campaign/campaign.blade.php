<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $generalsetting->name }}</title>
        <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" type="image/x-icon" />
        <!-- fot awesome -->
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/all.css" />
        <!-- core css -->
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/bootstrap.min.css" />
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/animate.css" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/owl.theme.default.css" />
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/owl.carousel.min.css" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/select2.min.css" />
        <!-- common css -->
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/style.css" />
        <link rel="stylesheet" href="{{ asset('public/frontEnd/campaign/css') }}/responsive.css" />
        @foreach($pixels as $pixel)
        <!-- Facebook Pixel Code -->
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '{{{$pixel->code}}}');
          fbq('track', 'PageView');
        </script>
        <noscript>
          <img height="1" width="1" style="display:none" 
               src="https://www.facebook.com/tr?id={{{$pixel->code}}}&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
        @endforeach
        
        <meta name="app-url" content="{{route('campaign',$campaign_data->slug)}}" />
        <meta name="robots" content="index, follow" />
        <meta name="description" content="{{$campaign_data->description}}" />
        <meta name="keywords" content="{{ $campaign_data->slug }}" />
        
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product" />
        <meta name="twitter:site" content="{{$campaign_data->name}}" />
        <meta name="twitter:title" content="{{$campaign_data->name}}" />
        <meta name="twitter:description" content="{{ $campaign_data->description}}" />
        <meta name="twitter:creator" content="hellodinajpur.com" />
        <meta property="og:url" content="{{route('campaign',$campaign_data->slug)}}" />
        <meta name="twitter:image" content="{{asset($campaign_data->image_one)}}" />
        
        <!-- Open Graph data -->
        <meta property="og:title" content="{{$campaign_data->name}}" />
        <meta property="og:type" content="product" />
        <meta property="og:url" content="{{route('campaign',$campaign_data->slug)}}" />
        <meta property="og:image" content="{{asset($campaign_data->image_one)}}" />
        <meta property="og:description" content="{{ $campaign_data->description}}" />
        <meta property="og:site_name" content="{{$campaign_data->name}}" />
    </head>

    <body>
         @php
            $subtotal = Cart::instance('shopping')->subtotal();
            $subtotal=str_replace(',','',$subtotal);
            $subtotal=str_replace('.00', '',$subtotal);
            $shipping = Session::get('shipping')?Session::get('shipping'):0;
        @endphp


        
        <section class="main-section">
            <div class="container bg-white">

                <div class="row mb-5">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="banner_t text-center">

                            @if($campaign_data->banner_title)
                                <h2 class="text-center">~{{ $campaign_data->banner_title }}~</h2>
                            @endif
                            <h3 class="text-center fw-bold">{{ $campaign_data->name }}</h3>

                            <div class="camp_vid">
                                <iframe width="853" height="480" src="{{ $campaign_data->video }}" title="{{ $campaign_data->name }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                            </div>

                            <div class="ord_btn">
                                <a href="#order_form" class="cam_order_now" id="cam_order_now"> অর্ডার করতে ক্লিক করুন <i class="fa-solid fa-hand-point-right"></i> </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-sm-12">
                        <div class="cont_num">
                            <h2>আমাদের থেকে বিস্তারিত জানতে এই নাম্বারে কল করুন:</h2>
                            <a href="tel:{{$contact->phone}}">{{$contact->phone}}</a>
                        </div>
                        <div class="discount_inn text-center">

                            @if($product->old_price)
                                <h3> জনপ্রিয় এই {{$campaign_data->name}} পূর্বের মূল্য <span class="old_price"><del>{{$product->old_price}}/-</span> টাকা</del></h3>
                            @endif

                            @if($product->new_price)
                                <h2>আজকের অফার মূল্য মাত্র <span class="new_price">{{$product->new_price}}/-</span> টাকা মাত্র</h2>
                            @endif

                                <h4>অফারটি লুফে নিতে এখনি <span class="order_k">“অর্ডার করতে চাই”</span> বাটনে ক্লিক করুন</h4>
                        </div>

                        <div class="ord_btn">
                            <a href="#order_form" class="cam_order_now" id="cam_order_now"> অর্ডার করতে ক্লিক করুন <i class="fa-solid fa-hand-point-right"></i> </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="rev_inn mb-4">
                            <div class="review_slider owl-carousel">
                            @foreach($campaign_data->images as $key=>$value)
                            <div class="review_item">
                                <img src="{{asset($value->image)}}" alt="">
                            </div>
                            @endforeach
                           </div>
                        </div>
                    </div>
                </div>

                <section class="form_sec">
                    <div class="container">
                        <div class="row">
                        <div class="col-sm-12">
                            <div class="form_inn">
                                <div class="col-sm-12">
                                    <div class="row">
                            <div class="col-sm-12">
                                <h2 class="campaign_offer">অফারটি সীমিত সময়ের জন্য, তাই অফার শেষ হওয়ার আগেই অর্ডার করুন</h2>
                            </div>
                        </div>
                        <div class="row order_by">
                        <div class="col-sm-5 cus-order-2">
                            <div class="checkout-shipping" id="order_form">
                                <form action="{{route('customer.ordersave')}}" method="POST" data-parsley-validate="">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="potro_font">আপনার ইনফরমেশন দিন  </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="name">আপনার নাম লিখুন <span class="text-danger">*</span></label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="নাম">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="phone">আপনার মোবাইল লিখুন <span class="text-danger">*</span></label>
                                                    <input type="number" minlength="11" id="number" maxlength="11" pattern="0[0-9]+" title="please enter number only and 0 must first character" title="Please enter an 11-digit number." id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="11 ডিজিটের মোবাইল নাম্বার লিখুন">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="address">আপনার ঠিকানা লিখুন   <span class="text-danger">*</span></label>
                                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" placeholder="আপনার সম্পূর্ণ ঠিকানা লিখুন (জেলা, থানা, গ্রাম)" name="address" value="{{old('address')}}" cols="10" rows="2"></textarea>
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="area">বোরকার সাইজ সিলেক্ট করুন  <span class="text-danger">*</span></label>
                                                    <select type="area" id="product_size" class="form-select @error('area') is-invalid @enderror" name="product_size">
                                                        @foreach($productsizes as $key=>$value)
                                                        <option value="{{$value->size->sizeName}}">{{$value->size->sizeName}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('product_size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="area">কালার সিলেক্ট করুন <span class="text-danger">*</span></label>
                                                    <select type="area" id="product_color" class="form-select @error('area') is-invalid @enderror" name="product_color">
                                                        @foreach($product_colors as $key=>$value)
                                                        <option value="{{$value->color->colorName}}">{{$value->color->colorName}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('product_color')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="area">আপনার এরিয়া সিলেক্ট করুন  <span class="text-danger">*</span></label>
                                                    <select type="area" id="area" class="form-select @error('area') is-invalid @enderror" name="area">
                                                        @foreach($shippingcharge as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('area')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->

                                            <!-- col-end -->
                                            <div class="col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label for="note">বিস্তারিত নোট থাকলে লিখুন</label>
                                                    <textarea id="note" class="form-control @error('note') is-invalid @enderror" placeholder="এখানে বিস্তারিত নোট লিখে দিতে পারেন, উদঃ কালার: কালো, বডি সাইজ:36, হাতা সাইজ:16, উচ্চতা:48 ইত্যাদি।" name="note" value="{{old('note')}}" cols="10" rows="4"></textarea>
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <button class="order_place" type="submit">অর্ডার কন্ফার্ম করুন </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card end -->
                            </form>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-7 cust-order-1">
                            <div class="cart_details">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="potro_font">পণ্যের বিবরণ </h5>
                                    </div>
                                    <div class="card-body cartlist  table-responsive">
                                        <table class="cart_table table table-bordered table-striped text-center mb-0">
                                            <thead>
                                            <tr>
                                                <th style="width: 20%;">ডিলিট</th>
                                                <th style="width: 40%;">প্রোডাক্ট</th>
                                                <th style="width: 20%;">পরিমাণ</th>
                                                <th style="width: 20%;">মূল্য</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach(Cart::instance('shopping')->content() as $value)
                                                <tr>
                                                    <td>
                                                        <a href="{{route('product',$value->options->slug)}}"><i class="fas fa-trash text-danger"></i></a>
                                                    </td>
                                                    <td class="text-left">
                                                        <a style="font-size: 14px;" href="{{route('product',$value->options->slug)}}"><img src="{{asset($value->options->image)}}" height="30" width="30"> {{Str::limit($value->name,20)}}</a>
                                                    </td>
                                                    <td width="15%" class="cart_qty">
                                                        <div class="qty-cart vcart-qty">
                                                            <div class="quantity">
                                                                <button class="minus cart_decrement"  data-id="{{$value->rowId}}">-</button>
                                                                <input type="text" value="{{$value->qty}}" readonly />
                                                                <button class="plus  cart_increment" data-id="{{$value->rowId}}">+</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>৳{{$value->price*$value->qty}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                <th colspan="3" class="text-end px-4">মোট</th>
                                                <td>
                                                <span id="net_total"><span class="alinur">৳ </span><strong>{{$subtotal}}</strong></span>
                                                </td>
                                                </tr>
                                                <tr>
                                                <th colspan="3" class="text-end px-4">ডেলিভারি চার্জ</th>
                                                <td>
                                                <span id="cart_shipping_cost"><span class="alinur">৳ </span><strong>{{$shipping}}</strong></span>
                                                </td>
                                                </tr>
                                                <tr>
                                                <th colspan="3" class="text-end px-4">সর্বমোট</th>
                                                <td>
                                                <span id="grand_total"><span class="alinur">৳ </span><strong>{{$subtotal+$shipping}}</strong></span>
                                                </td>
                                                </tr>
                                                </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col end -->
                        </div>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </section>

                <div class="row py-4">
                    <div class="col-sm-12">
                        <div class="copyright text-center">
                            <a href="{{route('home')}}" class="my-4 btn btn-danger btn-lg">
                            <svg class="svg-inline--fa fa-hand-point-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hand-point-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M480 96c17.7 0 32 14.3 32 32s-14.3 32-32 32l-208 0 0-64 208 0zM320 288c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32h64zm64-64c0 17.7-14.3 32-32 32H304c-17.7 0-32-14.3-32-32s14.3-32 32-32h48c17.7 0 32 14.3 32 32zM288 384c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32h64zm-88-96l.6 0c-5.4 9.4-8.6 20.3-8.6 32c0 13.2 4 25.4 10.8 35.6C177.9 364.3 160 388.1 160 416c0 11.7 3.1 22.6 8.6 32H160C71.6 448 0 376.4 0 288l0-61.7c0-42.4 16.9-83.1 46.9-113.1l11.6-11.6C82.5 77.5 115.1 64 149 64l27 0c35.3 0 64 28.7 64 64v88c0 22.1-17.9 40-40 40s-40-17.9-40-40V160c0-8.8-7.2-16-16-16s-16 7.2-16 16v56c0 39.8 32.2 72 72 72z"></path></svg>
                                হোম পেইজ
                            </a>

                            <p class="lead">~স্বত্ব © {{ date('Y') }} {{$generalsetting->name}} কর্তৃক সর্বস্বত্ব সংরক্ষিত~</p>
                            <!-- <p class="lead">~Developed By <a href="https://www.codersujon.com/" class="text-primary" target="_blank">CoderS</a>~</p> -->
                        </div>
                    </div>
                </div>
        </section>
       


        <script src="{{ asset('public/frontEnd/campaign/js') }}/jquery-2.1.4.min.js"></script>
        <script src="{{ asset('public/frontEnd/campaign/js') }}/all.js"></script>
        <script src="{{ asset('public/frontEnd/campaign/js') }}/bootstrap.min.js"></script>
        <script src="{{ asset('public/frontEnd/campaign/js') }}/owl.carousel.min.js"></script>
        <script src="{{ asset('public/frontEnd/campaign/js') }}/select2.min.js"></script>
        <script src="{{ asset('public/frontEnd/campaign/js') }}/script.js"></script>
        <!-- bootstrap js -->
        <script>
            $(document).ready(function () {
                $(".owl-carousel").owlCarousel({
                    margin: 15,
                    loop: true,
                    dots: false,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    autoplayHoverPause: true,
                    items: 1,
                    });
                $('.owl-nav').remove();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
        <script>
             $("#area").on("change", function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    data: { id: id },
                    url: "{{route('shipping.charge')}}",
                    dataType: "html",
                    success: function(response){
                        $('.cartlist').html(response);
                    }
                });
            });
        </script>
        <script>
            $(".cart_remove").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.remove')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                $("#loading").hide();
                                return cart_count() + mobile_cart() + cart_summary();
                            }
                        },
                    });
                }
            });
            $(".cart_increment").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.increment')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                $("#loading").hide();
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_decrement").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.decrement')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                $("#loading").hide();
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

        </script>
        <script>
            $('.review_slider').owlCarousel({   
                dots: false,
                arrow: false,
                autoplay: true,
                loop: true,
                margin: 10,
                smartSpeed: 1000,
                mouseDrag: true,
                touchDrag: true,
                items: 6,
                responsiveClass: true,
                responsive: {
                    300: {
                        items: 1,
                    },
                    480: {
                        items: 2,
                    },
                    768: {
                        items: 5,
                    },
                    1170: {
                        items: 5,
                    },
                }
            });
        </script>
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
        <script>
            $('.campro_img_slider').owlCarousel({   
                dots: false,
                arrow: false,
                autoplay: true,
                loop: true,
                margin: 10,
                smartSpeed: 1000,
                mouseDrag: true,
                touchDrag: true,
                items: 3,
                responsiveClass: true,
                responsive: {
                    300: {
                        items: 1,
                    },
                    480: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    1170: {
                        items: 3,
                    },
                }
            });
        </script>

    </body>
</html>
