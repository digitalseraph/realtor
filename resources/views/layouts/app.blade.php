<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Stack for in-page css -->
    @stack('pre-styles')

    <!-- Styles -->
    <link href="{{ mix('/css/all.css') }}" rel="stylesheet">

    <!-- Stack for in-page css -->
    @stack('post-styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="app">
        @include('layouts.partials._navigation')

        @include('layouts.partials._header')

        @yield('content')
    </div>

    <!-- Stack for in-page scripts -->
    @stack('pre-scripts')

    <!-- Scripts -->
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/all.js') }}"></script>

    <!-- Stack for in-page scripts -->
    @stack('post-scripts')
</body>
</html>
