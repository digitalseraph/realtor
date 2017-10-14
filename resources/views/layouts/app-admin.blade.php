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
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app-admin">

        {{-- @include('layouts.partials._navigation') --}}
        <div class="wrapper">

          <!-- Main Header -->
          @include('layouts.admin-lte.partials._header')

          <!-- Left side column. contains the logo and sidebar -->
          @include('layouts.admin-lte.partials._sidebar')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('layouts.admin-lte.partials._page-header')

            <!-- Main content -->
            <section class="content container-fluid">

                @yield('content')

                @include('debug')

            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

          <!-- Main Footer -->
          @include('layouts.admin-lte.partials._footer')

          <!-- Control Sidebar -->
          @include('layouts.admin-lte.partials._sidebar-control')
          
        </div>
        <!-- ./wrapper -->

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
