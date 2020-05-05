<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title', 'Dv Blog - Kien thuc lap trinh') </title>
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|KoHo:300,300i,400,500,500i,700,700i|Tangerine:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/theme.css/') }}">
    @stack('styles')
    
 
</head>
<body class="{{ Route::currentRouteName() === 'frontend.home' ? 'home' : 'relative' }}">

    @include('frontend.partials.m_menu')
    

    @if( Route::currentRouteName() !== 'frontend.home')
        <svg xmlns="http://www.w3.org/2000/svg" width="826" height="649" viewBox="0 0 826 649" fill="none" style="position: absolute;
                bottom: 0;
                right: 0;" class="z-0">
                <path d="M829.5 655H0C167.54 626.796 142.483 531.22 337.045 437.656C531.608 344.092 529.268 163.692 596.462 92.576C681.488 2.5875 829.5 0 829.5 0V655Z" fill="#35466C"></path>
        </svg>
        <div class="wrapper flex min-h-screen justify-between flex-col pb-5 z-10 relative">

        @include('frontend.includes.header')

    @endif
   
    @yield('content')

    @if( Route::currentRouteName() !== 'frontend.home')
        @include('frontend.includes.footer')
        </div>
    @endif


    <script src="{{ asset('js/frontend/jquery.min.js') }}"></script>
    <script src="{{ asset('js/frontend/app.js') }}"></script>
    @stack('scripts')
</body>
</html>