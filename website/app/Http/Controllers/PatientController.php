<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB; 
class PatientController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); 
        if($user->hasAnyRole(["Admin", "Doctor"]))
        {
            $patients = DB::table("patients")
            ->join("users", "users.id", "patients.Patient_user_id")
            ->get()->toArray(); 
        }
        else
        {
            $user = Auth::user(); 
            $patients = DB::table("patients")->where("Patient_User_id", "=", $user->id)->get()->toArray(); 
        }
        return view('patients.index',compact('patients', "user"));

        return back()->with("error", "You are not permitted to access this area"); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user(); 
        if($user->hasRole("Patient"))
        {
            return view("users/patients/create", compact("user")); 
        }
        $users = User::all();

        return view('patients.create',compact('users'));
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
            'Patient_username' => 'required',
            'Patient_user_id' => 'required',
            'Patient_dob' => 'required',
            'Patient_gender' => 'required',
            'Patient_secret_key' => 'required',
        ]);

        $inputs = $request->all(); 
        //return $request; 
        Patient::create($inputs);
    

        return redirect()->route('patients.index')
                        ->with('success','Patient created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return $patient; 
        $history = DB::table("appointments")
                        ->where("Appointment_patient_id", "=", $patient->Patient_id)
                        ->get()->toArray(); 
        $patientInfo = $patient; 
        $title = "Show Patient History"; 
        $subtitle = "Complete history since day 1"; 
        //return $history; 
        return view('patients.show',compact('patient', "history", "title", "subtitle"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $user = DB::table("users")->where("id", '=', $patient->User_id)->get()->toArray();
        return view('patients.edit',compact('patient', 'user'));
    }
     
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
         $this->validate($request, [
            'Patient_username' => 'required',
            'User_id' => 'required',
            'Patient_dob' => 'required',
            'Patient_gender' => 'required',
            'Secret_key' => 'required',
        ]);
    
        $patient->update($request->all());
        return "hi"; 
        return redirect('patients'); 
    }


}
