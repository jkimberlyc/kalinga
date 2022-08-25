<?php

namespace App\Http\Controllers;

use App\Models\Affiliation;
use App\Models\Appointment;
use App\Models\DocSpecialty;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialization;
use App\Models\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAppointments()
    {
        $patient = Patient::select('*')->where('user_id', Auth::user()->id)->first();
        // $appointments = DB::table('appointments')->where('appointments.patient_id', $patient->id)->join('affiliations', 'affiliations.id', '=', 'appointments.affiliation_id')
        //     ->join('hospitals', 'hospital_id', '=', 'affiliations.hospital_id')
        //     ->join('doctors', 'doctors.id', '=', 'affiliations.doctor_id')
        //     ->get();
        // dd($appointments);
        $data = array();
        // $patient = Patient::where('user_id', Auth::user()->id)->first();
        // dd($patient);
        $appointments = Appointment::where('patient_id', $patient->id)->get();

        foreach ($appointments as $app) {
            $affiliation = Affiliation::where('id', $app->affiliation_id)->first();
            $hospital = Hospital::where('id', $affiliation->hospital_id)->first();
            $docSpec = DocSpecialty::where('id', $app->doc_specialty_id)->first();
            $spec = Specialization::where('id', $docSpec->specialty_id)->first();
            $doc = Doctor::where('id', $docSpec->doctor_id)->first();

            $details = array(
                "hospital" => $hospital->hospitalName,
                "hospitalAddress" => $hospital->hospitalAddress,
                "hospitalCity" => $hospital->hospitalCity,
                "hospitalProvince" => $hospital->hospitalProvince,
                'specialization' => $spec->specialization,
                "docFirstName" => $doc->firstName,
                "docMiddle" => substr($doc->firstName, 0, 1),
                "docLastName" => $doc->lastName,
                "docContact" => $doc->mobileNumber,
                "day" => date('l', strtotime($app->date)),
                "date" => $app->date,
                "time" => $app->time,
                "status" => $app->status
            );
            array_push($data, $details);
        }
        return view('patient.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bookAppointment(Request $request)
    {
        // dd($request);
        $doctor = Doctor::select('*')->where('id', $request['doctor_id'])->first();

        // dd($doctor);
        $hospital = Hospital::where('id', $request['hospital_id'])->first();
        // dd($hospital);
        $docSpec = DocSpecialty::select('*')->where('specialty_id', '=', $request['specialty_id'])->where('doctor_id', '=', $request['doctor_id'])->first();
        // dd($docSpec);
        $specialization = Specialization::find($request['specialty_id']);
        $affiliation = Affiliation::select('*')->where('doctor_id', '=', $request['doctor_id'])->where('hospital_id', '=', $request['hospital_id'])->first();
        $timeslots = Timeslot::select('*')->where('affiliation_id', '=', $affiliation->id)->get();
        // dd($timeslots);

        return view('patient.book', compact('doctor', 'hospital', 'affiliation', 'docSpec', 'specialization', 'timeslots'));
    }
}
