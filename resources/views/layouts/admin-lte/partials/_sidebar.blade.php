@php
    $routePrefix = $globalComposer['routePrefix'];
    $routeName = $globalComposer['routeName'];
    $routeNameArr =$globalComposer['routeNameArray'];
@endphp
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/vendor/admin-lte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->fullName() }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MANAGE</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="@if(Route::currentRouteName() == 'admin.home') active @endif">
                <a href="{{ route('admin.home') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview @if(strpos($routeName, 'admin.users') !== false) active @endif ">
                <a href="#"><i class="fa fa-link"></i> <span>Users</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Route::currentRouteName() == 'admin.users.index') active @endif "><a href="{{ route('admin.users.index') }}">Index</a></li>
                    <li class="@if(Route::currentRouteName() == 'admin.users.create') active @endif "><a href="{{ route('admin.users.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="treeview @if(strpos($routeName, 'admin.admins') !== false) active @endif ">
                <a href="#"><i class="fa fa-link"></i> <span>Admins</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Route::currentRouteName() == 'admin.admins.index') active @endif "><a href="{{ route('admin.admins.index') }}">Index</a></li>
                    <li class="@if(Route::currentRouteName() == 'admin.admins.create') active @endif "><a href="{{ route('admin.admins.create') }}">Create</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
