<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
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
        $this->validate($request, [
            "Appointment_id" => "required", 
            "Medicine_Type" => "required", 
            "Medicine_name" => "required", 
            "Medicine_quantity" => "required", 
            "night" => "required", 
            "afternoon" => "required", 
            "morning" => "required"
        ]); 
            
     //   return $request; 
       // return gettype($request->Medicine_Type); 
        $inputs = $request->all();
        $prescriptionData = []; 

        for($i=0; $i<count($inputs["Medicine_name"]); $i++)
        {
            $prescriptionValue = []; 
            $prescriptionValue["Medicine_Type"] = $inputs["Medicine_Type"][$i];
            $prescriptionValue["Medicine_name"] = $inputs["Medicine_name"][$i];
            $prescriptionValue["Medicine_quantity"] = $inputs["Medicine_quantity"][$i];
            $prescriptionValue["morning"] = $inputs["morning"][$i];
            $prescriptionValue["afternoon"] = $inputs["afternoon"][$i];
            $prescriptionValue["night"] = $inputs["night"][$i];
            array_push($prescriptionData, $prescriptionValue); 
        }
        $Appointment = Appointment::find($inputs["Appointment_id"]); 

        $Appointment->appointment_status = 4; 
        $Appointment->save();
        
        $ok = array(); 
        $ok["Appointment_id"] = $inputs['Appointment_id']; 
        $ok['Medicine_Type'] =  implode(', ', $inputs["Medicine_Type"]);
        $ok['Medicine_name'] =  implode(', ', $inputs["Medicine_name"]);
        $ok['Medicine_quantity'] =  implode(', ', $inputs["Medicine_quantity"]);

        $morning =  implode(',', $inputs["morning"]);
        $afternoon =  implode(',', $inputs["afternoon"]);
        $night =  implode(',', $inputs["night"]);

        $Medicine_time = $morning.",".$afternoon.",".$night; 
        $ok["Medicine_time"] = $Medicine_time; 

        $prescription = Prescription::create($ok);

       // return $prescriptionData[0];//["Medicine_Type"]; 
        return response($prescriptionData, $Appointment, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Appointment_id)
    {
        $Appointment = DB::table("appointments")
        ->where([["appointments.Appointment_id", "=", $Appointment_id]])
        ->join("prescriptions", "prescriptions.Appointment_id", "=", "appointments.Appointment_id")
        ->get()->toArray(); 

        $Appointment[0]->Medicine_Type =  explode(',', $Appointment[0]->Medicine_Type);
        $Appointment[0]->Medicine_name =  explode(',', $Appointment[0]->Medicine_name);
        $Appointment[0]->Medicine_quantity =  explode(',', $Appointment[0]->Medicine_quantity);
        $Appointment[0]->Medicine_time =  explode(',', $Appointment[0]->Medicine_time);
        $morning = 0; 
        $afternoon = 1; 
        $night = 2;
        $prescriptionData = []; 
        //return $Appointment_Record[0]->Medicine_name; 
        for($i=0; $i<count($Appointment[0]->Medicine_name); $i++)
        {
            $prescriptionValue = []; 
            $prescriptionValue["Medicine_Type"] = $Appointment[0]->Medicine_Type[$i];
            $prescriptionValue["Medicine_name"] = $Appointment[0]->Medicine_name[$i];
            $prescriptionValue["Medicine_quantity"] = $Appointment[0]->Medicine_quantity[$i];
            $prescriptionValue["morning"] = $Appointment[0]->Medicine_time[$morning];
            $morning = $morning + 3; 
            $prescriptionValue["afternoon"] = $Appointment[0]->Medicine_time[$afternoon];
            $afternoon = $afternoon + 3; 

            $prescriptionValue["night"] = $Appointment[0]->Medicine_time[$night];
            $night = $night + 3; 

            array_push($prescriptionData, $prescriptionValue); 
        } 

     return response($prescriptionData, $Appointment, 200);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Appointment_id)
    {
        $Appointment = Appointment::find($Appointment_id); 
        return response($Appointment, 200); 
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
}
