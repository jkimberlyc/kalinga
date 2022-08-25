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
                    <a class="" href="{{url('/register')}}">
                        <button class="btn fs-5 p-1 rounded-0"><i class="bx bx bxs-band-aid fs-4 align-middle"></i>
                            Sign up
                            as
                            Patient</button></a>
                </div>
                @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
                @endif
                <div class="title"><code>Doctor Sign Up</code></div>
                {{-- <span class="title">Basic Info</span> --}}

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-md-2">
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
                            {{-- <label for="genderSelect"></label> --}}
                            <select name="genderSelect" id="genderSelect" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="input-field col-md col-12 my-1">
                            <input type="tel" placeholder="Phone Number (optional)" name="phoneNumber">
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="tel" placeholder="Mobile Number" name="mobileNumber" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="input-field col-md-8 col-12 my-1">
                            <input type="tel" placeholder="Address" name="address" required>
                        </div>

                        <div class="input-field col-md-2 col-12 my-1">
                            <template id="cityList">
                                @foreach ($cities as $city)
                                <option>{{$city}}</option>
                                @endforeach
                            </template>
                            <input type="text" placeholder="City" name="city" list="cities" id="cityInput" required>
                            <datalist id="cities"></datalist>
                        </div>

                        <div class="input-field col-md-2 col-12 my-1">
                            <template id="provinceList">
                                @foreach ($provinces as $province)
                                <option>{{$province}}</option>
                                @endforeach
                            </template>
                            <input type="text" placeholder="Province" list="provinces" name="province"
                                id="provinceInput" required>
                            <datalist id="provinces"></datalist>
                        </div>
                    </div>

                    <hr class="mt-5 border-bottom rounded-0" style="border: 10px solid #695968;">
                    {{-- <span class="title">Work Info</span> --}}

                    <div class="row mb-md-3 mt-3 custom-file-button">
                        <div class="input-group col">
                            <label class="input-group-text rounded-0 p-3" for="inputGroupFile02">Doctor's
                                License</label>
                            <input type="file" class="form-control border-0 border-bottom rounded-0 p-3"
                                id="licenseInput" accept="application/pdf" name="license" required>
                        </div>
                    </div>

                    <div class="row mb-md-3 mt-3">
                        <div class="">
                            <label for="specializationSelect">Specialization</label>
                        </div>
                        <div class="input-field col-md col-12 my-1">
                            <select name="specializationSelect" id="specializationSelect">
                                <option value="">Select Specialization</option>
                                <option value="OPTHALMOLOGY">OPTHALMOLOGY</option>
                                <option value="PEDIATRICS">PEDIATRICS</option>
                            </select>
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="text" placeholder="If others, please specify here" name="specialization"
                                id="specialization">
                        </div>

                        <div class="input-field col-md-2 col-12 button m-0">
                            <input type="button" class="btn btn-sm" value="Add" id="addSpecialty">
                        </div>

                        <div class="mt-1" id="specialties"></div>
                    </div>

                    <div class="row mb-md-3 mt-3">

                    </div>

                    <hr class="mt-5 border-bottom rounded-0" style="border: 10px solid #695968;">
                    {{-- <span class="title">Account Info</span> --}}

                    <div class="row mb-md-3">
                        <div class="input-field col-md col-12 my-1">
                            <input type="email" placeholder="Email" name="email" required>
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="password" placeholder="Password" name="password" required>
                        </div>

                        <div class="input-field col-md col-12 my-1">
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>
                    </div>


                    <div class="input-field button">
                        <input type="submit" value="Signup">
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
<script src="{{asset('js/register-doc.js')}}"></script>
<script src="{{asset('js/register.js')}}"></script>
@endsection
