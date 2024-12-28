<div class="sidebar-wrapper" data-simplebar="false">
    <div class="sidebar-header">
        <div>
            <img src="/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Meiji</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ localized_route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">{{ translate('Dashboard') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ localized_route('sliders.index') }}">
                <div class="parent-icon"><i class='bx bx-image-add'></i>
                </div>
                <div class="menu-title">{{ translate('Sliders') }}</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-buildings' ></i>
                </div>
                <div class="menu-title">{{ translate('Abouts') }}</div>
            </a>
            <ul>
                <li> <a href="{{ localized_route('abouts.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Abouts') }}</a>
                </li>
                <li> <a href="{{ localized_route('timelines.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Timelines') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-news' ></i>
                </div>
                <div class="menu-title">{{ translate('News') }}</div>
            </a>
            <ul>
                <li> <a href="{{ localized_route('news_categories.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Categories') }}</a>
                </li>
                <li> <a href="{{ localized_route('news.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('News') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-package' ></i>
                </div>
                <div class="menu-title">{{ translate('Products') }}</div>
            </a>
            <ul>
                <li> <a href="{{ localized_route('categories.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Categories') }}</a>
                </li>
                <li> <a href="{{ localized_route('products.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Product') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ localized_route('randds.index') }}">
                <div class="parent-icon"><i class='bx bx-award'></i>
                </div>
                <div class="menu-title">{{ translate('R&D') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ localized_route('activities.index') }}">
                <div class="parent-icon"><i class='bx bx-rocket'></i>
                </div>
                <div class="menu-title">{{ translate('Activities') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ localized_route('faqs.index') }}">
                <div class="parent-icon"><i class='bx bx-detail'></i>
                </div>
                <div class="menu-title">{{ translate('Faqs') }}</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-id-card' ></i>
                </div>
                <div class="menu-title">{{ translate('Contacts') }}</div>
            </a>
            <ul>
                <li> <a href="{{ localized_route('contacts.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Page') }}</a>
                </li>
                <li> <a href="{{ localized_route('products.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Product') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cog' ></i>
                </div>
                <div class="menu-title">{{ translate('Settings') }}</div>
            </a>
            <ul>
                <li>
                    <a href="{{ localized_route('generals.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('General') }}</a>
                </li>
                <li>
                    <a href="{{ localized_route('languages.index') }}"><i class="bx bx-right-arrow-alt"></i>{{ translate('Language') }}</a>
                </li>
            </ul>
        </li>
    </ul>
</div>