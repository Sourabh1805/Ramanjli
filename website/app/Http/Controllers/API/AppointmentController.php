<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $request->user();

        $appoint = DB::table("appointments")
        ->where("patient_id", "=", $user->id)
        ->get()->toArray(); 

        return response($appoint, 201);

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
        $user = $request->user();

        $inputs["patient_id"] = $user->id; 
        $inputs["Patient_username"] = $request->Patient_username; 
        $inputs["reason"] = $request->reason; 
        $inputs["appointment_status"] = 0; 
 
        $slots_available = DB::table('slots')
                                 ->where("Slot_date", "=", "Time_and_Date")
                                 ->first(); 
         $inputs["Time_and_Date"] = $request->Time_and_Date; 
        if($slots_available == NULL)
        {
            Appointment::create($inputs); 
            $appoint = DB::table("appointments")->where([["appointment_status", "=", 0]])
                ->get()->toArray(); 
            return view("appointments.index", compact("appoint"))->with("success", "Appointment booked successfully"); 
        }
 
 
        $appointment = Appointment::create($inputs); 
        return response($appointment, 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment->appointment_status = 1; 
        $appointment->save(); 
        $appointment = "Success"; 
        return response($appointment, 201);
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
        $appointment->appointment_status = 3; 
        $appointment->save(); 

        return response(201);
    }
}
