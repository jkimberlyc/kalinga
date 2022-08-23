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
    

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/3bdf664df4.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- TOP NAV START-->
    <div class="top-nav">
      <nav class="navbar-expand-lg">
        <div class="row justify-content-center align-items-center ">
          <div class="col">
            <div class="mytoggle">
              <i class="fa-solid fa-bars-staggered"></i>
            </div>
          </div>
          <div class="col text-center">
            <div class="logo">
              <h1>JAR</h1>
            </div>
          </div>
          <div class="col ">
            <div class="d-flex justify-content-end">
              <i class="fa-solid fa-bell mt-1"></i>
              <span class="user">Doctor Name</span>
              <img src="./images/slide_new.png" class="user-Img" />
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- TOP NAV  END-->
    <!-- SIDE NAV START -->
    <div class="side-nav">
      <div class="d-flex align-items-start">
        <div
          class="nav flex-column nav-pills me-3 side-bar"
          id="v-pills-tab"
          role="tablist"
          aria-orientation="vertical"
          >
          <button
            class="nav-link active"
            id="v-pills-dashboard-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-dashboard"
            type="button"
            role="tab"
            aria-controls="v-pills-dashboard"
            aria-selected="true"
          >
            <i class="fa-solid fa-laptop fs-3"></i>
            <h6>Dashboard</h6>
          </button>
          <hr />

          <button
            class="nav-link"
            id="v-pills-schedule-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-schedule"
            type="button"
            role="tab"
            aria-controls="v-pills-schedule"
            aria-selected="false"
          >
            <i class="fa-solid fa-calendar-days fs-3"></i>
            <h6>Schedule</h6>
          </button>
          <hr />
          <button
            class="nav-link"
            id="v-pills-request-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-request"
            type="button"
            role="tab"
            aria-controls="v-pills-request"
            aria-selected="false"
          >
            <i class="fa-solid fa-code-pull-request fs-3"></i>
            <h6>Request</h6>
          </button>
          <hr />
          <button
            class="nav-link"
            id="v-pills-setting-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-setting"
            type="button"
            role="tab"
            aria-controls="v-pills-setting"
            aria-selected="false"
          >
            <i class="fa-solid fa-gears fs-3"></i>
            <h6>Settings</h6>
          </button>
          <hr />
          <button
            class="nav-link"
            id="v-pills-logout-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-logout"
            type="button"
            role="tab"
            aria-controls="v-pills-logout"
            aria-selected="false"
             >
              <i class="fa-solid fa-arrow-right-to-bracket fs-3"></i>
            <h6>Logout</h6>
          </button>
        </div>
        <!-- DASHBOARD START -->
        <div class="tab-content" id="v-pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="v-pills-dashboard"
            role="tabpanel"
            aria-labelledby="v-pills-dashboard-tab"
            tabindex="0"
            >
            
            <div class="admin-content navbar-expand-sm dashboard-menu">
              <div class="d-flex flex-column flex-md-row ">
                <h5 class="">My Dashboard</h5>
                <ul class="navbar-nav d-flex flex-row">
                  <li class="nav-item">Home</li>
                  <li class="nav-item middle">Dashboard</li>
                  <li class="nav-item">Logout</li>
                </ul>
              </div>
            </div>
            <hr />
            <div class="pt-3">
              <div class="row d-flex flex-column flex-md-row">
                <div class="col c3">
                  <h5 id="tableTitle">Current Appointments</h5>
                  <hr>
                  <div class="outer-div table-responsive">
                    <div class="inner-div">
                      <table class="table text-center w-100">
                        <thead>
                          <th>Patient Name</th>
                          <th>Age</th>
                          <th>Symptomps</th>
                          <th>Schedule</th>
                          <th>Address</th>
                          <th>Contact No.</th>
                          <th>Action</th>
                        </thead>
                        <tbody id="appointmentTable" class="align-middle">
                          <tr>
                            <td data-label="Patient Name">Robin</td>
                            <td data-label="Age">29</td>
                            <td data-label="Symptoms">Halucination</td>
                            <td data-label="Schedule">8-20-22</td>
                            <td data-label="Address">Caloocan</td>
                            <td data-label="Contact No.">1234678931</td>
                            <td>
                              <div class="d-flex flex-column flex-md-row">
                                <button class="mb-2 m-1">Add Prescription</button>
                                <button class="mb-2 m-1">Generate Medcert</button>
                                <button class="mb-2 m-1">Set Payment</button>
                              </div>
                              
                            </td>
                          </tr>
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
          <div
            class="tab-pane fade"
            id="v-pills-schedule"
            role="tabpanel"
            aria-labelledby="v-pills-schedule-tab"
            tabindex="0"
          >
            <div>
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-center"> 
                  <h5>My Schedule</h5>
              </div>
                <hr />
                <div class="">
                  <div class="col c1 text-center">
                    <p>My Schedule</p>
                    <div id="timeDisplay"></div>
                    <ul id="menu">
                      
                    </ul>
                    <input
                      type="time"
                      id="input-list"
                      placeholder="add a time"
                    />
                    <input type="button" value="Add Time" onclick="insertHome()" class="btn btn-primary" />
                    {{-- <div id="addDiv">
                      <button id="addTime">Add Time</button>
                    </div> --}}
                  </div>
                </div>
            </div>
          </div>
          <!--SCHEDULE END--> 
          <!-- REQUEST START-->
          <div
            class="tab-pane fade"
            id="v-pills-request"
            role="tabpanel"
            aria-labelledby="v-pills-request-tab"
            tabindex="0"
            >

            
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center"> 
              <div>
                <h5 class="">Request</h5>
              </div>
              <div class="mySearch">
                <form action="#" >
                  <input type="text" name="search" id="searh">
                  <button class="searchButton">Search</button>
                </form>
              </div>
            </div>
              <hr>
            
            <div class="myrequesttab card p-4">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item card me-2 mb-2" role="presentation">
                  <button class="nav-link active" id="pills-myrequest-tab" data-bs-toggle="pill" data-bs-target="#pills-myrequest" type="button" role="tab" aria-controls="pills-myrequest" aria-selected="true">Appointment Requests</button>
                </li>
                <li class="nav-item card mb-2" role="presentation">
                  <button class="nav-link" id="pills-medcert-tab" data-bs-toggle="pill" data-bs-target="#pills-medcert" type="button" role="tab" aria-controls="pills-medcert" aria-selected="false">Medical Certificate Requests</button>
                </li>
              </ul>
              <div class="tab-content bg-transparent pt-1 p-0" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-myrequest" role="tabpanel" aria-labelledby="pills-myrequest-tab" tabindex="0">
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
                        <th>Appointments</th>
                      </thead>
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
                <div class="tab-pane fade" id="pills-medcert" role="tabpanel" aria-labelledby="pills-medcert-tab" tabindex="0">
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
            {{--  --}}
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
          <div
            class="tab-pane fade"
            id="v-pills-setting"
            role="tabpanel"
            aria-labelledby="v-pills-setting-tab"
            tabindex="0"
            >
            <div class=""> 
                <div>
                  <h5>Settings</h5>
                </div>
              <hr>
                <div class="row d-flex flex-column flex-md-row">
                  <div class="col card m-2 p-4">
                    <h5>Edit Profile</h5>
                    <div>
                      <input type="text" name="fname" id="fname" placeholder="First name" class="form-control mb-2">
                      <input type="text" name="lname" id="lname" placeholder="Last name" class="form-control mb-2">
                      <input type="text" name="address" id="address" placeholder="Address" class="form-control mb-2">
                      <input type="text" name="phone" id="phone" placeholder="Contact number" class="form-control mb-2">
                      <label for="avatar" class="form-label">Change avatar</label><br>
                      <input type="file" name="avatar" id="avatar" class="form-control mb-2">
                      <input type="sumbit" name="update" id="update" value="Update" class="btn btn-danger">
                    </div>
                  </div>
                  <div class="col card m-2 p-4">
                    <h5>Change Password</h5>
                    <div>
                      <input type="text" name="oldpassword" id="oldpassword" placeholder="Old password" class="form-control mb-2">
                      <input type="text" name="newpassword" id="newpassword" placeholder="New password" class="form-control mb-2">
                      <input type="sumbit" name="update" id="update" value="Update" class="btn btn-danger">
                    </div>
                  </div>
                </div>
            </div>
          </div>  
           <!--SETTINGS END-->
          <div
            class="tab-pane fade"
            id="v-pills-logout"
            role="tabpanel"
            aria-labelledby="v-pills-logout-tab"
            tabindex="0"
            >
          </div>
        </div>
      </div>
    </div>
    <!-- SIDE NAV END -->

    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="./js/admin.js"></script> -->

    <script src="{{asset('js/addtime.js')}}" defer></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>

    {{-- CALENDAR SCRIPT --}}
    
    {{--  --}}
  </body>
</html>
