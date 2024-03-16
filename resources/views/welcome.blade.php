<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} - Welcome</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <style>
    /* Global styles */
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #b1b1b1; /* Light gray background */
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh; /* Ensure full viewport height */
    }

    .content {
      text-align: center;
      padding: 40px;
      border-radius: 5px;
      background-color: #fff; /* White content area */
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .title {
      font-size: 32px;
      margin-bottom: 20px;
      color: #333; /* Darker text for title */
    }

    p {
      font-size: 16px;
      color: #666; /* Lighter text for paragraph */
      margin-bottom: 20px;
    }

    a {
      display: inline-block;
      padding: 10px 20px;
      font-size: 14px;
      text-decoration: none; /* Remove underline */
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #c30303; /* Blue button */
      color: #fff; /* White text for blue button */
    }

    .btn-primary:hover{
        background-color: #8a0000; /* Darker blue */
    }

    .btn-secondary {
      background-color: #6c757d; /* Gray button */
      color: #fff; /* White text for gray button */
      margin-left: 10px; /* Spacing between buttons */
    }

    .btn-secondary:hover{
        background-color: #666
    }

  </style>

</head>
<body>
  <div class="container">
    <div class="content text-center">
      <div class="title m-b-md">
        {{ config('app.name') }}
      </div>

      <p>Login or Register to Post Your'e IDEAS</p>

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
