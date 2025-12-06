@extends('layouts.app')

@section('content')

<div class="login-card">
    <div class="login-header">
        <div class="logo">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <circle cx="16" cy="16" r="16" fill="#1DB954"/>
                <path d="M12 10l8 6-8 6V10z" fill="white"/>
            </svg>
        </div>
        <h1>{{ __('এ্যাডমিন লগইন') }}</h1>
    </div>
    
    <form class="usalogin-form" id="usaloginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">{{ __('ইমেইল') }}</label>
              <input  placeholder="ইমেইল লিখুন" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="error-message" id="emailError">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('পাসওয়ার্ড') }}</label>
            <div class="password-wrapper">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="পাসওয়ার্ড">
            </div>
           
            @error('password')
                <span class="error-message" id="passwordError">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-options">
            <label class="checkbox-wrapper" for="remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="checkmark"></span>
               {{ __('পাসওয়ার্ড মনে রাখুন') }}
            </label>
        </div>

        <button type="submit" class="login-btn">
            <span class="btn-text">{{ __('লগইন') }}</span>
            <div class="btn-loader">
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
            </div>
        </button>
    </form>

</div>

@endsection
