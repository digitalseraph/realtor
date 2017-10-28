<!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    @guest
    @else
        @hasanyrole('user', 'web')
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="{{ route('pages.index') }}">Pages</a></li>
            </ul>
        @endhasanyrole
    @endguest
</ul>
