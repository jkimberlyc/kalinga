<?php

namespace App\Http\Controllers;

use App\Models\Affiliation;
use App\Models\Appointment;
use App\Models\DocSpecialty;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $affiliations = Affiliation::where('doctor_id', $doctor->id)->get();
        // dd($affiliation);

        $data = array();

        foreach ($affiliations as $affiliation) {
            $appointments = Appointment::where('affiliation_id', $affiliation->id)->get();
            // dd($appointment);
            foreach ($appointments as $appointment) {
                $patient = Patient::where('id', $appointment->patient_id)->first();
                $hospital = Hospital::where('id', $affiliation->hospital_id)->first();
                $docSpec = DocSpecialty::where('id', $appointment->doc_specialty_id)->first();
                $specialization = Specialization::where('id', $docSpec->specialty_id)->first();
                $age = Carbon::parse($patient->birthdate)->diff(Carbon::now())->format('%y');

                $details = array(
                    "id" => $appointment->id,
                    "patientName" => $patient->lastName . ", " . $patient->firstName . " " . substr($patient->middleName, 0, 1),
                    "age" => $age,
                    "gender" => $patient->gender,
                    "contact" => $patient->mobileNumber,
                    "symptoms" => $appointment->symptoms,
                    "date" => $appointment->date,
                    "time" => $appointment->time,
                    "hospital" => $hospital->hospitalName,
                    "hospitalAddress" => $hospital->hospitalAddress,
                    "hospitalCity" => $hospital->hospitalCity,
                    "hospitalProvince" => $hospital->hospitalProvince,
                    "specialization" => $specialization->specialization,
                    "status" => $appointment->status
                );

                array_push($data, $details);
            }
        }

        return view('doctor.index')->with('data', $data);
    }

    public function setStatus($id, Request $request)
    {
        $status = $request->status;
        // dd($status);
        $id = $request->id;
        DB::update('update appointments set status = ? where id = ?', [$status, $id]);

        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $affiliations = Affiliation::where('doctor_id', $doctor->id)->get();
        // dd($affiliation);

        $data = array();

        foreach ($affiliations as $affiliation) {
            $appointments = Appointment::where('affiliation_id', $affiliation->id)->get();
            // dd($appointment);
            foreach ($appointments as $appointment) {
                $patient = Patient::where('id', $appointment->patient_id)->first();
                $hospital = Hospital::where('id', $affiliation->hospital_id)->first();
                $docSpec = DocSpecialty::where('id', $appointment->doc_specialty_id)->first();
                $specialization = Specialization::where('id', $docSpec->specialty_id)->first();
                $age = Carbon::parse($patient->birthdate)->diff(Carbon::now())->format('%y');

                $details = array(
                    "id" => $appointment->id,
                    "patientName" => $patient->lastName . ", " . $patient->firstName . " " . substr($patient->middleName, 0, 1),
                    "age" => $age,
                    "gender" => $patient->gender,
                    "contact" => $patient->mobileNumber,
                    "symptoms" => $appointment->symptoms,
                    "date" => $appointment->date,
                    "time" => $appointment->time,
                    "hospital" => $hospital->hospitalName,
                    "hospitalAddress" => $hospital->hospitalAddress,
                    "hospitalCity" => $hospital->hospitalCity,
                    "hospitalProvince" => $hospital->hospitalProvince,
                    "specialization" => $specialization->specialization,
                    "status" => $appointment->status
                );

                array_push($data, $details);
            }
        }

        return view('doctor.index')->with('data', $data);
    }

    public function downloadPDF($id)
    {
        $appointment = Appointment::find($id)->first();
        $affiliation = Affiliation::find($appointment->affiliation_id)->first();
        $hospital = Hospital::find($affiliation->hospital_id)->first();
        $doctor = Doctor::find($affiliation->doctor_id)->first();
        $patient = Patient::find($appointment->patient_id)->first();

        $data = [
            'title' => 'Medical Certificate',
            'appointment' => $appointment,
            'hospital' => $hospital,
            'doctor' => $doctor,
            'patient' => $patient
        ];

        $pdf = PDF::loadView('medcert', $data);

        return $pdf->download('medcert.pdf');
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
    public function show($id)
    {
        //
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

    public function getHospital($id)
    {
        return Affiliation::where('doctor_id', $id)->get()->json();
    }
}
