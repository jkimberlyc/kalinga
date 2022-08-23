<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    
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
          <div class="col-2 text-center">
            <div class="logo">
              <h1>JAR</h1>
            </div>
          </div>
          <div class="col">
          
            <div class="d-flex justify-content-end">
                <div class="form-check form-switch me-2">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                </div>
              <i class="fa-solid fa-bell mt-1"></i>
              <span class="user">Test Name</span>
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
            id="v-pills-home-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-home"
            type="button"
            role="tab"
            aria-controls="v-pills-home"
            aria-selected="true"
          >
            <i class="fa-solid fa-laptop fs-3"></i>
            <h6>Dashboard</h6>
          </button>
          <hr />

          <button
            class="nav-link"
            id="v-pills-profile-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-profile"
            type="button"
            role="tab"
            aria-controls="v-pills-profile"
            aria-selected="false"
          >
            <i class="fa-solid fa-user fs-3"></i>
            <h6>Patient List</h6>
          </button>
          <hr />
          <button
            class="nav-link"
            id="v-pills-messages-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-messages"
            type="button"
            role="tab"
            aria-controls="v-pills-messages"
            aria-selected="false"
          >
            <i class="fa-solid fa-sliders fs-3"></i>
            <h6>Doctors</h6>
          </button>
          <hr />
          <button
            class="nav-link"
            id="v-pills-hospital-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-hospital"
            type="button"
            role="tab"
            aria-controls="v-pills-hospital"
            aria-selected="false"
          >
            <i class="fa-solid fa-hospital fs-3"></i>
            <h6>Hospital</h6>
          </button>
          <hr />
          <button
            class="nav-link"
            id="v-pills-settings-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-settings"
            type="button"
            role="tab"
            aria-controls="v-pills-settings"
            aria-selected="false"
          >
          <i class="fa-solid fa-arrow-right-to-bracket fs-3"></i>
            <h6>Logout</h6>
          </button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="v-pills-home"
            role="tabpanel"
            aria-labelledby="v-pills-home-tab"
            tabindex="0"
          >
            <!-- DASHBOARD -->
            <div class="admin-content navbar-expand-sm dashboard-menu">
              <div class="d-flex flex-column flex-md-row ">
                <h5 class="">Dashboard</h5>
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
                <div class="col-md-2">
                  <div class="row d-flex flex-row flex-md-column">
                    <div class="col text-center c1" onclick="pending()">
                      <i class="fa-solid fa-clock fs-3"></i>
                      <p class="parag">Pending</p>
                      <p>1</p>
                    </div>
                    <div class="col text-center c1" onclick="complete()">
                      <i class="fa-solid fa-list fs-3"></i>
                      <p class="parag">Complete</p>
                      <p>1</p>
                    </div>
                    <div class="col text-center c1" onclick="cancelled()">
                      <i class="fa-solid fa-rotate fs-3"></i>
                      <p class="parag">Cancelled</p>
                      <p>1</p>
                    </div>
                  </div>
                  
                </div>
                <div class="col c3">
                  <h5 id="tableTitle"></h5>
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
                        </thead>
                        <tbody id="appointmentTable"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="mt-3">
                <div class="row">
                  <div class="col c1 text-center">
                    <p>Categories</p>
                    <img src="./images/Screenshot (1).png" />
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

          <div
            class="tab-pane fade"
            id="v-pills-profile"
            role="tabpanel"
            aria-labelledby="v-pills-profile-tab"
            tabindex="0"
          >
            <!-- PATIENT LIST -->
            <div>
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-center"> 
                <div>
                  <h5>Patient List</h5>
                </div>
                <div class="mySearch">
                  <form action="#" >
                    <input type="text" name="search" id="searh">
                    <button class="searchButton">Search</button>
                  </form>
                </div>
              </div>
              <hr />
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Age</th>
                    <th>Birthdate</th>
                    <th>Contact no.</th>
                    <th>Address</th>
                    <th>Emergency Contact no.</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-label="First name">Robin</td>
                      <td data-label="Last name">Paje</td>
                      <td data-label="Age">29</td>
                      <td data-label="Birthdate">Septemt 25, 1992</td>
                      <td data-label="Contact no.">12345678910</td>
                      <td data-label="Address">Caloocan City</td>
                      <td data-label="Emergency Contact no.">12345678910</td>
                      <td data-label="Action">
                        <div>
                          <button>Edit</button>
                          <button>Delete</button>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td data-label="First name">Robin</td>
                      <td data-label="Last name">Paje</td>
                      <td data-label="Age">29</td>
                      <td data-label="Birthdate">Septemt 25, 1992</td>
                      <td data-label="Contact no.">12345678910</td>
                      <td data-label="Address">Caloocan City</td>
                      <td data-label="Emergency Contact no.">12345678910</td>
                      <td data-label="Action">
                        <div>
                          <button>Edit</button>
                          <button>Delete</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td data-label="First name">Robin</td>
                      <td data-label="Last name">Paje</td>
                      <td data-label="Age">29</td>
                      <td data-label="Birthdate">Septemt 25, 1992</td>
                      <td data-label="Contact no.">12345678910</td>
                      <td data-label="Address">Caloocan City</td>
                      <td data-label="Emergency Contact no.">12345678910</td>
                      <td data-label="Action">
                        <div>
                          <button>Edit</button>
                          <button>Delete</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td data-label="First name">Robin</td>
                      <td data-label="Last name">Paje</td>
                      <td data-label="Age">29</td>
                      <td data-label="Birthdate">Septemt 25, 1992</td>
                      <td data-label="Contact no.">12345678910</td>
                      <td data-label="Address">Caloocan City</td>
                      <td data-label="Emergency Contact no.">12345678910</td>
                      <td data-label="Action">
                        <div>
                          <button>Edit</button>
                          <button>Delete</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-messages"
            role="tabpanel"
            aria-labelledby="v-pills-messages-tab"
            tabindex="0"
          >
            <!-- DOCTORTS -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center"> 
              <div>
                <h5 class="">Doctors</h5>
              </div>
              <div class="mySearch">
                <form action="#" >
                  <input type="text" name="search" id="searh">
                  <button class="searchButton">Search</button>
                </form>
              </div>
            </div>
  <hr>
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
                        <button>Edit</button>
                        <button>Remove</button>
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
                        <button>Edit</button>
                        <button>Remove</button>
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
                        <button>Edit</button>
                        <button>Remove</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-hospital"
            role="tabpanel"
            aria-labelledby="v-pills-hospital-tab"
            tabindex="0"
          >
            <!-- HOSPITALS -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center"> 
                <div>
                  <h5>Hospital</h5>
                </div>
                <div class="mySearch">
                  <form action="#" >
                    <input type="text" name="search" id="searh">
                    <button class="searchButton">Search</button>
                  </form>
                </div>
              </div>
              <hr>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Hospital name</th>
                  <th>Address</th>
                  <th>Contact no.</th>
                  <th>Email address</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Hospital name">Bernardino</td>
                    <td data-label="Address">Quezon Cuty</td>
                    <td data-label="Contact no.">1234567910</td>
                    <td data-label="Email address">info@bernardino.com</td>
                    <td data-label="Action">
                      <div>
                        <button>Edit</button>
                        <button>Delete</button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td data-label="Hospital name">Bernardino</td>
                    <td data-label="Address">Quezon Cuty</td>
                    <td data-label="Contact no.">1234567910</td>
                    <td data-label="Email address">info@bernardino.com</td>
                    <td data-label="Action">
                      <div>
                        <button>Edit</button>
                        <button>Delete</button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td data-label="Hospital name">Bernardino</td>
                    <td data-label="Address">Quezon Cuty</td>
                    <td data-label="Contact no.">1234567910</td>
                    <td data-label="Email address">info@bernardino.com</td>
                    <td data-label="Action">
                      <div>
                        <button>Edit</button>
                        <button>Delete</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="v-pills-settings"
            role="tabpanel"
            aria-labelledby="v-pills-settings-tab"
            tabindex="0"
          >
            logout
          </div>
        </div>
      </div>
    </div>
    <!-- SIDE NAV END -->

    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="./js/admin.js"></script> -->
    <script src="{{asset('js/admin.js')}}" defer></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
