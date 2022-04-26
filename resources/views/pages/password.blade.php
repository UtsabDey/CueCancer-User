@extends('layouts.master3')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->	
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('partials.flash')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Change Password</h5>
            <div class="row">
                <div class="col-md-10 col-lg-6">
                    <form action="{{ url('patient/password/update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" id="myInput1" name="oldpassword" class="form-control" value="" required><input type="checkbox" onclick="showPass1()">Show Password @error('oldpassword')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="myInput2" name="password" class="form-control" value="" required><input type="checkbox" onclick="showPass2()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="myInput3" name="cpassword" class="form-control" value="" required><input type="checkbox" onclick="showPass3()">Show Password @error('cpassword')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection