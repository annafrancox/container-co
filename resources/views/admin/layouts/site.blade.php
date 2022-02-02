<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="icon" href="{{ asset('icon/favicon.png') }}">
        @stack('styles')
    </head>

    <body>
        @include('site.includes.navbar')

        <div class="container mt-5 mb-5" id="wrapper">
            <h1 class="text-center">
                @yield('title')
            </h1>
            @yield('content')
        </div>
        @include('site.includes.footer')

        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
