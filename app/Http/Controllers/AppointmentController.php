<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
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
        $patient = Patient::select('*')->where('user_id', '=', $request['user_id'])->first();
        $appointment = new Appointment();
        $appointment->symptoms = $request['symptoms'];
        $appointment->date = Carbon::parse($request['date'])->format('Y-m-d H:i:s');
        // $appointment->date = $request['date'];
        $appointment->time = $request['time'];
        $appointment->patient_id = $patient->id;
        $appointment->affiliation_id = $request['affiliation_id'];
        $appointment->doc_specialty_id = $request['doc_specialty_id'];
        // dd($appointment);
        $appointment->save();

        return redirect()->to('/appointments');
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

    public function setTime($id)
    {
        $timeslots = Timeslot::select('startTime', 'endTime')->where('affilation_id', '=', $id)->get();
        dd($timeslots);
        return response()->json($timeslots);
    }
}
