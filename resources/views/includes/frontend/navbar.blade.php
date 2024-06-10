<header class="edu-header  header-sticky header-transparent header-style-2 header-default">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-xl-3 col-md-6 col-6">
                <div class="logo">
                    <a href="index.html">
                        <img class="logo-light" src="{{ asset($profiles->logo) }}" alt="Site Logo">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 d-none d-xl-block">
                <nav class="mainmenu-nav d-none d-lg-block">
                    <ul class="mainmenu">
                        <li><a href="#header">Home</a>
                        <li><a href="#about">About</a>
                        <li><a href="#sosmed">Sosial Media</a>
                        <li><a href="#product">Product</a>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-8 col-xl-3 col-md-6 col-6">
                <div class="header-right d-flex justify-content-end">
                    <div class="header-menu-bar">
                        <div class="quote-icon quote-user d-none d-md-block ml--15 ml_sm--5">
                            <a class="edu-btn btn-medium header-purchase-btn" href="{{ url('/login') }}" target="_blank">Masuk Ke Aplikasi</a>
                        </div>
                    </div>
                    <div class="mobile-menu-bar ml--15 ml_sm--5 d-block d-xl-none">
                        <div class="hamberger">
                            <button class="white-box-icon hamberger-button">
                                <i class="ri-menu-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
