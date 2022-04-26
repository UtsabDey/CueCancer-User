@extends('layouts.master')
@section('title','CueCancer')
@section('content')
    <!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
                        @include('partials.flash')
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-4 col-lg-4 login-left">
                                        {{-- <div class="form-group">
                                            <select class="btn btn-info form-control" name="blood_grp" required>
                                                <option value="">Select User Type</option>
                                                <option value="patient">Patient</option>
                                                <option value="doctor">Doctor</option>
                                            </select>
                                        </div> --}}
										<img src="{{asset('front/img/login-banner.png')}}" class="img-fluid" alt="CueCancer Register">	
									</div>
									<div class="col-md-12 col-lg-8 login-right">
										<div class="login-header">
											<h3>Patient Register</h3>
										</div>
										<!-- Register Form -->
										<form class="row form-row" action="{{ url('registration/submit') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-4">
                                                <input class="form-control" name="patient_id" type="text" value="{{ old('patient_id') }}" placeholder="User ID" required>@error('patient_id')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-8">
                                                <input class="form-control" name="name" type="text" value="{{ old('name') }}" placeholder="Name" required> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <input class="form-control" name="address" type="text" value="{{ old('address') }}" placeholder="Address" required> @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Email" required>@error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <input class="form-control" type="text" name="mobile" placeholder="Contact No" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="{{old('mobile')}}" required>@error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image" required>
                                                    <label class="custom-file-label" for="image" required>Choose Picture</label>@error('image')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Select Blood Group</label>
                                                <select class="form-control" name="blood_grp" required>
                                                    <option value="">A/B/O Group</option>
                                                    <option value="A+VE">A+VE</option>
                                                    <option value="A-VE">A-VE</option>
                                                    <option value="B+VE">B+VE</option>
                                                    <option value="B-VE">B-VE</option>
                                                    <option value="O+VE">O+VE</option>
                                                    <option value="O-VE">O-VE</option>
                                                    <option value="AB+VE">AB+VE</option>
                                                    <option value="AB-VE">AB-VE</option>
                                                </select>@error('blood_grp')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-6">
                                                    <label>Date of Birth</label>
                                                    <input class="form-control" name="dob" type="date" value="{{ old('dob') }}" placeholder="Date Of Brith" required>@error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <input class="form-control" id="myInput" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                                                <input type="checkbox" onclick="myFunction()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <input class="form-control" name="cpassword" id="myInput2" type="password" placeholder="Confirm Password" required>
                                                <input type="checkbox" onclick="showPass()">Show Password @error('cpassword')<small class="text-danger">{{ $message }}</small>@enderror
                                            </div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
										</form><br>
										<!-- /Register Form -->
                                        <div class="text-right">
                                            <a class="forgot-link" href="{{ url('login') }}">Already have an account?</a>
                                        </div>
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection