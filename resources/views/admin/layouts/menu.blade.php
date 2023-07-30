<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('super_admin.dashboard') }}" title="Dashboard ">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name text-truncate">Blogging </span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">
            <ul class="nav sidebar-inner" id="sidebar-menu">
                {{-- =================================================== --}}
                {{-- ==================== Dashboard==================== --}}
                {{-- =================================================== --}}
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('super_admin.dashboard') }}">
                        <span class="nav-text" style="font-size: 10pt;"> Dashboard</span>
                    </a>
                </li>
                {{-- =================================================== --}}
                {{-- ==================== Users ==================== --}}
                {{-- =================================================== --}}
                @if (auth()->user()->role == 'Admin')

                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('super_admin.users-index') }}">
                        <span class="nav-text" style="font-size: 10pt;">Users</span>
                    </a>
                </li>
                @endif
                {{-- =================================================== --}}
                {{-- ==================== categories ==================== --}}
                {{-- =================================================== --}}
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('super_admin.categories-index') }}">
                        <span class="nav-text" style="font-size: 10pt;">Categories</span>
                    </a>
                </li>
                {{-- =================================================== --}}
                {{-- ==================== blogs ==================== --}}
                {{-- =================================================== --}}
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('super_admin.blogs-index') }}">
                        <span class="nav-text" style="font-size: 10pt;">Blogs</span>
                    </a>
                </li>
                {{-- =================================================== --}}
                {{-- ================  Admin Settings ================= --}}
                {{-- =================================================== --}}
                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#Admin_setting" aria-expanded="false" aria-controls="Admin_setting">
                        <span class="nav-text" style="font-size: 10pt;">System Settings </span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="Admin_setting" data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            {{-- =================================================== --}}
                            {{-- ===================== Logout ====================== --}}
                            {{-- =================================================== --}}
                            <li class="active">
                                <a class="sidenav-item-link" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="nav-text" style="font-size: 9pt;"> Logout </span>
                                    <form id="logout-form" action="{{ route('super_admin.logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</aside>
