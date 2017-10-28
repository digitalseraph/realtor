@hasanyrole('super_admin|admin', 'admin')
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Admin Menu <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">

                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-submenu-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::guard('admin')->user()->email }} <span class="caret"></span>
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

                <li role="separator" class="divider"></li>

                <li><a href="{{ route('admin.home') }}">Dashboard</a></li>

                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-submenu-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Accounts <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                        @role('super_admin', 'admin')
                            <li><a href="{{ route('admin.admins.index') }}">Admins</a></li>
                        @endrole
                    </ul>
                </li>

                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-submenu-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Content <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('pages.index') }}">Pages</a></li>
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
@endhasanyrole
