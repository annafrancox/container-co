<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')
    </head>

    <body class="hold-transition login-page" style="background-color: #EDEDED">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid">
                </a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            var errors = {!! $errors !!}
            $(document).ready(function(){
                $(function () {
                    $('[data-toggle="popover"]').popover({
                        trigger: 'click',
                    });
                });
                $('[data-toggle="tooltip"]').tooltip()
            });
        </script>
        <script src="{{ asset('js/components/error.js')  }}"></script>
        @stack('scripts')
    </body>
</html>
