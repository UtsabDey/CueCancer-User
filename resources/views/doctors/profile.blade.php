@extends('layouts.master2')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('partials.flash')				
    <!-- Basic Information -->
    <div class="card">
        <div class="card-body">
            
            <!-- Profile Settings Form -->
            <form action="{{ url('doctor/profile/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="profile-img">
                                    <img src="{{ asset('photos/'.$user->image) }}" alt="User Image">
                                </div>
                                <div class="form-group upload-img">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image" >
                                        <label class="custom-file-label" for="image" >Choose Picture</label>@error('image')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                    <small class="form-text text-muted">Allowed JPG, JPEG or PNG. Max size of 2MB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <label>User ID</label>
                            <input type="text" name="doctor_id" class="form-control" value="{{ $user->doctor_id }}" readonly>@error('doctor_id')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"> @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">@error('dob')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="blood_grp" required>
                                <option value="{{ $user->blood_grp }}">{{ $user->blood_grp }}</option>
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
                            <input class="form-control" name="email" type="text" value="{{ $user->email }}" placeholder="Email" required>@error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input class="form-control" type="text" name="mobile" placeholder="Contact No" pattern="[0]{1}[1]{1}[0-9]{9}" title="Enter 11 digits mobile number" value="{{ $user->mobile }}" required>@error('mobile')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label>Age</label>
                        <input class="form-control" name="age" type="text" value="{{ $user->age }}" placeholder="Age" readonly> @error('age')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Speciality</label>
                            <select class="form-control" name="speciality" required>
                                <option value="{{ $user->speciality }}">{{ $user->speciality }}</option>
                                <option value="Radiation Oncologist">Radiation Oncologist</option>
                                <option value="Surgical Oncologist">Surgical Oncologist</option>
                                <option value="Hematologist">Hematologist</option>
                                <option value="Psycho-Oncologist">Psycho-Oncologist</option>
                            </select>@error('speciality')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" type="text" value="{{ $user->address }}" placeholder="Address" required> @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Joined At</label>
                            <input type="text" date-format="DD MM YYYY" name="created_at" class="form-control" value="{{ $user->created_at->format('d/m/Y h:i A') }}" readonly>@error('created_at')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </div>
            </form>
            <!-- /Profile Settings Form -->
            
        </div>
    </div>
    <!-- /Basic Information -->
    
    <!-- Memberships -->
    {{-- <div class="card">
        <div class="card-body">
            <h4 class="card-title">Memberships</h4>
            <div class="membership-info">
                <div class="row form-row membership-cont">
                    <div class="col-12 col-md-10 col-lg-5">
                        <div class="form-group">
                            <label>Memberships</label>
                            <input type="text" class="form-control">
                        </div> 
                    </div>
                </div>
            </div>
            <div class="add-more">
                <a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
            </div>
        </div>
    </div> --}}
    <!-- /Memberships -->    
</div>
<!-- /Page Content -->
@endsection