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
    <link href="{{ mix('/css/all-admin.css') }}" rel="stylesheet">

    <!-- Stack for in-page css -->
    @stack('post-styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition lockscreen">
    <div id="app-admin">

        <!-- Automatic element centering -->
        <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <a href="{{ route('welcome') }}"><b>{{ config('app.name', 'Laravel') }}</b>Admin</a>
            </div>

            @yield('content')

            <div class="help-block text-center">
                Enter your password to retrieve your session
            </div>
            <div class="text-center">
                <a href="{{ route('admin.login') }}">Or sign in as a different user</a>
            </div>
            <div class="lockscreen-footer text-center">
                <strong>Copyright &copy; {{ date('Y') }} <a href="#">Company</a>.</strong><br />
                All rights reserved.
            </div>
        </div>
        <!-- /.center -->

    </div>
    <!-- #app-admin -->

    <!-- Stack for in-page scripts -->
    @stack('pre-scripts')

    <!-- Scripts -->
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/all-admin.js') }}"></script>

    <!-- Stack for in-page scripts -->
    @stack('post-scripts')
</body>
</html>
