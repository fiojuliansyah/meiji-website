<!--! ================================================================ !-->
<!--! [Start] Navigation Manu !-->
<!--! ================================================================ !-->
<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{route('dashboard')}}" class="b-brand">
                <!-- ========   change your logo here   ============ -->
                <img src="{{ asset('storage/' . $general->logo) }}" alt="" class="logo logo-lg" />
                <img src="{{ asset('storage/' . $general->logo) }}" alt="" class="logo logo-sm" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <!-- Navigation Caption -->
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>

                <!-- Dashboard Menu -->
                @can('view-dashboard')
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ localized_route('dashboard') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-airplay"></i></span>
                        <span class="nxl-mtext">{{ translate('Dashboard') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Home Page Menu -->
                @can('view-homepages')
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ localized_route('homepages.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-home"></i></span>
                        <span class="nxl-mtext">{{ translate('Home Page') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Sliders Menu -->
                @can('list-sliders')
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ localized_route('sliders.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-image"></i></span>
                        <span class="nxl-mtext">{{ translate('Sliders') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Abouts and Timelines Menu -->
                @canany(['list-abouts', 'list-timelines'])
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-file-text"></i></span>
                        <span class="nxl-mtext">{{ translate('Abouts') }}</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        @can('list-abouts')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('abouts.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Abouts') }}
                            </a>
                        </li>
                        @endcan
                        @can('list-timelines')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('timelines.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Timelines') }}
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                <!-- News Categories and News Menu -->
                @canany(['list-news_categories', 'list-news'])
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-cast"></i></span>
                        <span class="nxl-mtext">{{ translate('News') }}</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        @can('list-news_categories')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('news_categories.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Categories') }}
                            </a>
                        </li>
                        @endcan
                        @can('list-news')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('news.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('News') }}
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                <!-- Products Categories and Products Menu -->
                @canany(['list-categories', 'list-products'])
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-package"></i></span>
                        <span class="nxl-mtext">{{ translate('Products') }}</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        @can('list-categories')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('categories.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Categories') }}
                            </a>
                        </li>
                        @endcan
                        @can('list-products')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('products.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Products') }}
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                <!-- R&D Menu -->
                @can('list-randds')
                <li class="nxl-item">
                    <a href="{{ localized_route('randds.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-award"></i></span>
                        <span class="nxl-mtext">{{ translate('R&D') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Activities Menu -->
                @can('list-activities')
                <li class="nxl-item">
                    <a href="{{ localized_route('activities.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-sunrise"></i></span>
                        <span class="nxl-mtext">{{ translate('Activities') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Faqs Menu -->
                @can('list-faqs')
                <li class="nxl-item">
                    <a href="{{ localized_route('faqs.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-info"></i></span>
                        <span class="nxl-mtext">{{ translate('Faqs') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Contact Menu -->
                @can('view-contacts')
                <li class="nxl-item">
                    <a href="{{ localized_route('contacts.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-mail"></i></span>
                        <span class="nxl-mtext">{{ translate('Contact') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Visitor Menu -->
                @can('view-visitors')
                <li class="nxl-item">
                    <a href="{{ localized_route('visitors.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-eye"></i></span>
                        <span class="nxl-mtext">{{ translate('Visitor') }}</span>
                    </a>
                </li>
                @endcan

                <!-- Settings Menu -->
                @canany(['list-generals', 'list-languages', 'list-users', 'list-roles'])
                <li class="nxl-item nxl-hasmenu">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-settings"></i></span>
                        <span class="nxl-mtext">{{ translate('Settings') }}</span>
                        <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        @can('view-generals')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('generals.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('General') }}
                            </a>
                        </li>
                        @endcan
                        @can('list-languages')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('languages.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Language') }}
                            </a>
                        </li>
                        @endcan
                        @can('list-users')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('users.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Users') }}
                            </a>
                        </li>
                        @endcan
                        @can('list-roles')
                        <li class="nxl-item">
                            <a class="nxl-link" href="{{ localized_route('roles.index') }}">
                                <i class="bx bx-right-arrow-alt"></i>{{ translate('Role & Permission') }}
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </div>
    </div>
</nav>
<!--! ================================================================ !-->
<!--! [End] Navigation Manu !-->
<!--! ================================================================ !-->
