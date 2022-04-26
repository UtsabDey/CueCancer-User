@extends('layouts.master2')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->					
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="appointments">
        @foreach ($appointment as $appointment)
                    <!-- Appointment List -->
        <div class="appointment-list row">
            <div class="profile-info-widget">
                <div class="profile-det-info col-6">
                    <h3><a href="patient-profile.html">{{ $appointment->patient_name }}</a></h3>
                    <div class="patient-details">
                        <h5><i class="far fa-id-card"></i> {{ $appointment->patient_id }}</h5>
                        <h5><i class="far fa-clock"></i> {{ $appointment->appt_date }}</h5>
                        <h5><i class="fas fa-envelope"></i> {{ $appointment->email }}</h5>
                        <h5 class="mb-0"><i class="fas fa-phone"></i> {{ $appointment->mobile }}</h5>
                    </div>
                </div>
                <div class="profile-det-info col-6">
                    <h3><a href="patient-profile.html"></a></h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-map-marker-alt"></i> {{ $appointment->address }}</h5>
                        <h5><i class="fas fa-credit-card"></i> {{ $appointment->payment }}</h5>
                        <h5><i class="fas fa-comment"></i> {{ $appointment->note }}</h5>
                        @if ($appointment->status == 'pending')
                        <h5><i class="fas fa-bullhorn"></i> <span class="badge bg-warning-light">{{ $appointment->status }}</span></h5>
                        @else
                        <h5><i class="fas fa-bullhorn"></i> <span class="badge bg-success-light">{{ $appointment->status }}</span></h5>
                        @endif
                    </div>
                </div>
            </div>
            <div class="appointment-action">
                <a href="{{ url('doctor/accept/'.$appointment->id) }}" class="btn btn-sm bg-success-light">
                    <i class="fas fa-check"></i> Accept
                </a>
                <a href="" class="btn btn-sm bg-danger-light">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </div>
        <!-- /Appointment List -->
        @endforeach
    </div>
</div>	
<!-- /Page Content -->
@endsection