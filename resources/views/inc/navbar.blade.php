<nav class="navbar is-transparent"  aria-label="main navigation" role="navigation" id="navbar" style="border-bottom: #d3e0e9 1px solid; max-height: 4.5rem">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('home') }}">
                <div class="navbar-item">
                    <img id="imgnavbar" src="{{ asset('images/logonegru.png') }}" style="max-height: 3.5rem;">
                </div>
            </a>
            <div class="navbar-burger burger" data-target="navMenuTransparentExample">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navMenuTransparentExample" class="navbar-menu">

            <div class="navbar-start">
                <a href="#" class="navbar-item is-hoverable is-tab is-hidden-mobile">Learn</a>
                <a href="#" class="navbar-item is-hoverable is-tab is-hidden-mobile">Discuss</a>
                <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
            </div>
            <div class="navbar-end" id="navbar-end">
                @if( !Auth::guest())
                    <div class="navbar-item is-hoverable has-dropdown">
                        <a href="#" class="navbar-link">{{ Auth::user()->name }} </a>

                        <div class="navbar-dropdown">
                            <a href="#" class="navbar-item"><span class="icon"><i class="fa fa-user"></i> </span>&nbsp; Profile</a>
                            <a href="#" class="navbar-item"><span class="icon"><i class="fa fa-comment"></i></span>&nbsp; Notifications</a>
                            <a href="#" class="navbar-item"><span class="icon"><i class="fa fa-cog fa-spin"></i></span>&nbsp; Settings</a>
                            @if(!Auth::user()->hasRole('member'))
                                <a href="{{ route('manage.dashboard') }}" class="navbar-item"><span class="icon"><i class="fa fa-lock"></i></span>&nbsp; Admin Panel</a>
                            @endif
                            <hr class="navbar-divider">

                            <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="icon"><i class="fa fa-sign-out"></i></span>&nbsp; Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="navbar-item is-tab {{ Request::is('login') ? 'is-active' : '' }}">Log in</a>
                    <a href="{{ route('register') }}" class="navbar-item is-tab {{ Request::is('register') ? 'is-active' : '' }}">Join the community</a>
                @endif
            </div>
        </div>
    </div>
</nav>