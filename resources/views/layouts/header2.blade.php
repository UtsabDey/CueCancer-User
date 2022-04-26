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
            <a href="#" class="navbar-brand logo">
                <img src="{{asset('front/img/logo.jpg')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="#" class="menu-logo">
                    <img src="{{asset('front/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>	 
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
            <!-- User Menu -->
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
                            <p class="text-muted mb-0">Doctor</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ url('doctor/profile') }}">Profile Settings</a>
                    <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                </div>
            </li>
            <!-- /User Menu -->
        </ul>
    </nav>
</header>