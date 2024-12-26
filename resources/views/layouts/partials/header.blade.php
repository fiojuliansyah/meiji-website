<header>
    <div class="topbar d-flex align-items-center dash-header">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu-left d-none d-lg-block">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="app-emailbox.html"><i class='bx bx-envelope'></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="app-chat-box.html"><i class='bx bx-message'></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="app-fullcalender.html"><i class='bx bx-calendar'></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="app-to-do.html"><i class='bx bx-check-square'></i></a>
                </li>
            </ul>
           </div>
            {{-- <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <form>
                      <input type="text" class="form-control search-control" autofocus placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                       <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                    </form>
                </div>
            </div> --}}
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">8</span>
                            <i class='bx bx-translate'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list">
                                <form method="POST" action="{{ route('change-language', ['lang' => app()->getLocale()]) }}">
                                    @csrf
                                    @foreach(App\Models\Language::all() as $language)
                                        <button type="submit" class="dropdown-item" name="lang" value="{{ $language->code }}">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="/assets/images/flags/{{ $language->code }}.png" class="msg-avatar" alt="{{ $language->name }}">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">{{ $language->name }}</h6>
                                                </div>
                                            </div>
                                        </button>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">Pauline Seitz</p>
                        <p class="designattion mb-0">Web Designer</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'></i><span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>