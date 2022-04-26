@extends('layouts.master2')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->	
<div class="col-md-7 col-lg-8 col-xl-9">
	@include('partials.flash')
	<div class="card">
        <div class="card-body">        
            <!-- Profile Settings Form -->
            <form action="{{ url('doctor/pres/submit') }}" method="POST">
                @csrf
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">

					<div class="col-12 col-md-3">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $appointment->id }}">
                            <input type="hidden" name="doctor_id" value="{{ $appointment->doctor_id }}">
                            <input type="hidden" name="patient_id" value="{{ $appointment->patient_id }}">
                            <label>Medicine Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ex: Tab. Napa"> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
					<div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Dose</label>
                            <select class="form-control" name="dose" required>
                                <option value="1+1+1">1+1+1</option>
                                <option value="1+0+1">1+0+1</option>
                                <option value="0+0+1">0+0+1</option>
                                <option value="1+0+0">1+0+0</option>
                                <option value="0+1+0">0+1+0</option>
                            </select>
                            @error('dose')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
					<div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Rules</label>
                            <select class="form-control" name="rules" required>
                                <option value="After meal">After meal</option>
                                <option value="Before meal">Before meal</option>
                            </select>
                            @error('rules')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
					<div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Taken for</label>
                            <select class="form-control" name="time" required>
                                <option value="3 days">3 days</option>
                                <option value="7 days">7 days</option>
                                <option value="10 days">10 days</option>
                                <option value="30 days">30 days</option>
                            </select>
                            @error('time')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <textarea name="advice" id="" cols="27" rows="2" placeholder="Advice for Patient"></textarea>
                    </div>
					<div class="submit-section col-12 col-md-3">
						<button type="submit" class="btn btn-primary submit-btn">Prescribed</button>
					</div>
				</div>
			</form>
		</div>

        <!-- Prescription Content -->
        {{-- <div class="row">
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
                                    <strong>Serial: </strong>SL00{{ $medicine->appt_id }}<br>
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
                                        Dr. {{ $doctor->name }}<br>
                                        ID: <br>
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
                                        Age<br>
                                        ID: <br>
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
                                                <td class="text-center">P00</td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-right"></td>
                                                <td class="text-right"></td>
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
                        <p class="text-muted mb-0"></p>
                    </div>
                    <!-- /Invoice Information -->
                    
                </div>
            </div>
        </div> --}}
        <!-- /Prescription Content -->
	</div>
</div>

<!-- /Page Content -->
@endsection
					{{-- <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Medicine Name</label>
                            <input type="text" name="name" class="form-control" value=""> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
					<div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Rules</label>
                            <input type="text" name="name" class="form-control" value=""> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
					<div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Dose</label>
                            <input type="text" name="dose" class="form-control" value=""> @error('dose')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
					<div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Taken for</label>
                            <input type="text" name="day" class="form-control" value=""> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div> --}}