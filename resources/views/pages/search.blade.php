@extends('layouts.master')
@section('title','CueCancer')
@section('content')
@include('partials.flash')
<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-12">

							<!-- Doctor Widget -->
							@foreach($doctors as $doctor)
							<form class="card" action="{{ url('/booking') }}" method="get">	
								<div class="card-body">
									<div class="doctor-widget">
										<div class="col-md-5 col-lg-5">
											<div class="doctor-img">
												<a href="doctor-profile.html">
													<img src="{{asset('photos/'.$doctor->image)}}" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="">
													{{ $doctor->name }}</a></h4>
												<h5 class="doc-department"><img src="{{asset('front/img/specialities/specialities-01.png')}}" class="img-fluid" alt="Speciality">{{ $doctor->speciality }}</h5>
												<div class="clini-infos">
													<ul>
														<li><i class="far fa-money-bill-alt"></i>
															{{ $doctor->fee }} BDT </li>
													</ul>
												</div>
											</div>
										</div>
										<?php $days_all = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); ?>
										<?php $number = array("0", "1", "2", "3", "4", "5", "6"); ?>
										
										<div class="col-md-4 col-lg-4">
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
													
												<?php $from = explode(',', $doctor->day)[0]; ?>
												<?php $to = explode(',', $doctor->day)[1]; ?>
														<?php for($d=$from;$d<=$to;$d++){ ?>
														<div class="listing-day">
															<div class="day">
																<input type="radio" name="data" value="{{$doctor->id.'-'.$d}}" checked>
																@if($d == 0) Sunday
																@elseif($d == 1) Monday
																@elseif($d == 2) Tuesday
																@elseif($d == 3) Wednesday
																@elseif($d == 4) Thursday
																@elseif($d == 5) Friday
																@else Saturday
																@endif
															</div>
															<div class="time-items">
																<span class="time">
																@foreach(explode(',', $doctor->time) as $key => $t)
																	@if($key == 0) {{ $t }} - @else {{ $t }} @endif
																@endforeach
																</span>
															</div>
														</div>
														<?php } ?>				
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-lg-3">
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span>
																{{ now()->format('d M') }}
																</span></div>
															<div class="time-items">
																<span class="open-status"><span class="badge bg-success-light">Book Now</span></span>
																<span class="time">
																	@foreach(explode(',', $doctor->time) as $key => $t)
																	@if($key == 0) {{ $t }} - @else {{ $t }} @endif
																@endforeach
																</span>
															</div>
															<div class="time-items">
																<input type="date" name="date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
															</div>
														</div>
														<div class="listing-day">
															<div class="doc-info clinic-booking col-md-12">
																@if(!Session::has('loggedUser'))
																<a class="apt-btn" href="" onclick="alert('Please Login for appointment!')">Book Appointment</a>	
																@else
								<button type="submit" class="btn btn-primary">Book Appointment</button>												
																@endif
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
							
							@endforeach
						</div>
							<!-- /Doctor Widget -->

							<div class="load-more text-center">
								<a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
							</div>	
					</div>
				</div>

			</div>	
			<!-- /Page Content -->
@endsection