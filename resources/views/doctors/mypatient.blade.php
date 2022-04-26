@extends('layouts.master2')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->	
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="row row-grid">
        @foreach ($patient as $patient)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card widget-profile pat-widget-profile">
                <div class="card-body">
                    <div class="pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="" class="booking-doc-img">
                                <img src="{{asset('photos/'. $patient->image)}}" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3><a href="">{{ $patient->name }}</a></h3>
                                
                                <div class="patient-details">
                                    <h5><b>Patient ID :</b> {{ $patient->patient_id }}</h5>
                                    <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ $patient->address }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="patient-info">
                        <ul>
                            <li>Phone <span>{{ $patient->mobile }}</span></li>
                            <li>Age <span>{{ $patient->age }} Years</span></li>
                            <li>Blood Group <span>{{ $patient->blood_grp }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>
<!-- /Page Content -->
@endsection