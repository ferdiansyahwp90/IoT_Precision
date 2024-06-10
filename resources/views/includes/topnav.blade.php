<div class="main-header nav nav-item hor-header">
    <div class="container">
        <div class="main-header-left ">
            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a><!-- sidebar-toggle-->
            <a class="header-brand" href="#">
                {{-- <img src="{{asset('assets/img/brand/logo-white.png')}}" class="desktop-dark">
                <img src="{{asset('assets/img/brand/logo.png')}}" class="desktop-logo">
                <img src="{{asset('assets/img/brand/favicon.png')}}" class="desktop-logo-1">
                <img src="{{asset('assets/img/brand/favicon-white.png')}}" class="desktop-logo-dark"> --}}
                <h4>Admin Panel</h4>
            </a>
            <div class="main-header-center  ms-4">

            </div>
        </div><!-- search -->
        <div class="main-header-right">
            <ul class="nav nav-item  navbar-nav-right ms-auto">

                <li class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
                </li>
                <li class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt="" src="../../assets/img/faces/6.jpg"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="../../assets/img/faces/6.jpg" class=""></div>
                                <div class="ms-3 my-auto">
                                    <h6>{{auth()->user()->email}}</h6>
                                    <span>{{auth()->user()->role}}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{route('profile')}}"><i class="bx bx-cog"></i> Edit Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="bx bx-log-out"></i> Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
