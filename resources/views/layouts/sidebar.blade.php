<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset('photos/'.session('loggedUser')->image)}}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>Dr. {{ session('loggedUser')->name }}</h3>
                    
                    <div class="patient-details">
                        <h5 class="mb-0">MBBS - DMC</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="{{ (request()->is('doctor/dashboard*')) ? 'active' : '' }}">
                        <a href="{{ url('doctor/dashboard') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('doctor/appointment*')) ? 'active' : '' }}">
                        <a href="{{ url('doctor/appointment') }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Pending Appointments</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('doctor/patientlist*')) ? 'active' : '' }}">
                        <a href="{{ url('doctor/patientlist') }}">
                            <i class="fas fa-user-injured"></i>
                            <span>My Patients</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('doctor/pres*')) ? 'active' : '' }}">
                        <a href="{{ url('doctor/dashboard') }}">
                            <i class="fas fa-file-invoice"></i>
                            <span>Prescription</span>
                        </a>
                    </li>
                    {{-- <li class="{{ (request()->is('doctor/message*')) ? 'active' : '' }}">
                        <a href="chat-doctor.html">
                            <i class="fas fa-comments"></i>
                            <span>Message</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li> --}}
                    <li class="{{ (request()->is('doctor/add*')) ? 'active' : '' }}">
                        <a href="{{ url('doctor/add') }}">
                            <i class="fas fa-user-plus"></i>
                            <span>Add Doctor</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('doctor/profile*')) ? 'active' : '' }}">
                        <a href="{{ url('doctor/profile') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('doctor/password*')) ? 'active' : '' }}">
                        <a href="{{ url('doctor/password') }}">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('doctor/logout*')) ? 'active' : '' }}">
                        <a href="index-2.html">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->
    
</div>