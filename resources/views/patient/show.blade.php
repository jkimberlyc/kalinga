@extends('layouts.app')

@section('more-css')
<link href="{{asset('css/login.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@endsection

@section('content')
<main class="container-fluid d-flex flex-column align-items-center p-0" style="min-height: 100vh">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center pb-3"
        style="background-color: indigo">
        <div class=" display-6 text-start fw-bolder text-white" style="margin-top:120px;">Appointments</div>
    </div>
    <div class="container px-2">
        <div class="card p-4 my-2 d-flex flex-column bg-light align-items-center justify-content-center text-center">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-ongoing-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-ongoing" type="button" role="tab" aria-controls="nav-ongoing"
                        aria-selected="true">Ongoing</button>
                    <button class="nav-link" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending"
                        type="button" role="tab" aria-controls="nav-pending" aria-selected="false">Pending</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-ongoing" role="tabpanel"
                    aria-labelledby="nav-ongoing-tab">
                    @foreach ($data as $d)
                    @if ($d['status'] == "Approved")
                    <div
                        class="card p-4 my-2 d-flex flex-sm-row bg-light align-items-center justify-content-center text-center">
                        {{-- <a class="h5 me-auto text-decoration-none align-middle" href="javascript:history.back()"><i
                                class='bx bx-arrow-back align-middle'></i> Back</a> --}}
                        <div class="align-middle px-4">
                            <img src="/images/gps.png" alt="" class="mb-3 img-fluid" width="120px">
                        </div>
                        <div class="text-start p-4">
                            <h3 class="fw-bold">{{$d['docLastName']}},
                                {{$d['docFirstName']}} {{$d['docMiddle']}}.</h3>
                            <h3><code><i class='bx bxs-book-alt pe-1 align-middle'></i>{{$d['specialization']}}</code>
                            </h3>
                            <h5 class="fw-bold"><i class='bx bx-plus-medical align-middle pe-1 text-primary'></i>
                                {{$d['hospital']}}
                            </h5>
                            <h5><i class='bx bxs-location-plus align-middle pe-1 text-primary'></i>
                                {{$d['hospitalAddress']}},
                                {{$d['hospitalCity']}}, {{$d['hospitalProvince']}}</h5>
                            <h5><i class='bx bxs-phone align-middle pe-1 text-primary'></i> {{$d['docContact']}}</h5>
                            <hr>
                            <h5><i class='bx bxs-calendar-plus pe-1 text-primary'></i> {{$d['date']}},
                                {{$d['day']}}</h5>
                            <h5><i class='bx bxs-time-five pe-1 text-primary'></i>{{$d['time']}}</h5>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                    @foreach ($data as $d)
                    @if ($d['status'] == NULL)
                    <div
                        class="card p-4 my-2 d-flex flex-sm-row bg-light align-items-center justify-content-center text-center">
                        {{-- <a class="h5 me-auto text-decoration-none align-middle" href="javascript:history.back()"><i
                                class='bx bx-arrow-back align-middle'></i> Back</a> --}}
                        <div class="align-middle px-4">
                            <img src="/images/gps.png" alt="" class="mb-3 img-fluid" width="120px">
                        </div>
                        <div class="text-start p-4">
                            <h3 class="fw-bold">{{$d['docLastName']}},
                                {{$d['docFirstName']}} {{$d['docMiddle']}}.</h3>
                            <h3><code><i class='bx bxs-book-alt pe-1 align-middle'></i>{{$d['specialization']}}</code>
                            </h3>
                            <h5 class="fw-bold"><i class='bx bx-plus-medical align-middle pe-1 text-primary'></i>
                                {{$d['hospital']}}
                            </h5>
                            <h5><i class='bx bxs-location-plus align-middle pe-1 text-primary'></i>
                                {{$d['hospitalAddress']}},
                                {{$d['hospitalCity']}}, {{$d['hospitalProvince']}}</h5>
                            <h5><i class='bx bxs-phone align-middle pe-1 text-primary'></i> {{$d['docContact']}}</h5>
                            <hr>
                            <h5><i class='bx bxs-calendar-plus pe-1 text-primary'></i> {{$d['date']}},
                                {{$d['day']}}</h5>
                            <h5><i class='bx bxs-time-five pe-1 text-primary'></i>{{$d['time']}}</h5>
                            <small>Waiting for approval.</small>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</main>

<script src="{{asset('js/navbar_v2.js')}}"></script>
@endsection
