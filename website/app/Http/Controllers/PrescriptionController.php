<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Meet;
use App\Models\Appointment;
use Illuminate\Http\Request;
use DB; 
class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //   return $request->Meet_id; 
        $this->validate($request, [
            "Meet_id" =>"required", 
            "Meet_appointment_id" => "required", 
            "Medicine_Type" => "required", 
            "Medicine_name" => "required", 
            "Medicine_quantity" => "required", 
            "night" => "required", 
            "afternoon" => "required", 
            "Meet_appointment_id" => "required", 
            "Meet_treatment" => "required", 
            "Meet_date" => "required", 
            "Meet_note" => "required", 
            "Meet_charges" => "required", 
            "Meet_isPaid" => "required", 
            "Meet_status" => "required", 
            "Meet_isHomeVisit" => "required", 
            "Meet_isAdvancePaid" => "required"
        ]); 
            

     //   return $request; 
       // return gettype($request->Medicine_Type); 
        $inputs = $request->all();
   //return $inputs["Meet_id"]; 
        $prescriptionData = []; 
        $meetInfo = Meet::find($inputs["Meet_id"]); 
                //->get()->toArray(); //Meet::find($inputs["Meet_id"]); 
         
        $meetInfo->Meet_treatment = $request->Meet_treatment;         
        $meetInfo->Meet_date = $inputs["Meet_date"]; 
        $meetInfo->Meet_note = $inputs["Meet_note"]; 
        $meetInfo->Meet_charges = $inputs["Meet_charges"]; 
        $meetInfo->Meet_isPaid = $inputs["Meet_isPaid"]; 
        $meetInfo->Meet_status = $inputs["Meet_status"]; 
        $meetInfo->Meet_isHomeVisit = $inputs["Meet_isHomeVisit"]; 
        $meetInfo->Meet_isAdvancePaid = $inputs["Meet_isAdvancePaid"]; 
         $meetInfo->save(); 
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
         $Appointment = Meet::find($inputs["Meet_id"]); 

         $Appointment->Meet_status = 4; 
         $Appointment->save();
        
        $ok = array(); 
        $ok["Meet_id"] = $inputs['Meet_id']; 
        $ok['Medicine_Type'] =  implode(', ', $inputs["Medicine_Type"]);
        $ok['Medicine_name'] =  implode(', ', $inputs["Medicine_name"]);
        $ok['Medicine_quantity'] =  implode(', ', $inputs["Medicine_quantity"]);

        $morning =  implode(',', $inputs["morning"]);
        $afternoon =  implode(',', $inputs["afternoon"]);
        $night =  implode(',', $inputs["night"]);

        $Medicine_time = $morning.",".$afternoon.",".$night; 
        $ok["Medicine_time"] = $Medicine_time; 
      //  $ok["Meet_id"] = $request->Meet_id; 
       // return $ok; 
        $prescription = Prescription::create($ok);
        $prescription->Meet_id = $inputs['Meet_id'];
        $prescription->save(); 

       // return $prescriptionData[0];//["Medicine_Type"]; 
        return view("prescription.view", compact("prescriptionData", "Appointment"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show($Meet_id)
    {
        $meets = DB::table("meets")
        ->where([["meets.Meet_id", "=", $Meet_id]])
        ->join("prescriptions", "prescriptions.Meet_id", "=", "meets.Meet_id")
        ->get()->toArray(); 
        
        $patientInfo = DB::table("meets")
        ->where([["meets.Meet_id", "=", $Meet_id]])
        ->join("appointments", "appointments.Appointment_id", "meets.Meet_appointment_id")
        ->join("patients", "patients.Patient_user_id", "appointments.Appointment_patient_id")
        ->get()->toArray(); 
        
        //return $patientInfo->Patient_username; 

        $meets[0]->Medicine_Type =  explode(',', $meets[0]->Medicine_Type);
        $meets[0]->Medicine_name =  explode(',', $meets[0]->Medicine_name);
        $meets[0]->Medicine_quantity =  explode(',', $meets[0]->Medicine_quantity);
        $meets[0]->Medicine_time =  explode(',', $meets[0]->Medicine_time);
        $morning = 0; 
        $afternoon = 1; 
        $night = 2;
        $prescriptionData = []; 
        //return $Appointment_Record[0]->Medicine_name; 
        for($i=0; $i<count($meets[0]->Medicine_name); $i++)
        {
            $prescriptionValue = []; 
            $prescriptionValue["Medicine_Type"] = $meets[0]->Medicine_Type[$i];
            $prescriptionValue["Medicine_name"] = $meets[0]->Medicine_name[$i];
            $prescriptionValue["Medicine_quantity"] = $meets[0]->Medicine_quantity[$i];
            $prescriptionValue["morning"] = $meets[0]->Medicine_time[$morning];
            $morning = $morning + 3; 
            $prescriptionValue["afternoon"] = $meets[0]->Medicine_time[$afternoon];
            $afternoon = $afternoon + 3; 

            $prescriptionValue["night"] = $meets[0]->Medicine_time[$night];
            $night = $night + 3; 

            array_push($prescriptionData, $prescriptionValue); 
        }           
// return $meets[0]->Meet_date; 
     return view("prescription.show", compact("prescriptionData", "meets", "patientInfo"));


        // $Appointment = [];
        // $string = $Appointment_Record[0]->Medicine_name; 
        // $Appointment_Record[0]->Medicine_name = explode(',', $string);
        // $Appointment["Appointment_id"] = $Appointment_Record[0]->Appointment_id; 
        // $Appointment["Patient_username"] = $Appointment_Record[0]->Patient_username; 
        // $Appointment["reason"] = $Appointment_Record[0]->reason; 
        // $Appointment["Appointment_status"] = $Appointment_Record[0]->Appointment_status; 
        // $Appointment["Appointment_date"] = $Appointment_Record[0]->Appointment_date; 
        // return $Appointment_Record; 

        // for($i=0; $i<count($Appointment_Record[0]->Medicine_name); $i++)
        // {
        //     $prescriptionValue = []; 
        //     $Appointment_Record[0]->Medicine_Type = $Appointment_Record["Medicine_Type"][$i];
        //     $prescriptionValue["Medicine_name"] = $Appointment_Record["Medicine_name"][$i];
        //     $prescriptionValue["Medicine_quantity"] = $Appointment_Record["Medicine_quantity"][$i];
        //     $prescriptionValue["morning"] = $Appointment_Record["morning"][$i];
        //     $prescriptionValue["afternoon"] = $Appointment_Record["afternoon"][$i];
        //     $prescriptionValue["night"] = $Appointment_Record["night"][$i];
        //     array_push($Appointment, $prescriptionValue);            
        // }
        // return $Appointment_Record; 

        // return "ok"; 
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit($Meet_id)
    {
        $meetInfo = Meet::find($Meet_id); 
         
        $title = "Write prescription"; 
        $subtitle = "For meetings"; 
        
        return view("meet.submission", compact('meetInfo', "title", "subtitle", "Meet_id")); 
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
