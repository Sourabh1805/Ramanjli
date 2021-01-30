<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Meet;
use DB;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $appoint = DB::table("appointments")
        ->where("Appointment_patient_id", "=", $user->id)
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

        $inputs["Appointment_patient_id"] = $user->id; 
        $inputs["Appointment_reason"] = $request->Appointment_reason; 
        $inputs["Appointment_date"] = $request->Appointment_date;

        $inputs["Appointment_charges"] = $request->Appointment_charges; 
        $inputs["Appointment_isPaymentComplete"] = $request->Appointment_isPaymentComplete; 
        $inputs["appointment_status"] = 0; 
 
        $slots_available = DB::table('slots')
                                 ->where("Slot_date", "=", "Appointment_date")
                                 ->first(); 
         $inputs["Appointment_date"] = $request->Appointment_date; 
        if($slots_available == NULL)
        {
            $appoint = Appointment::create($inputs); 
            $meetInfo = [
                "appointment_id" => $appoint->Appointment_id, 
                "Meet_date" => $appoint->Appointment_date, 
                "Meet_charges" => $inputs["Appointment_charges"]
            ]; 
            $meet = Meet::create($meetInfo); 
            return response($appoint, 200);
        }
        
        $response = [
            "message" => "Slots are not available"
        ]; 

        return response($response, 201); 
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
