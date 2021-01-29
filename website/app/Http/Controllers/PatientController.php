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
        if($user->hasRole("Doctor"))
        {
            $patients = DB::table("patients")
            ->join("users", "users.id", "patients.User_id")
            ->get()->toArray(); 
            return view('patients.index',compact('patients'));
        }
        return back(); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        request()->validate([
            'Patient_name' => 'required',
            'User_id' => 'required',
            'Patient_dob' => 'required',
            'Patient_gender' => 'required',
            'Secret_key' => 'required',
        ]);
    
        Patient::create($request->all());
    

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
        return view('patients.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit',compact('patient'));
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
         request()->validate([
            'Patient_name' => 'required',
            'User_id' => 'required',
            'Patient_dob' => 'required',
            'Patient_gender' => 'required',
            'Secret_key' => 'required',
        ]);
    
        $patient->update($request->all());
    
        return redirect()->route('patients.index')
                        ->with('success','Patient updated successfully');
    }


}
