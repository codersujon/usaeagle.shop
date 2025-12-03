@extends('layouts.app')

@section('content')
<style>
    
    html,
    body {
        height: 100%;
        overflow-y: scroll;
    }

    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        overflow-y: scroll;
    }

    .form-signin {
        width: 100%;
        min-width: 400px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .btn-theme {
        color: #fff;
        background-color: #961d9e;
        border-color: #961d9e;
    }

    .btn-theme:hover{
        color: #fff;
        text-decoration: none;
    }

    .btn-theme:focus{
        box-shadow: 0 0 0 .2rem rgba(150, 29, 158, .25)

    }

</style>

<div class="row justify-content-center">

    <form class="form-signin text-center bg-white py-5 px-4 rounded" method="POST" action="{{ route('login') }}">
        @csrf

        <h1 class="h2 mb-4">{{ __('এ্যাডমিন লগইন') }}</h1>

        <div class="form-group m-0">
            <label for="email" class="sr-only">{{ __('ইমেইল') }}</label>
            <input  placeholder="ইমেইল লিখুন" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group m-0">
            <label for="password" class="sr-only">{{ __('পাসওয়ার্ড') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="পাসওয়ার্ড">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
       
        <div class="form-check text-left my-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('পাসওয়ার্ড মনে রাখুন') }}
            </label>
        </div>

        <button class="btn btn-lg btn-theme btn-block" type="submit">{{ __('লগইন') }}</button>

    </form>

</div>
@endsection
