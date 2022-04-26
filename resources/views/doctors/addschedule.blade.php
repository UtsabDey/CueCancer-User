@extends('layouts.master2')
@section('title','CueCancer')
@section('content')
<!-- Page Content -->
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('partials.flash')
    <div class="card">
        <div class="card_body">
            <form action="{{ url('doctor/schedule/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">Basic Information</h4>
                <div class="row form-row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $user->id }}">
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
                            <select class="form-control" value="{{ $user->time_from }}" name="time_from" required>
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
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Page Content -->
@endsection