@extends('layouts.app')

@section('more-css')
<style>
    .book:hover {
        background-color: indigo !important;
        transition: 0.5s ease;
    }
</style>
@endsection

@section('content')
<main class="container-fluid d-flex flex-column align-items-center p-0" style="min-height: 100vh">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center pb-3"
        style="background-color: indigo">
        <div class=" display-6 text-start fw-bolder text-white" style="margin-top:120px;">Search Doctor</div>
        <div class="p-3 pb-1 mx-auto rounded-3 container" id="searchbar">
            <form action="/search" method="post">
                @csrf
                <div class="row g-2">
                    <div class="col-md-5">
                        <div class="form-floating">
                            <select type="text" class="form-select rounded-1 text-dark" list="specializations"
                                id="specializationInput" placeholder="EX. PEDIATRICS" name="specialization" required>
                                <option value="">Select Specialization</option>
                                @foreach($specializations as $specialization)
                                <option value="{{$specialization->specialization}}" @if (($specialization->
                                    specialization) == ($request['specialization'])) {{"selected"}} @endif>
                                    {{$specialization->specialization}}
                                </option>
                                @endforeach
                            </select>
                            <label class="align-middle" for="specialization">Specialization</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <template id="locationList">
                            @foreach($locations as $location)
                            <option>
                                {{$location}}
                            </option>
                            @endforeach
                        </template>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-1 text-dark" list="locations"
                                id="locationInput" placeholder="CITY, PROVINCE" name="location"
                                value="{{$request['location']}}" required>
                            <label class="align-middle" for="locationInput">Location</label>
                            <datalist id="locations"></datalist>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn w-100 fs-1 rounded-1" type="submit"
                            style="height:58px;background-color:#b83cc4"><i class='bx bx-search-alt text-white'
                                id="search-btn"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        @if (count($searchResults))
        <div class="card p-4 my-2">
            <h1 class="fw-bold"><code>{{count($searchResults)}} Results</code></h1>
            @foreach ($searchResults as $result)
            <div class="card p-4 my-2 d-flex flex-sm-row bg-light align0-items-center">
                <div class="align-middle">
                    <img src="/images/stethoscope.png" alt="" class="pe-4 img-fluid d-sm-block d-none" width="140px">
                </div>
                <div class="pe-3">
                    <h2 class="fw-bold">{{$result->lastName}}, {{$result->firstName}} {{substr($result->middleName, 0,
                        1)}}.</h2>
                    <h4 class="fw-bold"><code>{{$specialty->specialization}}</code></h4>
                    <h5>{{$result->gender}}</h5>
                </div>
                <div class="ps-3 border-start">
                    {{-- <h5 class="fw-bold">Hospital/Clinic</h5> --}}
                    <h5 class="fw-bold">{{$result->hospitalName}}</h5>
                    <h5>{{$result->hospitalAddress}}, {{$result->hospitalCity}}, {{$result->hospitalProvince}}</h5>
                    <hr>
                    @php
                    $match = false;
                    @endphp
                    @foreach ($timeslots as $time)
                    @if ($time->doctor_id == $result->doctor_id)
                    <h5 class="">{{$time->day}}, {{$time->startTime}}-{{$time->endTime}}</h5>
                    @php
                    $match = true;
                    @endphp
                    @endif
                    @endforeach

                    @if (!$match)
                    <h5>No schedule set.</h5>
                    @endif
                    <form action="/bookAppointment" method="post">
                        @csrf
                        <input type="hidden" name="hospital_id" value="{{$result->hospital_id}}">
                        <input type="hidden" name="doctor_id" value="{{$result->doctor_id}}">
                        <input type="hidden" name="specialty_id" value="{{$specialty->id}}">
                        @auth
                        <button type="submit" class="btn my-3 ms-auto py-2 px-3 fs-6 text-white book"
                            style="background-color:#b83cc4"><i class='bx bx-bookmark-plus align-middle pe-2'></i>Book
                            an
                            Appointment</button>
                        @endauth
                        @guest
                        <span class="text-danger">Sign up or sign in to book an appointment.</span>
                        @endguest
                    </form>

                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="card p-4 m-2">
            <h1>No results</h1>
        </div>
        @endif

    </div>
    @include('layouts.footer')
</main>
<script src="{{asset('js/navbar_v2.js')}}"></script>
<script src="{{asset('js/search.js')}}"></script>
@endsection
