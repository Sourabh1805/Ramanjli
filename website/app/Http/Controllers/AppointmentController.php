<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth; 
use Carbon\Carbon; 

use App\Mail\AppointmentMail;
use Mail;
class AppointmentController extends Controller
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
        $Max = Doctor::first();
        $ok = ""; 
        $Appointments = DB::table('appointments')
        ->where([['appointment_status', '=', 0]])
        ->count();
        $appoint = [];
        if($Max!=NULL)
       { 
           if($Max["Doctor_maximum_number_of_appointments"]  >= $Appointments)
        {

            $appoint = DB::table("appointments")
                ->where([["appointment_status", '!=', 1], 
                ["appointment_status", '!=', 4]])
                ->orderBy("Appointment_date")
                ->get()->toArray(); 

            if($appoint == NULL)
            {
                $title = "Appointment Management"; 
                $subtitle = "Note: All appointments for the day have been confirmed";
                return view("appointments.index", compact("title","subtitle",  "appoint"));
            }
            $title = "Appointment Management"; 
            $subtitle = "Note: Confirm appointments for today";
            return view("appointments.index", compact("title","subtitle",  "appoint"));
        }}
        $ok = "Maximum number of appointments have been booked for the day";
        return view("appointments.index", compact("ok", "appoint"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Book a new appointment"; ; 
        $subtitle = "Your appointment confirmation can take upto 24 hours";
        $user = Auth::user(); 
        $patients = DB::table("patients")->where("Patient_user_id", "=", $user->id)->get()->toArray(); 
      //  return $patients;  
        $patient = Patient::all(); 
        return view("appointments.create", compact("title", "subtitle", "patient")); 
        //return $Slots; 
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
            "Patient_username" => "required", 
            "reason" => "required", 
            "Appointment_date" => "required"
        ]); 
        //Logged in user information
        $user = Auth::user(); 
         
        $doctor = Doctor::first();
         //return $request->Appointment_date; 

        $onleave = DB::table("slots")->where([
                ["Slot_date", "=", $request->Appointment_date], 
                ["Slot_is_available", "=", "NO"]])->get()->toArray();

        if($onleave != NULL)
            {
                return "Doctor is not available for given date, try another one"; 
            }
                //checking number of booked appointments
                $Appointments = DB::table('appointments')
                                    ->where([['appointment_status', '=', 0]])
                                    ->count(); 
                $hasMoreAppointmentstoday = DB::table("slots")->where([
                    ["Slot_date", "=", $request->Appointment_date], 
                    ["Slot_is_available", "=", 0]])->get()->toArray();
                if($Appointments <= $doctor["Doctor_maximum_number_of_appointments"])
                {
                    $inputs["Appointment_patient_id"] = $user->id; 
                    $inputs["patient_name"] = $request->Patient_username; 
                    $inputs["Appointment_reason"] = $request->reason; 
                    $inputs["appointment_status"] = 0; 
                    $inputs["Appointment_date"] = $request->Appointment_date; 
                    $appointment = Appointment::create($inputs); 
                    return $appointment; 
                    return view('meet.create', compact("appointment")) ; 
                }
                return "Please book appointment for another date"; 
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $user = User::find($appointment->patient_id);
        $appointment->appointment_status = 1; 
        $appointment->save(); 
        
        $key = "ACCEPT"; 
        $mailSubject = "Your Appointment has been accepted";

        $email = $user->email; 
        $this->send($email, $key, $mailSubject);        
        
        return back()->with('success', "Appointment accepted"); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
     public function edit(Appointment $appointment)
     {
         return view("appointments.edit", compact("appointment")); 
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "hi"; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->appointment_status = 3; 
        $appointment->save(); 
        $user = User::find($appointment->patient_id);
        $key = "REJECT"; 
        $mailSubject = "Your Appointment has been rejected";
        $email = $user->email; 
        $this->send($email, $key, $mailSubject);
        return back()->with('success', "Appointment rejected"); 
    }

    public function today()
    { 
        $dt = Carbon::now()->toDateString();
        $appoint = Appointment::where([['Appointment_date', '=', $dt], ['appointment_status', '=', 1]])->get(); 
        $title = "All Today's Appointment";
        return view("todaysappointment", compact("appoint", "title")); 
    }

    public function history() 
    {
        $appoint = DB::table("appointments")
        ->join("meets", "meets.Meet_appointment_id", "=", "appointments.Appointment_id")
        ->get()->toArray(); 
        return $appoint; 
        return view("appointments.history", compact("appoint")); 
    }
    public function all() 
    {
        $appoint = DB::table("appointments")
        ->get()->toArray(); 
       // return $appoint; 
        return view("appointments.all", compact("appoint")); 
    }
    public function send($email, $key, $mailSubject)
    {
      $this->$email=$email;
      Mail::to("$email")->send(new AppointmentMail($key));
    }
}
