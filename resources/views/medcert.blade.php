<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{--
    <link rel="stylesheet" href="{{asset('css/medcert.css')}}" /> --}}
    <style>

    </style>
    <title>{{$title}}</title>
</head>

<body>
    <div class="body">
        <div class="toptext">
            <h1>MEDICAL CERTIFICATE</h1>
            <p>{{$hospital->hospitalName}}</p>
            <p>
                {{$hospital->hospitalAddress}}, {{$hospital->hospitalCity}},
                {{$hospital->hospitalProvince}}
            </p>
            <p>09123456789</p>
        </div>
        <br /><br />

        <div class="bodytext">
            <p>
                This is to certify that the individual known as
                <b>{{$patient->firstName}} {{$patient->lastName}}</b> residing at
                C{{$patient->address}}, {{$patient->city}},
                {{$patient->province}},
                has undergone a thorough medical examination conducted at
                <b>{{$hospital->hospitalAddress}}, {{$hospital->hospitalCity}},
                    {{$hospital->hospitalProvince}}</b>
                on
                <b>{{$appointment->date}}</b> by {{$doctor->firstName}} {{$doctor->lastName}}, MDQ is currently
                suffering from {{$appointment->symptoms}}.
            </p>
            <br /><br />

            <p>
                The examiner has advised that, for the sake of the
                individual's overall health, He should be allowed absence
                from his company duties for a period of 7 days.
            </p>

            <div class="outersig">
                <div class="doctorsig">
                    <img width="200px"
                        src="https://www.freepnglogos.com/uploads/signature-png/nguy-ecnh-nguyen-van-binh-signature-png-5.png" />
                    <p><b> {{$doctor->firstName}} {{$doctor->lastName}}, MDQ</b></p>
                    <p>Doctor Quack</p>
                    <p>license no. 301-792-6389</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
