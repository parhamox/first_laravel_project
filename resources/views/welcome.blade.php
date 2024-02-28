<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="content text-center">
            <div class="title m-b-md">
                {{ config('app.name') }}
            </div>

            <p>Welcome to your Laravel application!</p>

            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            @endif
        </div>
    </div>
</body>
</html>
