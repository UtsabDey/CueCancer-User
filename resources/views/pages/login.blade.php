@extends('layouts.master')
@section('title','CueCancer')
@section('content')
    <!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					@include('partials.flash')
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{asset('front/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span>CueCancer</span></h3>
										</div>
										<form action="{{ url('login/submit') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
											<div class="form-group">
                                                <span>User </span> &nbsp;&nbsp;
                                                <label class="btn btn-primary active">
                                                    <input type="radio" name="options" value="patient" id="option1" autocomplete="off" checked><i class="fa fa-user"></i> Patient
                                                  </label>
                                                  <label class="btn btn-primary">
                                                    <input type="radio" name="options" value="doctor" id="option2" autocomplete="off"> <i class="fa fa-user-md"></i> Doctor
                                                  </label>
                                            </div>
											<div class="form-group form-focus">
												<input type="email" name="email" class="form-control floating" value="{{ old('email') }}" required>
												<label class="focus-label">Email</label>@error('email')<small class="text-danger">{{ $message }}</small>@enderror
											</div>
											<div class="form-group form-focus">
												<input type="password" name="password" id="myInput"class="form-control floating" value="" required>
												<label class="focus-label">Password</label><input type="checkbox" onclick="myFunction()">Show Password @error('password')<small class="text-danger">{{ $message }}</small>@enderror
											</div><br>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
											<div class="text-center dont-have">Don’t have an account? <a href="{{ url('registration') }}">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection