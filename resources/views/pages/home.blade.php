@extends('layouts.master')
@section('title','CueCancer')
@section('content')
@include('partials.flash')

<!-- Home Banner -->
<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Cancer is just a chapter in our lives and not the whole story.</h1>
                <p>Discover the best doctors for you.</p>
            </div>
             
            <!-- Search -->
            <div class="search-box">
                <form action="templateshub.net">
                    <div class="form-group search-info">
                        <input type="text" class="form-control" placeholder="Search Doctors">
                    </div>
                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                </form>
            </div>
            <!-- /Search -->
            
        </div>
    </div>
</section>
<!-- /Home Banner -->
  
<!-- Clinic and Specialities -->
<section class="section section-specialities">
    <div class="container-fluid">
        <div class="section-header text-center">
            <h2>Doctor Specialities</h2>
            <p class="sub-title">Discover doctors specialities</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <!-- Slider -->
                <div class="specialities-slider slider">
                
                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="{{asset('front/img/specialities/specialities-01.png')}}" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <p>Surgical Oncologist</p>
                    </div>	
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="{{asset('front/img/specialities/specialities-02.png')}}" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>
                        <p>Hematologist</p>	
                    </div>							
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="{{asset('front/img/specialities/specialities-03.png')}}" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>	
                        <p>Psycho-Oncologist</p>	
                    </div>							
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="speicality-item text-center">
                        <div class="speicality-img">
                            <img src="{{asset('front/img/specialities/specialities-04.png')}}" class="img-fluid" alt="Speciality">
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                        </div>	
                        <p>Hematologist</p>	
                    </div>							
                    <!-- /Slider Item -->
                    
                </div>
                <!-- /Slider -->
                
            </div>
        </div>
    </div>   
</section>	 
<!-- Clinic and Specialities -->

<!-- Popular Section -->
<section class="section section-doctor">
    <div class="container-fluid">
       <div class="row">
            <div class="col-lg-4">
                <div class="section-header ">
                    <h2>Book Our Doctor</h2>
                    <p>Lorem Ipsum is simply dummy text </p>
                </div>
                <div class="about-content">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                    <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
                    <a href="javascript:;">Read More..</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="doctor-slider slider">
                    @foreach ($doctor as $doctor)
                    <!-- Doctor Widget -->
                    <div class="profile-widget">
                        <div class="doc-img">
                            <a href="">
                                <img class="img-fluid" alt="User Image" style="height: 289px; width: 228px" src="{{ asset('photos/'.$doctor->image) }}">
                            </a>
                            <a href="javascript:void(0)" class="fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                        </div>
                        <div class="pro-content">
                            <h3 class="title">
                                <a href="doctor-profile.html">{{ $doctor->name }}</a> 
                                <i class="fas fa-check-circle verified"></i>
                            </h3>
                            <p class="speciality">MBBS - DMC, {{ $doctor->speciality }}</p>
                            <ul class="available-info">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}
                                </li>
                                <li>
                                    <?php $from = explode(',', $doctor->day)[0]; ?>
                                    <?php $to = explode(',', $doctor->day)[1]; ?>
                                    @foreach(explode(',', $doctor->day) as $key => $d)
                                    @if($key == 0) 
                                        @if($d == 0) Sunday to
                                        @elseif($d == 1) Monday to
                                        @elseif($d == 2) Tuesday to
                                        @elseif($d == 3) Wednesday to
                                        @elseif($d == 4) Thursday to
                                        @elseif($d == 5) Friday to
                                        @else Saturday to
                                        @endif
                                    @else
                                        @if($d == 0) Sunday
                                        @elseif($d == 1) Monday
                                        @elseif($d == 2) Tuesday
                                        @elseif($d == 3) Wednesday
                                        @elseif($d == 4) Thursday
                                        @elseif($d == 5) Friday
                                        @else Saturday
                                        @endif
                                    @endif
                                @endforeach,          
                                    @foreach(explode(',', $doctor->time) as $key => $t)
                                    @if($key == 0) {{ $t }} - @else {{ $t }} @endif
                                    @endforeach
                                </li>
                                <li>
                                    <i class="far fa-money-bill-alt"></i> {{ $doctor->fee }}
                                    <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                </li>
                            </ul>
                            <div class="row row-sm">
                                <div class="col-12">
                                    @if(!Session::has('loggedUser'))
                                    <a class="btn book-btn"" href="" onclick="alert('Please Login for appointment!')">Book Appointment</a>
                                    @else
                                    <a href="{{ url('search') }}" class="btn book-btn">Book Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Doctor Widget --> 
                    @endforeach                    
                </div>
            </div>
       </div>
    </div>
</section>
<!-- /Popular Section -->

<!-- Blogs -->
<section class="section section-features">
    <div class="container-fluid">
        <div class="row">
             <div class="col-lg-12">
                 <div class="doctor-slider slider">
                     @foreach ($blog as $blog)
                     <!-- Doctor Widget -->
                     <div class="profile-widget">
                         <div class="doc-img">
                             <a href="">
                                 <img class="img-fluid" alt="User Image" style="height: 289px; width: 228px" src="{{asset('front/img/blog.jpg')}}">
                             </a>
                             <a href="javascript:void(0)" class="fav-btn">
                                 <i class="far fa-bookmark"></i>
                             </a>
                         </div>
                         <div class="pro-content">
                             <h3 class="title">
                                 <h4>{{ $blog->title }}</h4>
                                 <i class="fas fa-check-circle verified"></i>
                             </h3>
                             <p class="speciality">Author ID: {{ $blog->author_id }}</p>
                             <ul class="available-info">
                                 <li>
                                     <i class="fa fa-bell"></i> 
                                     {{ Str::limit($blog->details, 100) }}
                                 </li>
                             </ul>
                             <div class="row row-sm">
                                 <div class="col-12">
                                     <a href="booking.html" class="btn book-btn">Read More</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- /Doctor Widget --> 
                     @endforeach                    
                 </div>
             </div>
        </div>
     </div>
</section>
<!-- Blogs -->

<!-- Availabe Features -->
<section class="section section-doctor">
    <div class="container-fluid">
       <div class="row">
            <div class="col-md-5 features-img">
                <img src="{{asset('front/img/features/feature.png')}}" class="img-fluid" alt="Feature">
            </div>
            <div class="col-md-7">
                <div class="section-header">	
                    <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>	
                <div class="features-slider slider">
                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="{{asset('front/img/features/feature-01.jpg')}}" class="img-fluid" alt="Feature">
                        <p>Patient Ward</p>
                    </div>
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="{{asset('front/img/features/feature-02.jpg')}}" class="img-fluid" alt="Feature">
                        <p>Test Room</p>
                    </div>
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="{{asset('front/img/features/feature-03.jpg')}}" class="img-fluid" alt="Feature">
                        <p>ICU</p>
                    </div>
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="{{asset('front/img/features/feature-04.jpg')}}" class="img-fluid" alt="Feature">
                        <p>Laboratory</p>
                    </div>
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="{{asset('front/img/features/feature-05.jpg')}}" class="img-fluid" alt="Feature">
                        <p>Operation</p>
                    </div>
                    <!-- /Slider Item -->
                    
                    <!-- Slider Item -->
                    <div class="feature-item text-center">
                        <img src="{{asset('front/img/features/feature-06.jpg')}}" class="img-fluid" alt="Feature">
                        <p>Medical</p>
                    </div>
                    <!-- /Slider Item -->
                </div>
            </div>
       </div>
    </div>
</section>		
<!-- Availabe Features -->
@endsection