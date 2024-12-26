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
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">{{ translate('Dashboard') }}</div>
            </a>
        </li>
        <li>
            <a href="{{ route('languages.index') }}">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">{{ translate('Language') }}</div>
            </a>
        </li>
    </ul>
</div>