<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{ route('home') }}" class="sub-menu-item">Home</a></li>
                <li><a href="{{ route('news') }}" class="sub-menu-item blink">News</a></li>
                <li><a href="{{ route('blogs') }}" class="sub-menu-item">Blog</a></li>
                <li><a href="{{ route('vlogs') }}" class="sub-menu-item">Vlog</a></li>
                <li><a href="{{ route('gallery') }}" class="sub-menu-item">Gallery</a></li>
                <li><a href="{{ route('home') }}"><img src="{{ asset('logo.png') }}" class="l-light" width="90px" alt=""></a></li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Board</a>
                    <ul class="submenu">
                        <li><a href="{{ route('bodla.pvt') }}" class="sub-menu-item">Bodla PVT.Ltd</a></li>
                        <li><a href="{{ route('bodla.developers') }}" class="sub-menu-item">Bodla Developers</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('calculator') }}" class="btn btn-primary">Calculator</a></li>
                <li><a href="{{ route('jobs') }}" class="sub-menu-item">Careers</a></li>
                <li><a href="{{ route('contact') }}" class="sub-menu-item">Contact</a></li>
                @auth
                    <li class="has-submenu parent-menu-item">
                        <a href="javascript:void(0)">{{ auth()->user()->name }}</a>
                        <ul class="submenu">
                            @if (auth()->user()->role == "1")
                                <li><a href="{{ route('admin.dashboard') }}" class="sub-menu-item">Dashboard</a></li>
                            @endif
                            <li onclick="logout()"><a href="javascript:void(0)" class="sub-menu-item">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#accountModal">Login</a></li>
                @endauth
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
