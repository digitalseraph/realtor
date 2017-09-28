<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    @hasanyrole('super_admin', 'admin')
    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
    @endhasanyrole
</ul>

