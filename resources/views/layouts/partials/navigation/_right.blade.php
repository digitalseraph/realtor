<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('admin.login') }}">Admin Login</a></li>
    @else

        @hasanyrole('super_admin|admin', 'admin')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::guard('admin')->user()->name }} (admin) <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('admin-logout-form').submit();">
                            Logout
                        </a>

                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endhasanyrole
        @hasanyrole('user', 'web')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endhasanyrole
    @endguest
</ul>
