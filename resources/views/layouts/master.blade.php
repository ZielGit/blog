<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        <!-- Tailwind is included -->
        <link rel="stylesheet" href="{{ asset('admin-one/css/main.css?v=1652870200386') }}">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin-one/apple-touch-icon.png') }}"/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin-one/favicon-32x32.png') }}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-one/favicon-16x16.png') }}"/>

        <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

        {{-- @livewireStyles --}}

        <!-- Scripts -->
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    </head>
    <body>
        <div id="app">

            @include('layouts.navbar')
            
            @include('layouts.sidebar')
            
            @yield('content')
            
            <footer class="footer">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                    <div class="flex items-center justify-start space-x-3">
                        <div>
                            © 2022, JustBoil.me
                        </div>
                    </div>
                </div>
            </footer>
            
        </div>

        {{-- @stack('modals') --}}

        <!-- Scripts below are for demo only -->
        <script type="text/javascript" src="{{ asset('admin-one/js/main.min.js?v=1652870200386') }}"></script>

        {{-- @livewireScripts --}}
    </body>
</html>