<div class="side-menu" id="side-manage">
    <aside class="menu m-t-30 m-l-10">
        <p class="menu-label">{{ __('General') }}</p>
        <ul class="menu-list">
            <li><a href="{{ route('manage.dashboard') }}">{{ __('Dashboard') }}</a></li>
        </ul>
        <p class="menu-label">Content</p>
        <ul class="menu-list">
            <li class="has-submenu">
                <a href="#" class="{{Request::is('manage/posts*') ? 'is-active' : ''}}">Blog posts</a>
                <ul class="menu-list submenu">
                    <li><a class="{{Route::currentRouteName() == 'posts.index' ? 'is-active' : ''}}" href="{{ route('posts.index') }}">All posts</a></li>
                    <li><a class="{{Route::currentRouteName() == 'posts.create' ? 'is-active' : ''}}" href="{{ route('posts.create') }}">New posts</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#" class="{{Request::is('manage/categories*') ? 'is-active' : ''}}">Categories</a>
                <ul class="menu-list submenu">
                    <li><a class="{{Route::currentRouteName() == 'categories.index' ? 'is-active' : ''}}" href="{{ route('categories.index') }}">All categories</a></li>
                    <li><a class="{{Route::currentRouteName() == 'categories.create' ? 'is-active' : ''}}" href="{{ route('categories.create') }}">New category</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('tags.index') }}" class="{{Request::is('manage/tag*') ? 'is-active' : ''}}">Tags</a>
              
            </li>
            <li>
                <a href="{{ route('media.index') }}" class="{{Request::is('manage/media*') ? 'is-active' : ''}}">Media</a>
              
            </li>
        </ul>
        <p class="menu-label">Administration</p>
        <ul class="menu-list">
            <li><a href="{{ route('user.index') }}">Manage Users</a></li>
            <li class="has-submenu">
                <a href="#" class="{{Request::is('manage/permission*') ? 'is-active' : ''}}{{Request::is('manage/role*') ? 'is-active' : ''}}">Roles &amp; Permissions</a>
                <ul class="menu-list submenu">
                    <li><a class="{{Route::currentRouteName() == 'permission.index' ? 'is-active' : ''}}" href="{{ route('permission.index') }}">Permissions</a></li>
                    <li><a class="{{Route::currentRouteName() == 'role.index' ? 'is-active' : ''}}" href="{{ route('role.index') }}">Roles</a></li>
                </ul>
            </li>

            <li class="has-submenu">
                <a href="#">More menu</a>
                <ul class="menu-list submenu">
                    <li><a href="#">sub menu 1</a></li>
                    <li><a href="#">sub menu 2</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#">More config</a>
                <ul class="menu-list submenu">
                    <li><a href="#">sub menu 1</a></li>
                    <li><a href="#">sub menu 2</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>