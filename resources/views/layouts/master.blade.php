<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{config('app.name', 'Laravel')}}</title>
<link rel="stylesheet" href="{{elixir("css/app.css")}}">
    <meta charset="UTF-8">
    @yield('style')
    <title>laravel</title>
</head>
<body id="app-layout">
    @include('layouts.partial.navigation')
   
    <div class="container"> 
    @yield('content')
   </div>
   
   @include('layouts.partial.footer')


@yield('script')
</body>
</html>