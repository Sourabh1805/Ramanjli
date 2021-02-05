<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient; 
use DB; 

use Illuminate\Validation\ValidationException;
use Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $patients = DB::table("patients")
                    ->where("Patient_user_id", "=", $user->id)
                    ->get()->toArray(); 
        $response = [
            "patient_data" => $patients,
            "message" => "success"
            ];
        return response($response, 200);
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
        $validator = Validator::make($request->all(), [
            'Patient_username' => 'required', 
            'Patient_dob' => 'required', 
            'Patient_gender' =>'required', 
            'Patient_secret_key' =>'required'
        ]);

        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();;
            return response()->json($responseArr, 400);
        }

        $user = $request->user();

        $patientInfo["Patient_user_id"] = $user->id;
        $patientInfo["Patient_username"] = $request->Patient_username;

        $patientInfo["Patient_dob"] = $request->Patient_dob;
        $patientInfo["Patient_gender"] = $request->Patient_gender;
        $patientInfo["Patient_secret_key"] = mt_rand(100000, 999999);

       

        $response = [
            "patient_data" => Patient::create($patientInfo),
            "message" => "success"
            ];

        return response($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patientInfo = Patient::find($id);
        return response($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patientInfo = Patient::find($id);
        return response($response, 200);
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
        
        $validator = Validator::make($request->all(), [
            'Patient_username' => 'required', 
            'Patient_dob' => 'required', 
            'Patient_gender' =>'required', 
            'Patient_secret_key' =>'required'
        ]);

        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();;
            return response()->json($responseArr, 400);
        }     
        
        $patientInfo = Patient::find($id);
        $patientInfo->Patient_username = $request->Patient_username;
        $patientInfo->Patient_dob = $request->Patient_dob;
        $patientInfo->Patient_gender = $request->Patient_gender;
        $patientInfo->Patient_secret_key = $request->Patient_secret_key;
        $patientInfo->save();
        return response($response, 200);
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
