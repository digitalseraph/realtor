<!-- Left Side Of Navbar -->
@hasanyrole('super_admin|admin', 'admin')
    <ul class="nav navbar-nav">
        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
        @role('super_admin', 'admin')
            <li><a href="{{ route('admin.admins.index') }}">Admins</a></li>
        @endrole
    </ul>
@endhasanyrole

@hasanyrole('user', 'web')
    <ul class="nav navbar-nav">
        <li><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
@endhasanyrole

