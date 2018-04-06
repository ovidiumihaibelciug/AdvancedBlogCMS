@include('inc.head')
    @include('inc.navbar')
    @include('inc.dashboard.sidemenu')
    <div id="app" class="management-area">
        @yield('content')
    </div>
@include('inc.footer_manage')
