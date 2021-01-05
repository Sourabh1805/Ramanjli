<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Auth; 
class A_PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); 

        $prescription = DB::table('prescriptions')->get()->toArray();

        return response($prescription, 201);
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
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $Appointment_id=$request->Appointment_id;
        
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
        $response = [
            'prescriptionData' => $prescriptionData,
            'code' => 200
        ];

        return response($response,300);
     

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
