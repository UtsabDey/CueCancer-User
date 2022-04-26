@extends('layouts.master')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
                <!-- Prescription Content -->
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="invoice-content">
        
                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-logo">
                                            <img src="{{asset('front/img/logo.jpg')}}" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="invoice-details">
                                            <strong>Prescription ID: </strong>PS00{{ $medicine->id }}<br>
                                            <strong>Serial: </strong>SL00<br>
                                            <strong>Issued:</strong> {{ $medicine->created_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>  
                            <!-- /Invoice Item -->   
        
                            <!-- Invoice Item -->
                            <div class="invoice-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="invoice-info">
                                            <strong class="customer-text">Doctor</strong>
                                            <p class="invoice-details invoice-details-two">
                                                Dr. {{ $appointment->doctor_name }}<br>
                                                ID: {{ $appointment->doctor_id}}<br>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="text-align: center">
                                        <div class="invoice-info">
                                            <strong class="customer-text">Online Prescription</strong><hr style="height:3px;border-width:0;color:gray;background-color:gray">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="invoice-info invoice-info2">
                                            <strong class="customer-text">Patient</strong>
                                            <p class="invoice-details">
                                                Age: {{ $appointment->age}}<br>
                                                ID: {{ $appointment->patient_id}}<br>
                                                 <br>
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
                                                        <th>Prescription ID</th>
                                                        <th class="text-center">Medicine Name</th>
                                                        <th class="text-center">Rules</th>
                                                        <th class="text-right">Dose</th>
                                                        <th class="text-right">Taken for</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">PS00{{ $medicine->id }}</td>
                                                        <td class="text-center">{{ $medicine->name }}</td>
                                                        <td class="text-center">{{ $medicine->rules }}</td>
                                                        <td class="text-right">{{ $medicine->dose }}</td>
                                                        <td class="text-right">{{ $medicine->time }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Item -->
                            
                            <!-- Invoice Information -->
                            <div class="other-info">
                                <h4>Advice</h4>
                                <p class="text-muted mb-0">{{ $medicine->advice }}</p>
                            </div>
                            <!-- /Invoice Information -->
                            
                        </div>
                    </div>
                </div>
                <!-- /Prescription Content -->
    </div>

</div>		
<!-- /Page Content -->
@endsection