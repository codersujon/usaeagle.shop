<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('login/style.css') }}">
</head>
<body>

    <div class="login-container">
        @yield('content')
    </div>

    <script src="{{ asset('login/form-utils.js') }}"></script>
</body>
</html>