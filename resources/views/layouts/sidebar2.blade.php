<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('photos/'.session('loggedUser')->image)}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ session('loggedUser')->name }}</h3>   
                    <div class="patient-details">
                        <h5><i class="fas fa-birthday-cake"></i> {{ session('loggedUser')->dob }}, {{ session('loggedUser')->age }} years</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ session('loggedUser')->address }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="{{ (request()->is('patient/dashboard*')) ? 'active' : '' }}">
                        <a href="{{ url('patient/dashboard') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('patient/profile*')) ? 'active' : '' }}">
                        <a href="{{ url('patient/profile') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('patient/password*')) ? 'active' : '' }}">
                        <a href="{{ url('patient/password') }}">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->
    
</div>