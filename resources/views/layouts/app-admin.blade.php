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
    <link href="{{ mix('/assets/css/all-admin.css') }}" rel="stylesheet">

    <!-- Stack for in-page css -->
    @stack('post-styles')

    <!-- HTML5 Shim and Respond.js -->
    @include('layouts.partials._shim')
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <!-- AdminLTE .wrapper and Vue.js #app-admin -->
    <div id="app-admin" class="wrapper">

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

                <!-- Page content -->
                @yield('content')

                {{-- Debug Container --}}
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
    <!-- /#app-admin /.wrapper -->

    <!-- Stack for in-page scripts -->
    @stack('pre-scripts')

    <!-- Scripts -->
    <script src="{{ mix('/assets/js/manifest.js') }}"></script>
    <script src="{{ mix('/assets/js/vendor.js') }}"></script>
    <script src="{{ mix('/assets/js/all-admin.js') }}"></script>

    <!-- Stack for in-page scripts -->
    @stack('post-scripts')
</body>
</html>
