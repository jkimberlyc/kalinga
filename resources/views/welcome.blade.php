@extends('layouts.app')

@section('more-css')
<link href="{{asset('css/search.css')}}" rel="stylesheet">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/baybayin-daluyong" type="text/css" />
<link href="{{asset('css/contact/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<main class="" data-bs-spy="scroll" data-bs-target="navbar">
    <div class="banner py-4 d-flex flex-column justify-content-center align-items-start" id="home">
        <div class="container">
            <div class="col-md-5 col-12 text-center display-4 fw-bold">
                <div>We care about</div>
                <div>your health.</div>
                <div class="fs-4 fw-normal my-3">Find a doctor anytime, anywhere.</div>
                <div class="d-flex flex-row justify-content-center">
                    <img src="{{asset('images/search.png')}}" class="img-fluid m-3" alt="" width="60px">
                    <img src="{{asset('images/health.png')}}" class="img-fluid m-3" alt="" width="60px">
                    <img src="{{asset('images/shield.png')}}" class="img-fluid m-3" alt="" width="60px">
                </div>
            </div>
        </div>
    </div>
    <div class="container-md">
        <div class="p-3 pb-1 mx-md-0 mx-5 rounded-3" id="searchbar">
            <div class="row g-2">
                <div class="col-md-5">
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg rounded-1 text-dark" id="specialization"
                            placeholder="PEDIATRICS" required>
                        <label class="align-middle" for="specialization">Specialization</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <template id="locationList">
                        @foreach($data as $place)
                        <option>
                            {{$place}}
                        </option>
                        @endforeach
                    </template>
                    <div class="form-floating">
                        <input type="text" class="form-control form-control-lg rounded-1 text-dark" list="locations"
                            id="locationInput" placeholder="CITY, PROVINCE" required>
                        <label class="align-middle" for="locationInput">Location</label>
                        <datalist id="locations"></datalist>
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn w-100 fs-1 rounded-1" style="height:58px;background-color:#b83cc4"><i
                            class='bx bx-search-alt text-white' id="search-btn"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 pt-5" id="about">
        <div class="d-flex flex-lg-row flex-column justify-content-center align-items-start">
            <div class="col-lg-6 col-12 mt-5 p-4">
                <img class="w-100" src="{{asset('images/about-kalinga.png')}}" alt="">
            </div>
            <div class="col-lg-6 col-12 text-md-start text-center mx-auto mt-5">
                <div class="px-3 display-6 fw-bold mt-5 pt-3">
                    About Kalinga
                </div>
                <div class="px-3 baybayin display-6 fw-bold my-1 text-md-start text-center">ᜃᜎᜒᜅ ᜉᜍ ᜐ ᜊᜌ<span
                        class="ls-0">ᜈ᜔</span></div>
                <div class="px-3 fs-5 fw-normal mb-4 text-muted">
                    Kalinga Para sa Bayan
                </div>
                <div class="px-3 mb-auto">
                    <div class="accordion accordion-flush" id="aboutKalinga">
                        <div class="accordion-item">
                            <div class="accordion-header" id="onlineBooking">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Online Booking
                                </button>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="onlineBooking" data-bs-parent="#aboutKalinga">
                                <div class="accordion-body">
                                    <strong>Booking a physician has never been easier.</strong> Kalinga lets you
                                    book an appointment with a physician of your
                                    choosing. Designed to avoid schedule mixups and long approval queue, rest assured
                                    your appointment request will go through and be reviewed promptly by
                                    the physcian.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="onlinePayment">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Online Payment
                                </button>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="onlinePayment"
                                data-bs-parent="#aboutKalinga">
                                <div class="accordion-body">
                                    <strong>Hassle-free transactions.</strong> Kalinga provides a way for patients to
                                    pay for their doctor's visit and consultation fees without having to wait in a line.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="eMedCert">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Electronic Medical Certificate
                                </button>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="eMedCert"
                                data-bs-parent="#aboutKalinga">
                                <div class="accordion-body">
                                    <strong>Printable medical certificates.</strong> Kalinga patients may request for an
                                    E-MedCert from their physicians should there be a need to get one. We've got your
                                    back,
                                    kapatid!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>DEVELOPERS AREA HERE</div>
    </div>
    <section class="ftco-section mt-5" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="contact-wrap w-100 p-lg-5 p-4">
                                    <h3 class="mb-4">Send us a message.</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                        placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="message" cols="30"
                                                        rows="6" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-lg-5 p-4 img">
                                    <h3>Contact Us</h3>
                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span> <a
                                                    href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
</main>
<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@endsection
