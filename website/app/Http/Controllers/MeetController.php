<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meet; 
use App\Models\Appointment; 
use DB; 
class MeetController extends Controller
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
    public function create($Appointment_id)
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
        $inputs = $request->all(); 
        $meet = Meet::create($inputs); 

        $meetlist = DB::table("meets")
                    ->where("Meet_appointment_id", "=", $meet->Meet_appointment_id)
                    ->get()->toArray();

        return view("meet/list", compact("meetlist")); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Appointment_id)
    {
        $appointment  = Appointment::find($Appointment_id); 
        return view("meet/create", compact("appointment")); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meetlist = DB::table("meets")
                    ->where("Meet_appointment_id", '=', $id)
                  //  ->join("prescriptions", "prescriptions.Meet_id", "meets.Meet_id")
                    ->get()->toArray(); 
        $Appointment_id = $id; 

        return view("appointments.meet", compact("meetlist", "Appointment_id")); 
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
