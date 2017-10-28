<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @guest('admin')
        <li><a href="{{ route('admin.login') }}">Admin Login</a></li>
    @else
        @include('layouts.partials.navigation.right._admin')
    @endguest

    @guest
        <li><a href="{{ route('login') }}">User Login</a></li>
    @else
        @include('layouts.partials.navigation.right._user')
    @endguest
</ul>
