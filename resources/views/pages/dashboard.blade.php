@extends('layouts.master3')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card">
        <div class="card-body pt-0">
        
            <!-- Tab Menu -->
            <nav class="user-tabs mb-4">
                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
                    </li>
                </ul>
            </nav>
            <!-- /Tab Menu -->
            
            <!-- Tab Content -->
            <div class="tab-content pt-0">
                
                <!-- Appointment Tab -->
                <div id="pat_appointments" class="tab-pane fade show active">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Appointment ID</th>
                                            <th>Doctor Name</th>
                                            <th>Appt Date</th>
                                            <th class="text-center">Booking Time</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointment as $appointment)
                                        <tr>
                                            <td class="text-center">AP00{{ $appointment->id }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html">Dr. {{ $appointment->doctor_name }}<span>{{ $appointment->doctor_id }}</span></a>
                                                </h2>
                                            </td>
                                            <td>{{ $appointment->appt_date }}</td>
                                            <td class="text-center">{{ $appointment->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @if ($appointment->status == 'pending')
                                                <span class="badge bg-warning-light">{{ $appointment->status }}</span>
                                                @else
                                                <span class="badge bg-success-light">{{ $appointment->status }}</span> 
                                                @endif
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    @if ($appointment->status == 'pending')
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-warning-light" onclick="alert('Wait Until Approved')">
                                                    <i class="far fa-eye"></i> View token</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-warning-light" onclick="alert('Wait Until Prescribed')">
                                                    <i class="far fa-eye"></i>Prescription</a>
                                                    @else
                                                    <a href="{{ url('token/'. $appointment->id) }}" target="blank" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View Token</a> 
                                                    <a href="{{ url('prescription/'. $appointment->id) }}" target="blank" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i>Prescription</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Appointment Tab -->
              
                <!-- Prescription Tab -->
                <div class="tab-pane fade" id="pat_prescriptions">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date </th>
                                            <th>Name</th>									
                                            <th>Created by </th>
                                            <th></th>
                                        </tr>     
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>14 Nov 2019</td>
                                            <td>Prescription 1</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13 Nov 2019</td>
                                            <td>Prescription 2</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12 Nov 2019</td>
                                            <td>Prescription 3</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11 Nov 2019</td>
                                            <td>Prescription 4</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Sofia Brient <span>Urology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10 Nov 2019</td>
                                            <td>Prescription 5</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Marvin Campbell <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9 Nov 2019</td>
                                            <td>Prescription 6</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Katharine Berthold <span>Orthopaedics</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8 Nov 2019</td>
                                            <td>Prescription 7</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Linda Tobin <span>Neurology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7 Nov 2019</td>
                                            <td>Prescription 8</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Paul Richard <span>Dermatology</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6 Nov 2019</td>
                                            <td>Prescription 9</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. John Gibbs <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5 Nov 2019</td>
                                            <td>Prescription 10</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Olga Barlow <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>	
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Prescription Tab -->        
            </div>
            <!-- Tab Content -->
            
        </div>
    </div>
</div>
</div>

</div>

</div>		
<!-- /Page Content -->
@endsection