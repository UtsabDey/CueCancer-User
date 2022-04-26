@extends('layouts.master')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="{{asset('front/img/logo.jpg')}}" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Serial: </strong>SL00{{ $appointment->serial }}<br>
                                    <strong>Issued:</strong> {{ $appointment->updated_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Doctor</strong>
                                    <p class="invoice-details invoice-details-two">
                                        Dr. {{ $appointment->doctor_name }}<br>
                                        ID: {{ $appointment->doctor_id }}<br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Patient</strong>
                                    <p class="invoice-details">
                                        {{ $appointment->patient_name }}<br>
                                        ID: {{ $appointment->patient_id }}<br>
                                        {{ $appointment->address }} <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-info">
                                    <strong class="customer-text">Payment Method</strong>
                                    <p class="invoice-details invoice-details-two">
                                        {{ $appointment->payment }}<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Appointment ID</th>
                                                <th class="text-center">Appt Date</th>
                                                <th class="text-center">Contact No:</th>
                                                <th class="text-right">Symptoms</th>
                                                <th class="text-right">Booking Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">AP00{{ $appointment->id }}</td>
                                                <td class="text-center">{{ $appointment->appt_date }}</td>
                                                <td class="text-center">{{ $appointment->mobile }}</td>
                                                <td class="text-right">{{ $appointment->note }}</td>
                                                <td class="text-right">{{ $appointment->created_at->format('d/m/Y') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td><span>$350</span></td>
                                        </tr>
                                        <tr>
                                            <th>Discount:</th>
                                            <td><span>-10%</span></td>
                                        </tr>
                                        <tr>
                                            <th>Total Amount:</th>
                                            <td><span>$315</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    <!-- Invoice Information -->
                    <div class="other-info">
                        <h4>Other information</h4>
                        <p class="text-muted mb-0"></p>
                    </div>
                    <!-- /Invoice Information -->
                    
                </div>
            </div>
        </div>

    </div>

</div>		
<!-- /Page Content -->
@endsection