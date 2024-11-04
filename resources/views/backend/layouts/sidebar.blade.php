<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('logo') }}/logo.png" class="logo-icon" alt="logo icon" width="50px">
        </div>
        <div>
            <h4 class="logo-text">Protfolio</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Home Slide Setup</div>
            </a>
            <ul>
                <li> <a href="{{ route('home.slide') }}"><i class="bx bx-right-arrow-alt"></i>Home Slide</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">About Page Setup</div>
            </a>
            <ul>
                <li> <a href="{{ route('about.page') }}">
                    <i class="bx bx-right-arrow-alt"></i>About Page</a>
                </li>
                <li> <a href="{{ route('about.multi.image') }}">
                    <i class="bx bx-right-arrow-alt"></i>Add Multi Image</a>
                </li>
                <li> <a href="{{ route('all.multi.image') }}">
                    <i class="bx bx-right-arrow-alt"></i>All Multi Image</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('logout') }}">
                <div class="parent-icon"><i class="bx bx-log-out-circle"></i>
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
