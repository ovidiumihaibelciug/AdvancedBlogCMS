<div class="sidemenu">
    <aside class="menu p-l-5 p-r-5">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('manage.dashboard') }}" class="{{ Request::is('manage/dashboard') ? 'is-active' : '' }}">Dashboard</a></li>
        </ul>
        <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li><a href="/manage/users" class="{{ Request::is('manage/users') ? 'is-active' : '' }}">Manage Users</a></li>
            <li><a href="{{route('permissions.index')}}" class="{{ Request::is('manage/permissions') ? 'is-active' : '' }}">Roles &amp; Permissions</a></li>
        </ul>
    </aside>
</div>


