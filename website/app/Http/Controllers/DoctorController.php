<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Auth;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $DoctorData = Doctor::first();
        
        if($DoctorData)
        {
            return view('Doctor.profile', compact('DoctorData'));
        }
        return back()->withErrors(["No doctor registered in this clinic, Contact admin"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->hasRole("Admin"))
        {
            return view('Doctor.create');
        }
        return "You dont have permission to access this area";
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
            "Doctor_name" => "required",
            "Doctor_degree" => "required",
            "Doctor_specialization" => "required",
            "Doctor_address" => "required",
            "Doctor_contact_number" => "required",
            "Doctor_maximum_number_of_appointments" => "required",
            "Doctor_clinic_time_from" => "required",
            "Doctor_clinic_time_to" => "required",
            "Doctor_homevisit_max_appointments" => "required",
            "Doctor_homevisit_time_from" => "required",
            "Doctor_homevisit_time_to" => "required",
            "Doctor_homevisit_holiday" => "required"
        ]);

        $inputs = $request->all();
        $user = Auth::user(); 
        $inputs["Doctor_user_id"] = $user->id;
        $inputs['Doctor_clinic_max_appointments'] = $inputs['Doctor_maximum_number_of_appointments'];
        $inputs['Doctor_clinic_holiday'] = $inputs['Doctor_homevisit_holiday'][0];
        
        $Doctor = Doctor::first();
        if($Doctor == NULL)
        {
             
            $DoctorData = Doctor::create($inputs);
            if($DoctorData)
            {
                $title = "Doctor has been registered now";
                $subtitle = "you can start booking appointments for patients";
            return view('Doctor.profile', compact('DoctorData', 'title', 'subtitle'));
            }
        }
        return back()->with("error", "Only a single doctor can be registered to this clinic right now");

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        if(Auth::user()->hasRole("Doctor"))
        {
        return view("Doctor.edit", compact('doctor'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
