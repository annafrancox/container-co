<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>CONTAINER.CO</title>     
        <link rel="icon" type="imagem/png" href="{{ asset('img/sidebar-logo-fechada.png') }}" />
        @stack('styles')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed" style="min-width:500px">
        <div class="wrapper">
            @include('admin.includes.navbar')
            @include('admin.includes.sidebar')
            @include('admin.includes.success')
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12 text-center">
                                <h1>
                                    @yield('title')
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div id="app" class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('admin.includes.footer')
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
        <script src="{{ asset('js/components/responsiveSidebar.js')  }}"></script>
        {{-- <script src="{{ asset('js/components/ajaxWatch.js')  }}"></script
        <script>
            $(document).ajaxWatch('.ajaxWatch', true, function(){
                $(".ajaxWatch").closest('.deletable').slice(0).remove();
            });
        </script> --}}
        @stack('scripts')
    </body>

</html>
