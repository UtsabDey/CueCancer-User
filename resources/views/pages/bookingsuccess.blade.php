@extends('layouts.master')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
    <div class="content success-page-cont">
        <div class="container-fluid">
            @include('partials.flash')
            <div class="row justify-content-center">
                <div class="col-lg-6">
                
                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">
                                <i class="fas fa-check"></i>
                                <h3>Appointment booked Successfully!</h3>
                                <p>The doctor notify you this appointment <br><strong>Accept or Not!</strong></p>
                                @if ($data['patient_id'])
                                    <a href="" onclick="alert('Please wait ultil your request is approved!')" class="btn btn-primary view-inv-btn">View Token</a>
                                @else
                                    <a href="" onclick="alert('Please wait ultil your request is approved!')" class="btn btn-primary view-inv-btn">View Token</a>  
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->
                    
                </div>
            </div>
            
        </div>
    </div>		
<!-- /Page Content -->
@endsection