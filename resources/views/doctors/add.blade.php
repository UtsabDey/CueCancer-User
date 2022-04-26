@extends('layouts.master2')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->	
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('partials.flash')
    <div class="card">
        <div class="card-body">
            
            <!-- Profile Settings Form -->
            <form action="{{ url('doctor/add/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" placeholder="DT001" name="doctor_id" class="form-control" value="{{ old('doctor_id') }}" required>@error('doctor_id')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}"> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">@error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="blood_grp" required>
                                <option value="">Select Bloog Group</option>
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
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Email ID</label>
                            <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Email" required>@error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input class="form-control" type="text" name="mobile" placeholder="Contact No (01********)" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="{{ old('mobile') }}" required>@error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image" required>
                                <label class="custom-file-label" for="image" required>Choose Picture</label>@error('image')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="myInput" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                            <input type="checkbox" onclick="myFunction()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Speciality</label>
                            <select class="form-control" value="{{ old('speciality') }}" name="speciality" required>
                                <option value="">Select Speciality</option>
                                <option value="Radiation Oncologist">Radiation Oncologist</option>
                                <option value="Surgical Oncologist">Surgical Oncologist</option>
                                <option value="Hematologist">Hematologist</option>
                                <option value="Psycho-Oncologist">Psycho-Oncologist</option>
                            </select>@error('speciality')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label>Doctor Fee</label>
                        <input class="form-control" name="fee" type="text" value="{{ old('fee') }}" placeholder="Fee" required> @error('fee')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Weekend From</label>
                            <select class="form-control" value="{{ old('from') }}" name="from" required>
                                <option value="">Select day</option>
                                <option value="0">Sunday</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                            </select>@error('from')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Weekend To</label>
                            <select class="form-control" value="{{ old('to') }}" name="to" required>
                                <option value="">Select day</option>
                                <option value="0">Sunday</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                            </select>@error('to')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Time From</label>
                            <select class="form-control" value="{{ old('time_from') }}" name="time_from" required>
                                <option value="">Select time</option>
                                <option value="10 am">10 am</option>
                                <option value="11 am">11 am</option>
                                <option value="12 pm">12 pm</option>
                                <option value="1 pm">1 pm</option>
                                <option value="2 pm">2 pm</option>
                                <option value="3 pm">3 pm</option>
                                <option value="4 pm">4 pm</option>
                                <option value="5 pm">5 pm</option>
                                <option value="6 pm">6 pm</option>
                                <option value="7 pm">7 pm</option>
                                <option value="8 pm">8 pm</option>
                            </select>@error('time_from')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label>Time To</label>
                            <select class="form-control" value="{{ old('time_to') }}" name="time_to" required>
                                <option value="">Select time</option>
                                <option value="10 am">10 am</option>
                                <option value="11 am">11 am</option>
                                <option value="12 pm">12 pm</option>
                                <option value="1 pm">1 pm</option>
                                <option value="2 pm">2 pm</option>
                                <option value="3 pm">3 pm</option>
                                <option value="4 pm">4 pm</option>
                                <option value="5 pm">5 pm</option>
                                <option value="6 pm">6 pm</option>
                                <option value="7 pm">7 pm</option>
                                <option value="8 pm">8 pm</option>
                            </select>@error('time_to')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" type="text" value="{{ old('address') }}" placeholder="Address" required> @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-user-plus"></i> Add Doctor</button>
                </div>
            </form>
            <!-- /Profile Settings Form -->
            
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection