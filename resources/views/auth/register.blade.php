@extends('layouts.app')

@section('more-css')
<link rel="stylesheet" href="{{asset('css/doctor.css')}}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@endsection

@section('content')
<main class="container-fluid d-flex flex-column align-items-center p-0" style="min-height: 100vh">
    <div class="container container-register px-sm-5 px-3">
        <div class="forms">
            <div class="form">
                <div class="mb-3 signup-doctor d-block text-end">
                    <a class="" href="{{url('/register/doctor')}}">
                        <button class="btn fs-5 p-1 rounded-0"><i class="bx bx bx-plus-medical fs-4 align-middle"></i>
                            Sign up
                            as
                            Doctor</button></a>
                </div>
                <span class="title"><code>Patient Sign Up</code></span>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row mb-md-3">
                        <div class="input-field col-md col-12 my-1">
                            <input type="text" placeholder="First Name" name="firstName" required>
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="text" placeholder="Middle Name" name="middleName" required>
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="text" placeholder="Last Name" name="lastName" required>
                        </div>
                    </div>

                    <div class="row mb-md-3">
                        <div class="input-field col-md col-12 my-1">
                            <label for="birthdate">Birthday</label>
                            <input type="date" placeholder="Birthdate" name="birthdate" id="birthdate" required>
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <label for="genderSelect"></label>
                            <select name="genderSelect" id="genderSelect" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 mt-5">
                        <div class="input-field col-md col-12 my-1">
                            <input type="tel" placeholder="Phone Number (optional)" name="phoneNumber">
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="tel" placeholder="Mobile Number" name="mobileNumber" required>
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="tel" placeholder="Emergency Contact" name="emergencyContact" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="input-field col-md-8 col-12 my-1">
                            <input type="tel" placeholder="Address" name="address" required>
                        </div>

                        <div class="input-field col-md-2 col-12 my-1">
                            <input type="text" placeholder="City" name="city" required>
                        </div>

                        <div class="input-field col-md-2 col-12 my-1">
                            <input type="text" placeholder="Province" name="province" required>

                        </div>
                    </div>

                    <hr class="mt-5 border-bottom rounded-0" style="border: 10px solid #695968;">
                    {{-- <span class="title">Account Info</span> --}}

                    <div class="row mb-md-3">
                        <div class="input-field col-12 my-1">
                            <input type="email" placeholder="Email" name="email" required>
                        </div>

                        <div class="input-field col-12 my-1">
                            <input type="password" placeholder="Password" name="password" required>
                        </div>

                        <div class="input-field col-12 my-1">
                            <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
                        </div>
                    </div>
                    <div class="input-field button">
                        <input type="button" value="Signup">
                    </div>
                    <div class="login-signup">
                        <span class="text">Already a member?
                            <a href="{{url('/login')}}" class="text login-link">Login now</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@include('layouts.footer')
<script src="{{asset('js/navbar_v2.js')}}"></script>
@endsection
