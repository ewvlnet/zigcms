<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('profile.start')}}" class="app-brand-link"><img src="/site/assets/img/gallery/logo.png"
                                                                         height="45" alt="logo"/></a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
        </li>

        <li class="menu-item">
            <a href="{{route('profile.start')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Start</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{route('profile.mydata.edit', auth()->user())}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Basic">My Data</div>
            </a>
        </li>

        @can('posts')
            <li class="menu-item">
                <a href="{{route('profile.posts.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layer"></i>
                    <div data-i18n="Basic">Posts</div>
                </a>
            </li>
        @endcan
        @can('pages')
            <li class="menu-item">
                <a href="{{route('profile.pages.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Basic">Pages</div>
                </a>
            </li>
        @endcan
        @can('categories')
            <li class="menu-item">
                <a href="{{route('profile.categories.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-category"></i>
                    <div data-i18n="Basic">Categories</div>
                </a>
            </li>
        @endcan
        @can('tags')
            <li class="menu-item">
                <a href="{{route('profile.tags.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-tag"></i>
                    <div data-i18n="Basic">Tags</div>
                </a>
            </li>
        @endcan
        @can('comments')
            <li class="menu-item">
                <a href="{{route('profile.comments.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-comment"></i>
                    <div data-i18n="Basic">Comments</div>
                </a>
            </li>
        @endcan
        @can('replies')
            <li class="menu-item">
                <a href="{{route('profile.replies.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-reply-all"></i>
                    <div data-i18n="Basic">Replies</div>
                </a>
            </li>
        @endcan
        @can('users')
            <li class="menu-item">
                <a href="{{route('profile.users.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-voice"></i>
                    <div data-i18n="Basic">Users</div>
                </a>
            </li>
        @endcan
        @can('settings')
            <li class="menu-item">
                <a href="{{route('profile.settings')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-coffee"></i>
                    <div data-i18n="Basic">Settings</div>
                </a>
            </li>
        @endcan
        @can('profiles')
            <li class="menu-item">
                <a href="{{route('profile.profiles.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-id-card"></i>
                    <div data-i18n="Basic">Profiles</div>
                </a>
            </li>
        @endcan
        @can('permissions')
            <li class="menu-item">
                <a href="{{route('profile.permissions.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-key"></i>
                    <div data-i18n="Basic">Permissions</div>
                </a>
            </li>
        @endcan

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__('Log Out')}}</span>
        </li>
        <li class="menu-item">
            <a href="javascript:;" class="menu-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
                    class="menu-icon tf-icons bx bx-collection"></i> {{ __('Bye Bye') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
</aside>
