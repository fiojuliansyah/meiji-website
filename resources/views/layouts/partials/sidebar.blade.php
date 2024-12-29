<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            @if ($general && $general->logo)
                <img src="{{ asset('storage/' . $general->logo) ?? '' }}" class="logo-icon" alt="logo icon">
            @endif
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @can('view-dashboard')
        <li>
            <a href="{{ localized_route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i></div>
                <div class="menu-title">{{ translate('Dashboard') }}</div>
            </a>
        </li>
        @endcan
        @can('view-homepages')
            <li>
                <a href="{{ localized_route('homepages.index') }}">
                    <div class="parent-icon"><i class='bx bx-home'></i></div>
                <div class="menu-title">{{ translate('Home Page') }}</div>
                </a>
            </li>
        @endcan
        @can('list-sliders')
        <li>
            <a href="{{ localized_route('sliders.index') }}">
                <div class="parent-icon"><i class='bx bx-image-add'></i></div>
                <div class="menu-title">{{ translate('Sliders') }}</div>
            </a>
        </li>
        @endcan

        @canany(['list-abouts', 'list-timelines'])
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-buildings'></i></div>
                <div class="menu-title">{{ translate('Abouts') }}</div>
            </a>
            <ul>
                @can('list-abouts')
                <li>
                    <a href="{{ localized_route('abouts.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('Abouts') }}
                    </a>
                </li>
                @endcan
                @can('list-timelines')
                <li>
                    <a href="{{ localized_route('timelines.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('Timelines') }}
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany

        @canany(['list-news_categories', 'list-news'])
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-news'></i></div>
                <div class="menu-title">{{ translate('News') }}</div>
            </a>
            <ul>
                @can('list-news_categories')
                <li>
                    <a href="{{ localized_route('news_categories.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('Categories') }}
                    </a>
                </li>
                @endcan
                @can('list-news')
                <li>
                    <a href="{{ localized_route('news.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('News') }}
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany

        @can('list-randds')
        <li>
            <a href="{{ localized_route('randds.index') }}">
                <div class="parent-icon"><i class='bx bx-award'></i></div>
                <div class="menu-title">{{ translate('R&D') }}</div>
            </a>
        </li>
        @endcan

        @can('list-activities')
        <li>
            <a href="{{ localized_route('activities.index') }}">
                <div class="parent-icon"><i class='bx bx-rocket'></i></div>
                <div class="menu-title">{{ translate('Activities') }}</div>
            </a>
        </li>
        @endcan

        @can('list-faqs')
        <li>
            <a href="{{ localized_route('faqs.index') }}">
                <div class="parent-icon"><i class='bx bx-detail'></i></div>
                <div class="menu-title">{{ translate('Faqs') }}</div>
            </a>
        </li>
        @endcan

        @canany(['list-generals', 'list-languages', 'list-users', 'list-roles'])
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">{{ translate('Settings') }}</div>
            </a>
            <ul>
                @can('view-generals')
                <li>
                    <a href="{{ localized_route('generals.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('General') }}
                    </a>
                </li>
                @endcan
                @can('list-languages')
                <li>
                    <a href="{{ localized_route('languages.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('Language') }}
                    </a>
                </li>
                @endcan
                @can('list-users')
                <li>
                    <a href="{{ localized_route('users.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('Users') }}
                    </a>
                </li>
                @endcan
                @can('list-roles')
                <li>
                    <a href="{{ localized_route('roles.index') }}">
                        <i class="bx bx-right-arrow-alt"></i>{{ translate('Role & Permission') }}
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcanany
    </ul>
</div>
