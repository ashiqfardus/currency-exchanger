<header class="header-wrap style1">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="header-top-left">
                        <ul class="contact-info list-style">
                            <li>
                                <i class="ri-phone-fill"></i>
                                <a href="tel:2455921125">(+245) 592 1125</a>
                            </li>
                            <li>
                                <i class="ri-mail-open-line"></i>
                                <a href="mailto:admin@gmail.com" class="contact-info">admin@gmail.com</a>
                            </li>
                            <li>
                                <i class="ri-map-pin-fill"></i>
                                <p>2767 Sunrise Street, NY 1002, USA</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-top-right">
                        <ul class="user-menu list-style">
                            <li>
                                <a href="contact.html">Support</a>
                            </li>
                            <li>
                                <a href="contact.html">Help</a>
                            </li>
                        </ul>
                        <div class="select-lang">
                            <i class="ri-earth-fill"></i>
                            <div class="navbar-option-item navbar-language dropdown language-option">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <span class="lang-name"></span>
                                </button>
                                <div class="dropdown-menu language-dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <img src="{{asset('/')}}front-end/img/uk.png" alt="flag">
                                        English
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('/')}}">
                    <img class="logo-light" src="{{asset('/')}}front-end/img/logo.png" alt="{{ config('app.name', 'Laravel') }}">
                    <img class="logo-dark" src="{{asset('/')}}front-end/img/logo-white.png" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                    <div class="menu-close d-lg-none">
                        <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{route('/')}}" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.html" class="nav-link">
                                About
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="features.html" class="nav-link">Our Features</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Converter
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="converter.html" class="nav-link">Convert Currency</a>
                                </li>
                                <li class="nav-item">
                                    <a href="chart.html" class="nav-link">Currency Chart</a>
                                </li>
                                <li class="nav-item">
                                    <a href="send-money.html" class="nav-link">Send Money</a>
                                </li>
                                <li class="nav-item">
                                    <a href="alerts.html" class="nav-link">Exchange Rate Alert</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Pages
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="team.html" class="nav-link">Our Team</a>
                                </li>
                                <li class="nav-item">
                                    <a href="app.html" class="nav-link">Download App</a>
                                </li>
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="testimonials.html" class="nav-link">Testimonials</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        User Pages
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{route('login')}}" class="nav-link">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('register')}}" class="nav-link">Register</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="recover-password.html" class="nav-link">Recover Password</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="terms-of-service.html" class="nav-link">Terms of Service</a>
                                </li>
                                <li class="nav-item">
                                    <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="error-404.html" class="nav-link">404 Error Page</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Blog
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Blog Layout
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="blog-no-sidebar.html" class="nav-link">Blog Grid</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-left-sidebar.html" class="nav-link">Blog Left Sidebar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-right-sidebar.html" class="nav-link">Blog Right
                                                Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Single Blog
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="blog-details-no-sidebar.html" class="nav-link">Blog Details No
                                                Sidebar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-details-left-sidebar.html" class="nav-link">Blog Details
                                                Left Sidebar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="blog-details-right-sidebar.html" class="nav-link">Blog Details
                                                Right Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                    <div class="other-options md-none">
                        <div class="option-item">
                            <div class="user-login">
                                <span><i class="@auth ri-user-line @else ri-user-add-line @endauth" style="font-size: 20px;"></i></span>
                                <ul class="list-style">
                                    @if (Route::has('login'))
                                        @auth
                                            @php
                                                $user_type = \Illuminate\Support\Facades\Auth::user()->type;
                                            @endphp
                                            @if($user_type == 'admin')
                                                <li><a href="{{route('admin.index')}}">Dashboard</a></li>
                                            @else
                                                <li><a href="{{route('home')}}">Dashboard</a></li>
                                            @endif
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @else
                                            <li><a href="{{route('login')}}">Sign In</a></li>
                                            <li><a href="{{route('register')}}">Sign Up</a></li>
                                        @endauth
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="mobile-bar-wrap">
                <div class="user-login d-lg-none">
                    <span><i class="@auth ri-user-line @else ri-user-add-line @endauth"></i></span>
                    <ul class="list-style">
                        @if (Route::has('login'))
                            @auth
                                @php
                                    $user_type = \Illuminate\Support\Facades\Auth::user()->type;
                                @endphp
                                @if($user_type == 'admin')
                                    <li><a href="{{route('admin.index')}}">Dashboard</a></li>
                                @else
                                    <li><a href="{{route('home')}}">Dashboard</a></li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li><a href="{{route('login')}}">Sign In</a></li>
                                <li><a href="{{route('register')}}">Sign Up</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
                <div class="mobile-menu d-lg-none">
                    <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
