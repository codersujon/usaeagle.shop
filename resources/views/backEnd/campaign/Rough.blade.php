@extends('backEnd.layouts.master')
@section('title','Landing Page Edit')
@section('css')
<link href="{{asset('public/backEnd')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/backEnd')}}/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/backEnd')}}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('campaign.index')}}" class="btn btn-primary rounded-pill">Manage</a>
                </div>
                <h4 class="page-title">Landing Page Edit</h4>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form action="{{route('campaign.update')}}" method="POST" class=row data-parsley-validate=""  enctype="multipart/form-data" name="editForm">
                    @csrf
                    <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">


                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="banner_title" class="form-label">Banner Title *</label>
                            <input type="text" class="form-control @error('banner_title') is-invalid @enderror" name="banner_title" value="{{ $edit_data->banner_title}}"  id="banner_title" required="">
                            @error('banner_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col-end -->

                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="banner" class="form-label">Image</label>
                            <input type="file" class="form-control @error('banner') is-invalid @enderror" name="banner" value="{{ $edit_data->banner }}"  id="banner" >
                            <img src="{{asset($edit_data->banner)}}" alt="" class="edit-image">
                            @error('banner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->

                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="banner_title" class="form-label">Banner Title</label>
                            <input type="text" class="form-control @error('banner_title') is-invalid @enderror" name="banner_title" value="{{ $edit_data->banner_title}}"  id="banner_title">
                            @error('banner_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col-end -->

                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Landing Page Title *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $edit_data->name}}"  id="name" required="">
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
                            <label for="product_id" class="form-label">Products *</label>
                             <select class="select2 form-control  @error('product_id') is-invalid @enderror" value="{{ old('product_id') }}" name="product_id" data-placeholder="Choose ...">
                                <option value="">Select..</option>
                                @foreach($products as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="image_one" class="form-label">Image One</label>
                            <input type="file" class="form-control @error('image_one') is-invalid @enderror" name="image_one" value="{{ $edit_data->image_one }}"  id="image_one" >
                            <img src="{{asset($edit_data->image_one)}}" alt="" class="edit-image">
                            @error('image_one')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-sm-6 mb-3">
                        <label for="image">Review Image *</label>
                        <div class="input-group control-group increment">
                            <input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror" />
                            <div class="input-group-btn">
                                <button class="btn btn-success btn-increment" type="button"><i class="fa fa-plus"></i></button>
                            </div>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="clone hide" style="display: none;">
                            <div class="control-group input-group">
                                <input type="file" name="image[]" class="form-control" />
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product_img">
                            @foreach($edit_data->images as $image)
                            <img src="{{asset($image->image)}}" class="edit-image border" alt="" />
                            <a href="{{route('campaign.image.destroy',['id'=>$image->id])}}" class="btn btn-xs btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- col end -->

                    <div class="col-sm-6">
                        <div class="form-group mb-3">
                            <label for="review" class="form-label">Review *</label>
                            <input type="text" class="form-control @error('review') is-invalid @enderror" name="review" value="{{ $edit_data->review}}"  id="review" required="">
                            @error('review')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col-end -->
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea name="short_description"  rows="6" class="summernote form-control @error('short_description') is-invalid @enderror">{{$edit_data->short_description}}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->

                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description"  rows="6" class="summernote form-control @error('description') is-invalid @enderror">{{$edit_data->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->

                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="status" class="d-block">Status</label>
                            <label class="switch">
                                <input type="checkbox" value="1" name="status" @if($edit_data->status==1)checked @endif>
                                <span class="slider round"></span>
                            </label>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    <div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>

                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
   </div>
</div>
@endsection



@section('script')
<script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-pickers.init.js"></script>
<!-- Plugins js -->
<script src="{{asset('public/backEnd/')}}/assets/libs//summernote/summernote-lite.min.js"></script>
<script>
  $(".summernote").summernote({
    placeholder: "Enter Your Text Here",
  });
</script>
<script type="text/javascript">
    document.forms['editForm'].elements['product_id'].value="{{$edit_data->product_id}}"
    $('.select2').select2();
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-increment").click(function () {
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click", ".btn-danger", function () {
            $(this).parents(".control-group").remove();
        });
        $('.select2').select2();
    });
</script>
@endsection


