<?php

namespace App\Http\Controllers;

use App\Models\Slots;
use Illuminate\Http\Request;
use DB; 
class SlotController extends Controller
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
        $slots = DB::table('slots')->get()->toArray();  
      //  return "index";

      $title = "Occassions and Dates List"; 
      $subtitle = "You can change the number of fixed appointments and also tell us when you are on leave"; 
        return view('slots.index',compact('slots', 'title', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slots.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // /return $request; 

        $this->validate($request, [
            "Slot_date" => "required|unique:slots", 
            "Slot_is_available" => "required", 
        ]); 
        $inputs = $request->all();
        $slot = Slots::create($inputs); 

        return redirect("slots")->with("success", "Slot registered"); 
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
        return "edit";
        $user = Slots::where('slot_id', $id)->firstorfail()->delete(); 
        return redirect()->route('slots.index')
            ->with('success','Slot deleted successfully');
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
        
    }
}