@extends('layouts.master2')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="card dash-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar1">
                                    <div class="circle-graph1" data-percent="40">
                                        <img src="{{asset('front/img/icon-01.png')}}" class="img-fluid" alt="patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Total Doctor</h6>
                                    <h3>{{ $doctor->count() }}</h3>
                                    <p class="text-muted">{{ now()->format('d, M Y') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="circle-bar circle-bar2">
                                    <div class="circle-graph2" data-percent="20">
                                        <img src="{{asset('front/img/icon-02.png')}}" class="img-fluid" alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Total Patient</h6>
                                    <h3>{{ $patient->count() }}</h3>
                                    <p class="text-muted">{{ now()->format('d, M Y') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget">
                                <div class="circle-bar circle-bar3">
                                    <div class="circle-graph3" data-percent="10">
                                        <img src="{{asset('front/img/icon-03.png')}}" class="img-fluid" alt="Patient">
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6>Appoinments</h6>
                                    <h3>{{ $appointment->count() }}</h3>
                                    <p class="text-muted">{{ now()->format('d, M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Patient Appoinment</h4>
            <div class="appointment-tab">
            
                <!-- Appointment Tab -->
                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                    <li class="nav-item">
                        <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                    </li>
                </ul>
                <!-- /Appointment Tab -->               
                <div class="tab-content">               
                    <!-- Upcoming Appointment Tab -->
                    <div class="tab-pane show active" id="upcoming-appointments">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Appoinment ID</th>
                                                <th>Patient Name</th>
                                                <th>Appt Date</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Mobile</th>
                                                <th>Disease</th>
                                                <th class="text-center">Payment</th>
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
                                                        <a href="patient-profile.html">Richard Wilson <span>{{ $appointment->patient_id }}</span></a>
                                                    </h2>
                                                </td>
                                                <td>{{ $appointment->appt_date }} <span class="d-block text-info">10.00 AM</span></td>
                                                <td>{{ $appointment->email }}</td>
                                                <td>{{ $appointment->mobile }}</td>
                                                <td class="text-center">{{ $appointment->note }}</td>
                                                <td class="text-center">{{ $appointment->payment }}</td>
                                                <td class="text-center">
                                                    @if ($appointment->status == 'pending')
                                                    <span class="badge bg-warning-light">{{ $appointment->status }}</span>
                                                    @else
                                                    <span class="badge bg-success-light">{{ $appointment->status }}</span> 
                                                    @endif
                                                    </td>
                                                <td class="text-right text-center">
                                                    <div class="table-action">
                                                        @if ($appointment->status == 'pending')
                                                        <a href="{{ url('doctor/accept/'.$appointment->id) }}" class="btn btn-sm bg-success-light">
                                                        <i class="fas fa-check"></i> Accept</a>
                                                        @else
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-warning-light" onclick="alert('Already Approved')">
                                                        <i class="fas fa-check"></i> Accept</a>
                                                        <a href="{{ url('doctor/pres/'. $appointment->id) }}" class="btn btn-sm bg-info-light">
                                                        <i class="far fa-eye"></i>Prescription
                                                        </a>
                                                        @endif
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel</a>
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
                    <!-- /Upcoming Appointment Tab -->                    
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Page Content -->
@endsection