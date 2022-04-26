<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="index-2.html" class="navbar-brand logo">
                <img src="{{asset('front/img/logo.jpg')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index-2.html" class="menu-logo">
                    <img src="{{asset('front/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="has-submenu">
                    <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('search') }}">Doctor List</a></li>
                    </ul>
                </li>	
                <li class="has-submenu">
                    <a href="#">Appointment<i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ url('/appointment') }}">Book Appointment</a></li>
                        <li><a href="{{ url('/search') }}">Search</a></li>
                    </ul>
                </li>	
                <li class="has-submenu">
                    <a href="#">Pages <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="video-call.html">Video Call</a></li>
                        <li class="has-submenu">
                            <a href="invoices.html">Invoices</a>
                            <ul class="submenu">
                                <li><a href="invoices.html">Invoices</a></li>
                                <li><a href="invoice-view.html">Invoice View</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="login-link">
                    <a href="#">Login / Signup</a>
                </li>
            </ul>		 
        </div>		 
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>							
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +880 168 516 8481</p>
                </div>
            </li>
            @if(!Session::has('loggedUser'))
            <li class="nav-item">
                <a class="nav-link header-login" href="{{ url('/login') }}">Login</a>
            </li>
            <!-- User Menu -->
            @else
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{asset('photos/'.session('loggedUser')->image)}}" width="31" alt="{{ session('loggedUser')->name }}">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{asset('photos/'.session('loggedUser')->image)}}" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{ session('loggedUser')->name }}</h6>
                            <p class="text-muted mb-0">Patient</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ url('patient/dashboard') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ url('patient/profile') }}">Profile Settings</a>
                    <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                </div>
            </li>
            @endif
            <!-- /User Menu -->
        </ul>
    </nav>
</header>