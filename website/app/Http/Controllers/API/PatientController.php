<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient; 
use DB; 
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
                    ->where("User_id", "=", $user->id)
                    ->get()->toArray(); 

        return $patients;
        //return "hj";
        $patients = "hi";


        return response($patients); 
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

        $patientInfo["User_id"] = $user->id; 
        $patientInfo["Patient_name"] = $request->Patient_name; 
        
        $patientInfo["Patient_dob"] = $request->Patient_dob; 
        $patientInfo["Patient_gender"] = $request->Patient_gender; 
        $patientInfo["Secret_key"] = mt_rand(100000, 999999); 

        $response = [
            "patient_data" => Patient::create($patientInfo), 
            "message" => "success"
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
}
