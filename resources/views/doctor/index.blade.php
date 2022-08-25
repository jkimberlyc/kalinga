<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor</title>

    <link rel="stylesheet" href="{{ asset('css/top-nav.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/side-bar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-content.css') }}" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/3bdf664df4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- TOP NAV START-->
    <div class="top-nav">
        <nav class="navbar-expand-lg">
            <div class="d-flex flex-row justify-content-between align-items-center ">
                <div class="">
                    <a class="navbar-brand d-sm-block d-none" href="{{ url('/') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        <img src="{{asset('images/logo-light.png')}}" alt="" height="40px">
                    </a>
                    <a class="navbar-brand d-sm-none d-block" href="{{ url('/') }}">
                        <img src="{{asset('images/logo-dark.png')}}" alt="" height="40px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class=" text-end">
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="{{ (request()->segment(1)) == 'login' ? 'nav-link right active' : 'nav-link right' }}"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="{{ (request()->segment(1)) == 'register' ? 'active nav-link right' : 'nav-link right' }}"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle right" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- TOP NAV  END-->
    <!-- SIDE NAV START -->
    <div class="side-nav">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3 side-bar" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard"
                    aria-selected="true">
                    <i class="fa-solid fa-laptop fs-3"></i>
                    <h6>Dashboard</h6>
                </button>
                <hr />

                <button class="nav-link" id="v-pills-schedule-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-schedule" type="button" role="tab" aria-controls="v-pills-schedule"
                    aria-selected="false">
                    <i class="fa-solid fa-calendar-days fs-3"></i>
                    <h6>Schedule</h6>
                </button>
                <hr />
                <button class="nav-link" id="v-pills-request-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-request" type="button" role="tab" aria-controls="v-pills-request"
                    aria-selected="false">
                    <i class="fa-solid fa-code-pull-request fs-3"></i>
                    <h6>Request</h6>
                </button>
                <hr />
                <button class="nav-link" id="v-pills-setting-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-setting" type="button" role="tab" aria-controls="v-pills-setting"
                    aria-selected="false">
                    <i class="fa-solid fa-gears fs-3"></i>
                    <h6>Settings</h6>
                </button>
                <hr />

                <button class="nav-link" id="v-pills-logout-tab" data-bs-target="#v-pills-logout" type="button"
                    role="tab" aria-controls="v-pills-logout" aria-selected="false" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-to-bracket fs-3"></i>
                    <h6>Logout</h6>
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!-- DASHBOARD START -->
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                    aria-labelledby="v-pills-dashboard-tab" tabindex="0">

                    <div class="admin-content navbar-expand-sm dashboard-menu">
                        <div class="d-flex flex-column flex-md-row ">
                            <h5 class="">My Dashboard</h5>
                            {{-- <ul class="navbar-nav d-flex flex-row">
                                <li class="nav-item">Home</li>
                                <li class="nav-item middle">Dashboard</li>
                                <li class="nav-item">Logout</li>
                            </ul> --}}
                        </div>
                    </div>
                    <hr />
                    <div class="container-fluid">
                        <div class="row d-flex flex-column flex-md-row">
                            <div class="col c3 px-5">
                                <h5 id="tableTitle">Current Appointments</h5>
                                <hr>
                                <div class="outer-div table-responsive">
                                    <div class="inner-div">
                                        <table class="table text-center w-100">
                                            <thead>
                                                <th>Patient Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Symptomps</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Hospital</th>
                                                <th>Address</th>
                                                <th>Contact No.</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="appointmentTable" class="align-middle">
                                                @if (count($data))
                                                @foreach ($data as $appointment)
                                                @if ($appointment['status'] == "Approved")
                                                <tr>
                                                    <td data-label="Patient Name">{{$appointment['patientName']}}</td>
                                                    <td data-label="Age">{{$appointment['age']}}</td>
                                                    <td data-label="Gender">{{$appointment['gender']}}</td>
                                                    <td data-label="Symptoms">{{$appointment['symptoms']}}</td>
                                                    <td data-label="Date">{{$appointment['date']}}</td>
                                                    <td data-label="Time">
                                                        {{$appointment['time']}}</td>
                                                    <td data-label="Hospital">{{$appointment['hospital']}}</td>
                                                    <td data-label="Address">{{$appointment['hospitalAddress']}},
                                                        {{$appointment['hospitalCity']}},
                                                        {{$appointment['hospitalProvince']}}</td>
                                                    <td data-label="Contact No.">{{$appointment['contact']}}</td>
                                                    <td>
                                                        <form action="/updateStatus/{{$appointment['id']}}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{$appointment['id']}}">
                                                            <div
                                                                class="d-flex flex-column flex-md-row justify-content-center h5 align-items-center">
                                                                <button name="status" type="submit" class="mb-2 m-1"
                                                                    title="Mark as Complete" value="Completed"><i
                                                                        class='bx bx-check'></i></button>
                                                                <button name="status" type="button" class="mb-2 m-1"
                                                                    title="Edit"><i class='bx bx-pencil'></i></button>
                                                                <button name="status" type="submit" class="mb-2 m-1"
                                                                    title="Cancel" value="Cancelled"><i
                                                                        class='bx bx-x'></i></button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @else
                                                <h5>No appointments to display.</h5>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="footer">
                            <div class="row d-flex flex-column flex-md-row justify-content-between">
                                <div class="col">
                                    <p>Alright Reserved JAR 2022</p>
                                </div>
                                <div class="col text-md-end">
                                    <p>We are team Jar Philippines</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--DASHBOARD END-->
                <!--SCHEDULE START-->
                <div class="tab-pane fade" id="v-pills-schedule" role="tabpanel" aria-labelledby="v-pills-schedule-tab"
                    tabindex="0">
                    <div class="container-fluid">
                        <div class="row d-flex flex-column flex-md-row">
                            <div class="col c3 px-5">
                                <h5 id="tableTitle">Completed Appointments</h5>
                                <hr>
                                <div class="outer-div table-responsive">
                                    <div class="inner-div">
                                        <table class="table text-center w-100">
                                            <thead>
                                                <th>Patient Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Symptomps</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Hospital</th>
                                                <th>Address</th>
                                                <th>Contact No.</th>
                                                <th>Medical Cert.</th>
                                            </thead>
                                            <tbody id="appointmentTable" class="align-middle">
                                                @if (count($data))
                                                @foreach ($data as $appointment)
                                                @if ($appointment['status'] == "Completed")
                                                <tr>
                                                    <td data-label="Patient Name">{{$appointment['patientName']}}</td>
                                                    <td data-label="Age">{{$appointment['age']}}</td>
                                                    <td data-label="Gender">{{$appointment['gender']}}</td>
                                                    <td data-label="Symptoms">{{$appointment['symptoms']}}</td>
                                                    <td data-label="Date">{{$appointment['date']}}</td>
                                                    <td data-label="Time">
                                                        {{$appointment['time']}}</td>
                                                    <td data-label="Hospital">{{$appointment['hospital']}}</td>
                                                    <td data-label="Address">{{$appointment['hospitalAddress']}},
                                                        {{$appointment['hospitalCity']}},
                                                        {{$appointment['hospitalProvince']}}</td>
                                                    <td data-label="Contact No.">{{$appointment['contact']}}</td>
                                                    <td>
                                                        <a
                                                            href="{{action('App\Http\Controllers\DoctorController@downloadPDF', $appointment['id'])}}"><button>Generate</button></a>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @else
                                                <h5>No appointments to display.</h5>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="footer">
                            <div class="row d-flex flex-column flex-md-row justify-content-between">
                                <div class="col">
                                    <p>Alright Reserved JAR 2022</p>
                                </div>
                                <div class="col text-md-end">
                                    <p>We are team Jar Philippines</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--SCHEDULE END-->
                <!-- REQUEST START-->
                <div class="tab-pane fade" id="v-pills-request" role="tabpanel" aria-labelledby="v-pills-request-tab"
                    tabindex="0">


                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div>
                            <h5 class="">Request</h5>
                        </div>
                        <div class="mySearch">
                            <form action="#">
                                <input type="text" name="search" id="searh">
                                <button class="searchButton">Search</button>
                            </form>
                        </div>
                    </div>
                    <hr>

                    <div class="myrequesttab card p-4">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item card me-2 mb-2" role="presentation">
                                <button class="nav-link active" id="pills-myrequest-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-myrequest" type="button" role="tab"
                                    aria-controls="pills-myrequest" aria-selected="true">Appointment Requests</button>
                            </li>
                            <li class="nav-item card mb-2" role="presentation">
                                <button class="nav-link" id="pills-medcert-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-medcert" type="button" role="tab"
                                    aria-controls="pills-medcert" aria-selected="false">Medical Certificate
                                    Requests</button>
                            </li>
                        </ul>
                        <div class="tab-content bg-transparent pt-1 p-0" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-myrequest" role="tabpanel"
                                aria-labelledby="pills-myrequest-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table text-center w-100">
                                        <thead>
                                            <th>Patient Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Symptomps</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Hospital</th>
                                            <th>Address</th>
                                            <th>Contact No.</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody id="appointmentTable" class="align-middle">
                                            @if (count($data))
                                            @foreach ($data as $appointment)
                                            @if ($appointment['status'] == NULL)
                                            <tr>
                                                <td data-label="Patient Name">{{$appointment['patientName']}}</td>
                                                <td data-label="Age">{{$appointment['age']}}</td>
                                                <td data-label="Gender">{{$appointment['gender']}}</td>
                                                <td data-label="Symptoms">{{$appointment['symptoms']}}</td>
                                                <td data-label="Date">{{$appointment['date']}}</td>
                                                <td data-label="Time">
                                                    {{$appointment['time']}}</td>
                                                <td data-label="Hospital">{{$appointment['hospital']}}</td>
                                                <td data-label="Address">{{$appointment['hospitalAddress']}},
                                                    {{$appointment['hospitalCity']}},
                                                    {{$appointment['hospitalProvince']}}</td>
                                                <td data-label="Contact No.">{{$appointment['contact']}}</td>
                                                <td>
                                                    <form action="/updateStatus/{{$appointment['id']}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$appointment['id']}}">
                                                        <div
                                                            class="d-flex flex-column flex-md-row justify-content-center align-items-center align-middle">
                                                            <button class="mb-2 m-1" name="status"
                                                                value="Approved">Accept</button>
                                                            <button class="mb-2 m-1" name="status"
                                                                value="Rejected">Reject</button>
                                                        </div>

                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @else
                                            <h5>No requests to display.</h5>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-medcert" role="tabpanel"
                                aria-labelledby="pills-medcert-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Age</th>
                                            <th>Education</th>
                                            <th>Specialization</th>
                                            <th>Hospital</th>
                                            <th>Availability</th>
                                            <th>Contact no.</th>
                                            <th>Request</th>
                                        </thead>
                                        <tbody>
                                        <tbody class="align-middle">
                                            <tr>
                                                <td data-label="First name">Robin</td>
                                                <td data-label="Last name">Paje</td>
                                                <td data-label="Age">29</td>
                                                <td data-label="Education">MDQ</td>
                                                <td data-label="Specialization">Quacking</td>
                                                <td data-label="Hospital">Gedli lang</td>
                                                <td data-label="Availability">Any time, any where</td>
                                                <td data-label="Contact no.">12345678910</td>
                                                <td data-label="Actions">
                                                    <div>
                                                        <button>Accept</button>
                                                        <button>Reject</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-label="First name">Robin</td>
                                                <td data-label="Last name">Paje</td>
                                                <td data-label="Age">29</td>
                                                <td data-label="Education">MDQ</td>
                                                <td data-label="Specialization">Quacking</td>
                                                <td data-label="Hospital">Gedli lang</td>
                                                <td data-label="Availability">Any time, any where</td>
                                                <td data-label="Contact no.">12345678910</td>
                                                <td data-label="Actions">
                                                    <div>
                                                        <button>Accept</button>
                                                        <button>Reject</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-label="First name">Robin</td>
                                                <td data-label="Last name">Paje</td>
                                                <td data-label="Age">29</td>
                                                <td data-label="Education">MDQ</td>
                                                <td data-label="Specialization">Quacking</td>
                                                <td data-label="Hospital">Gedli lang</td>
                                                <td data-label="Availability">Any time, any where</td>
                                                <td data-label="Contact no.">12345678910</td>
                                                <td data-label="Actions">
                                                    <div>
                                                        <button>Accept</button>
                                                        <button>Reject</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- --}}
                    {{-- <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Age</th>
                                <th>Education</th>
                                <th>Specialization</th>
                                <th>Hospital</th>
                                <th>Availability</th>
                                <th>Contact no.</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="First name">Robin</td>
                                    <td data-label="Last name">Paje</td>
                                    <td data-label="Age">29</td>
                                    <td data-label="Education">MDQ</td>
                                    <td data-label="Specialization">Quacking</td>
                                    <td data-label="Hospital">Gedli lang</td>
                                    <td data-label="Availability">Any time, any where</td>
                                    <td data-label="Contact no.">12345678910</td>
                                    <td data-label="Actions">
                                        <div>
                                            <button>Accept</button>
                                            <button>Reject</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="First name">Robin</td>
                                    <td data-label="Last name">Paje</td>
                                    <td data-label="Age">29</td>
                                    <td data-label="Education">MDQ</td>
                                    <td data-label="Specialization">Quacking</td>
                                    <td data-label="Hospital">Gedli lang</td>
                                    <td data-label="Availability">Any time, any where</td>
                                    <td data-label="Contact no.">12345678910</td>
                                    <td data-label="Actions">
                                        <div>
                                            <button>Accept</button>
                                            <button>Reject</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="First name">Robin</td>
                                    <td data-label="Last name">Paje</td>
                                    <td data-label="Age">29</td>
                                    <td data-label="Education">MDQ</td>
                                    <td data-label="Specialization">Quacking</td>
                                    <td data-label="Hospital">Gedli lang</td>
                                    <td data-label="Availability">Any time, any where</td>
                                    <td data-label="Contact no.">12345678910</td>
                                    <td data-label="Actions">
                                        <div>
                                            <button>Accept</button>
                                            <button>Reject</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
                <!-- REQUEST END-->
                <!-- SETTING START -->
                <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab"
                    tabindex="0">
                    <div class="">
                        <div>
                            <h5>Settings</h5>
                        </div>
                        <hr>
                        <div class="row d-flex flex-column flex-md-row">
                            <div class="col card m-2 p-4">
                                <h5>Edit Profile</h5>
                                <div>
                                    <input type="text" name="fname" id="fname" placeholder="First name"
                                        class="form-control mb-2">
                                    <input type="text" name="lname" id="lname" placeholder="Last name"
                                        class="form-control mb-2">
                                    <input type="text" name="address" id="address" placeholder="Address"
                                        class="form-control mb-2">
                                    <input type="text" name="phone" id="phone" placeholder="Contact number"
                                        class="form-control mb-2">
                                    <label for="avatar" class="form-label">Change avatar</label><br>
                                    <input type="file" name="avatar" id="avatar" class="form-control mb-2">
                                    <input type="sumbit" name="update" id="update" value="Update"
                                        class="btn btn-danger">
                                </div>
                            </div>
                            <div class="col card m-2 p-4">
                                <h5>Change Password</h5>
                                <div>
                                    <input type="text" name="oldpassword" id="oldpassword" placeholder="Old password"
                                        class="form-control mb-2">
                                    <input type="text" name="newpassword" id="newpassword" placeholder="New password"
                                        class="form-control mb-2">
                                    <input type="sumbit" name="update" id="update" value="Update"
                                        class="btn btn-danger">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--SETTINGS END-->
                <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab"
                    tabindex="0">
                </div>
            </div>
        </div>
    </div>
    <!-- SIDE NAV END -->

    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="./js/admin.js"></script> -->

    <script src="{{asset('js/addtime.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    {{-- CALENDAR SCRIPT --}}

    {{-- --}}
</body>

</html>
