@extends('layouts.master')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-md-7 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Checkout Form -->
                        <form action="{{ url('booking/submit') }}" method="POST">
                            @csrf
                            <!-- Personal Information -->
                            <div class="info-widget">
                                <h4 class="card-title">Booking Information</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Patient ID</label>
                                            <input class="form-control" type="text" name="patient_id" value="{{ $patient->patient_id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Doctor ID</label>
                                            <input class="form-control" type="text" name="doctor_id" value="{{ $doctor->doctor_id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <input type="hidden" name="name1" value="{{ $doctor->name }}">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" value="{{ $patient->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" value="{{ $patient->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" name="mobile" value="{{ $patient->mobile }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Age</label>
                                            <input class="form-control" type="text" name="age" value="{{ $patient->age }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Address</label>
                                            <input class="form-control" type="text" name="address" value="{{ $patient->address }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Appointment Date</label>
                                            <input class="form-control" type="date" name="day" value="{{ $date }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Symptoms of your disease</label>
                                            <input class="form-control" type="text" name="note" value="" required>@error('note')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Personal Information -->                            
                            <div class="payment-widget">
                                <h4 class="card-title">Payment Method</h4>
                                <!-- Credit Card Payment -->
                                <div class="form-group col-md-6 col-sm-12"">
                                    <select class="form-control" name="payment" required>
                                        <option value="">Select</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="DBBL">DBBL</option>
                                    </select>@error('payment')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                                <!-- /Credit Card Payment -->                                
                                <!-- Submit Section -->
                                <div class="submit-section mt-4">
                                    <button type="submit" class="btn btn-primary submit-btn">Confirm Booking</button>
                                </div>
                                <!-- /Submit Section -->
                                
                            </div>
                        </form>
                        <!-- /Checkout Form -->  
                    </div>
                </div>   
            </div>
            
            <div class="col-md-5 col-lg-4 theiaStickySidebar">
                                    <!-- Booking Summary -->
                <div class="card booking-card">
                    <div class="card-header">
                        <h4 class="card-title">Booking Summary</h4>
                    </div>
                    <div class="card-body">
                    
                        <!-- Booking Doctor Info -->
                        <div class="booking-doc-info">
                            <a href="doctor-profile.html" class="booking-doc-img">
                                <img src="{{asset('photos/'.$doctor->image)}}" alt="User Image">
                            </a>
                            <div class="booking-info">
                                <h4><a href="doctor-profile.html"></a></h4>
                                <div class="rating">
                                    {{ $doctor->speciality }}
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Booking Doctor Info -->
                        
                        <div class="booking-summary">
                            <div class="booking-item-wrap">
                                <ul class="booking-date">
                                    <li>Name <span>{{ $doctor->name }}</span></li>
                                    <li>Date <span>{{ $date }}</span></li>
                                    <li>Time <span>@foreach(explode(',', $doctor->time) as $key => $t)@if($key == 0) {{ $t }} - @else {{ $t }} @endif
                                    @endforeach</span></li>
                                </ul>
                                <ul class="booking-fee">
                                    <li>Consulting Fee <span>{{ $doctor->fee }}</span></li>
                                </ul>
                                {{-- <div class="booking-total">
                                    <ul class="booking-total-list">
                                        <li>
                                            <span>Total</span>
                                            <span class="total-cost">$160</span>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Booking Summary -->                
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection