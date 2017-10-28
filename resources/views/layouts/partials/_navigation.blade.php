<nav class="navbar @hasanyrole('super_admin|admin', 'admin') navbar-inverse @else navbar-default @endhasanyrole navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                
                @hasanyrole('super_admin|admin', 'admin')
                    {{ config('app.name', 'Laravel') }} Admin
                @else
                    {{ config('app.name', 'Laravel') }}
                @endhasanyrole
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @include('layouts.partials.navigation._left')

            @include('layouts.partials.navigation._right')
        </div>
    </div>
</nav>
