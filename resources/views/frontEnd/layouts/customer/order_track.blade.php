@extends('frontEnd.layouts.master')
@section('title','Order Track')
@section('content')
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="form-content">
                    <p class="auth-title">অর্ডার ট্রাকিং </p>
                    <form action="{{route('customer.order_track_result')}}"  data-parsley-validate="">
                        <div class="form-group mb-3">
                            <label for="phone">মোবাইল নাম্বার</label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="মোবাইল নাম্বার লিখুন" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="invoice_id">অর্ডার আইডি</label>
                            <input type="number" id="invoice_id" class="form-control @error('invoice_id') is-invalid @enderror" name="invoice_id" value="{{ old('invoice_id') }}" placeholder="অর্ডার আইডি লিখুন">
                            @error('invoice_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <button class="submit-btn">সাবমিট</button>
                        </div>
                     <!-- col-end -->
                     </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{asset('public/frontEnd/')}}/js/parsley.min.js"></script>
<script src="{{asset('public/frontEnd/')}}/js/form-validation.init.js"></script>
@endpush