<section style="background: url('{{ asset($campaign_data->image_one)}} '); background-repeat: no-repeat; background-size:cover; background-position: center;" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="campaign_image">
                    <div class="campaign_item">
                        <div class="banner_t">
                            <h2>{{ $campaign_data->name }}</h2>
                            <a href="#order_form" class="cam_order_now" id="cam_order_now"><i class="fa-solid fa-cart-shopping"></i> অর্ডার করুন </a>
                            <!-- <p class="megaoffer_btn">মেগা অফার 1000 Tk টাকা</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cont_inner">
                            <div class="cont_num">
                                <h2>আমাদের থেকে বিস্তারিত জানতে এই নাম্বারে কল করুন</h2>
                                <a href="tel:{{$contact->phone}}">{{$contact->phone}}</a>
                            </div>
                            <div class="discount_inn">
                                <h2>
                                    @if($product->old_price)
                                    <del>{{$campaign_data->name}} এর আগের দাম {{$product->old_price}}/=</del>
                                    @endif
                                    <p>{{$campaign_data->name}} এর বর্তমান দাম {{$product->new_price}}/=</p>
                                </h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="rules_sec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="rules_inner">

                            <div class="rules_item">
                                <div class="rules_head">
                                    <h2>মধুময় বাদাম খাওয়ার উপকারিতা</h2>
                                    <div class="rules_des">
                                        <ul>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="rules_item">
                                <div class="rules_head">
                                    <h2>মধুময় বাদাম খাওয়ার নিয়ম</h2>
                                    <div class="rules_des">
                                        <ul>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                            <li>কোষ্ঠকাঠিন্য (কষা) দূর করতে সাহায্য করে,</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="campro_inn">
                            <div class="campro_head">
                                <h2>হানি নাট (মধু ও বাদাম)</h2>
                            </div>

                            <div class="campro_img_slider owl-carousel">
                               <div class="campro_img_item">
                                   <img src="{{asset($campaign_data->image_one)}}" alt="">
                               </div> 
                               <div class="campro_img_item">
                                   <img src="{{asset($campaign_data->image_one)}}" alt="">
                               </div> 
                               <div class="campro_img_item">
                                   <img src="{{asset($campaign_data->image_one)}}" alt="">
                               </div> 
                            </div>
                            <div class="col-sm-12">
                                <div class="ord_btn">
                                    <a href="#order_form" class="cam_order_now" id="cam_order_now"> অর্ডার করতে ক্লিক করুন <i class="fa-solid fa-hand-point-right"></i> </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="why_choose_sec">
            <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                      <div class="why_choose_inn">
                          <div class="why_choose">
                              <div class="why_choose_head">
                                <h2>আমাদের উপর কেন আস্থা রাখবেন ??</h2>
                              </div>
                              <div class="why_choose_midd">
                                  <div class="why_choose_widget">
                                      <ul>
                                          <li>
                                              এই মধু প্রাকৃতিক চাক থেকে সংগৃহীত।
                                          </li>
                                          <li>
                                              এই মধু প্রাকৃতিক চাক থেকে সংগৃহীত।
                                          </li>
                                          <li>
                                              এই মধু প্রাকৃতিক চাক থেকে সংগৃহীত।
                                          </li>
                                          <li>
                                              এই মধু প্রাকৃতিক চাক থেকে সংগৃহীত।
                                          </li>
                                          <li>
                                              এই মধু প্রাকৃতিক চাক থেকে সংগৃহীত।
                                          </li>
                                          <li>
                                              এই মধু প্রাকৃতিক চাক থেকে সংগৃহীত।
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="why_choose_widget">
                                      <div class="why_img">
                                          <img src="{{asset('frontEnd/campaign')}}/images/honey.png" alt="">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </section>
        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="rev_inn">
                            <div class="border_line"></div>
                            <div class="review_slider owl-carousel">
                            @foreach($campaign_data->images as $key=>$value)
                            <div class="review_item">
                                <img src="{{asset($value->image)}}" alt="">
                            </div>
                            @endforeach
                           </div>
                            <div class="col-sm-12">
                                <div class="ord_btn">
                                    <a href="#order_form" class="cam_order_now" id="cam_order_now"> অর্ডার করতে ক্লিক করুন <i class="fa-solid fa-hand-point-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                                            <label for="name">আপনার নাম লিখুন * </label>
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="নাম" required>
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
                                            <label for="phone">আপনার মোবাইল লিখুন *</label>
                                            <input type="number" minlength="11" id="number" maxlength="11" pattern="0[0-9]+" title="please enter number only and 0 must first character" title="Please enter an 11-digit number." id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="+৮৮ বাদে ১১ সংখ্যা "  required>
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
                                            <label for="address">আপনার ঠিকানা লিখুন   *</label>
                                            <input type="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="জেলা, থানা, গ্রাম " name="address" value="{{old('address')}}"  required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="area">আপনার এরিয়া সিলেক্ট করুন  *</label>
                                            <select type="area" id="area" class="form-control @error('area') is-invalid @enderror" name="area"   required>
                                                @foreach($shippingcharge as $key=>$value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- col-end -->
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