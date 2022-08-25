@extends('layouts.app')

@section('more-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css"> --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
Usage
<style>
    .book {
        background-color: #b83cc4 !important;
        transition: 0.5s ease;
    }

    .book:hover {
        background-color: indigo !important;
        transition: 0.5s ease;
    }

    .cancel {
        border: 1px solid #b83cc4 !important;
        color: #b83cc4 !important;
    }

    .cancel:hover {
        background-color: indigo !important;
        color: white !important;
        transition: 0.5s ease;
    }
</style>
@endsection

@section('content')
<main class="container-fluid d-flex flex-column align-items-center p-0" style="min-height: 100vh">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center pb-3"
        style="background-color: indigo">
        <div class=" display-6 text-start fw-bolder text-white" style="margin-top:120px;">Booking</div>
    </div>
    <div class="container">
        <div class="card p-4 my-2 d-flex flex-column bg-light align-items-center justify-content-center text-center">
            {{-- <a class="h5 me-auto text-decoration-none align-middle" href="javascript:history.back()"><i
                    class='bx bx-arrow-back align-middle'></i> Back</a> --}}
            <div class="align-middle">
                <img src="/images/stethoscope.png" alt="" class="mb-3 img-fluid" width="140px">
            </div>
            <div class="">
                <h2 class="fw-bold">{{$doctor->lastName}}, {{$doctor->firstName}} {{substr($doctor->middleName, 0,
                    1)}}.</h2>
                <h4 class="fw-bold"><code>{{$specialization->specialization}}</code></h4>
                {{-- <h5>{{$doctor->gender}}</h5> --}}
            </div>
            <div class="">
                {{-- <h5 class="fw-bold">Hospital/Clinic</h5> --}}
                <h5 class="fw-bold">{{$hospital->hospitalName}}</h5>
                <h5>{{$hospital->hospitalAddress}}, {{$hospital->hospitalCity}}, {{$hospital->hospitalProvince}}</h5>
                <hr>

                <form action="/createAppointment" method="post">
                    @csrf
                    <input type="hidden" name="hospital_id" value="{{$hospital->hospital_id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="doctor_id" value="{{$doctor->doctor_id}}">
                    <input type="hidden" name="doc_specialty_id" value="{{$docSpec->id}}">
                    <input type="hidden" name="affiliation_id" value="{{$affiliation->id}}">


                    <div class="mb-3">
                        <label class="text-start" for="symptoms">Symptoms</label>
                        <textarea class="form-control text-start rounded-1 border-dark bg-white"
                            placeholder="Brief description of your symptoms" id="symptoms" name="symptoms"
                            style="height:100px;" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="date">Appointment Date</label>
                        <input class="w-100 px-2" id="date" name="date" placeholder="mm/dd/yy" data-input />
                    </div>

                    <div class="mb-3">
                        <label for="time">Appointment Time</label>
                        <input id="time" name="time" placeholder="00:00" class="px-2 w-100 flatpickr" flatpickr
                            data-enable-time=true data-no-calendar=true data-time_24hr=true>
                    </div>

                    <div class="my-5">
                        <button type="button" class="btn cancel" onclick="javascript:history.back()">Cancel</button>
                        <button type="submit" class="btn book text-white">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</main>
<script src="{{asset('js/navbar_v2.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script>
    $("#date").flatpickr({
    enableTime: false,
    dateFormat: "Y-m-d",
    "enable": [
        function(date) {
           return (date.getDay() === 3 || date.getDay() === 5);  // disable weekends
        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // set start day of week to Monday
    }
    });

    $("#time").flatpickr({
        minTime: "8:00",
        maxTime: "10:00",
    });

    // $.get("/getDate", function(dates) {
    //     var count = {};
    //     //count date occurrences
    //     for (var i = 0; i < dates.length; i++) {
    //         count[dates[i].date] = count[dates[i].date] ? count[dates[i].date]+1 : 1;
    //     }

    //     for (reserved in count){
    //         //if date is full, disable date
    //         if(count[reserved] >= 4){
    //             // changed = property.replace(/[-]+/g, ',');

    //             full={
    //                 start: new Date(reserved),
    //                 backgroundColor: '#ff6961 !important',
    //                 color: 'black !important',
    //                 legend: 'Full'
    //             };

    //             demoPicker.highlight = [full];
    //             demoPicker.disabledDates = new Date(reserved);
    //         }
    //     }
    // });

    // var id = {{$affiliation->id}}
    // $.get("/"+id+"/setTime", function(time){

    //         //var parsed = JSON.parse(appointment_result);
    //         alert(time);
    //         //DateData = [appointment_result];
    //         $("#time").flatpickr(
    //         {
    //             // onReady: function ()
    //             // {
    //             //     this.jumpToDate("2021-01")
    //             // },
    //             // disable: [appointment_result],
    //             minTime: time.startTime
    //         });
    // });
</script>

{{-- <script>
    const picker = document.getElementById('date1');
picker.addEventListener('input', function(e){
  var day = new Date(this.value).getUTCDay();
  if([6,0].includes(day)){
    e.preventDefault();
    this.value = '';
    alert('Weekends not allowed');
  }
});
</script> --}}

@endsection
