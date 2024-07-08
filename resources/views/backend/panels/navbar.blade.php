{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($config['admin.navbarType'])){{$config['admin.navbarClass']}} @endif"
     data-bgcolor="@if(isset($config['admin.navbarBgColor'])){{$config['admin.navbarBgColor']}}@endif">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon bx bx-fullscreen"></i></a></li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#"
                           data-toggle="dropdown">
                            <i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span
                                class="badge badge-pill badge-danger badge-up">0</span></a>

                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name">{{Auth::user()->name}}</span>
                                <span class="user-status text-muted">{{Auth::user()->login}}</span>
                            </div>
                            <span><img class="round"
                                       src=" /b/app-assets/images/portrait/small/avatar-s-11.jpg"
                                       alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">


                            <a class="dropdown-item" href="{{route('logout')}}"><i
                                    class="bx bx-power-off mr-50"></i> Выйти</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
