<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use Hash; 
use App\Mail\ForgetPasswordMail;
use Mail;
use DB;
use App\Models\User;  
class PasswordManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changepassword()
    {
        $title = "Change Password"; 
        return view("reset-password", compact('title')); 
    }
    public function resetpassword(Request $request)
    {
        $this->validate($request, [
            "current_password" => "required", 
            "password" => "same:confirm-password"
        ]); 

        $user = Auth::user(); 

        if($user != NULL)
        {   
            if(Hash::check($request->current_password, $user->password))
            {
                $user->password = Hash::make($request->password);
                $user->save(); 
                $title = "Password has been updated successfully"; 
                return view("home", compact("title"));
            }
        }
        return redirect("login"); 


        return "all okay"; 
    }
    public function index()
    {
    
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
            'email' => 'required', 
        ]);

        if ($validator->fails()) {
            $responseArr['message'] = $validator->errors();;
            return response()->json($responseArr, 400);
        }

        $email = $request->email;
        $user1 = User::where('email', $email)->get()->toArray();
        if(sizeof($user1) == 0)
        {
          return back()->withErrors(['Phonenumber' => 'Your account is not registered with us']); 
        }
        $temp = mt_rand(100000, 999999);         
        $this->send($email,$temp);

        return view('OTPforForgetPassword', compact('temp', 'email'));
    }

    public function send($mail,$temp)
    {
      $this->$mail=$mail;
      Mail::to("$mail")->send(new ForgetPasswordMail($temp));
    }

    public function forgotpassword()
    {
        return view("auth.passwords.email"); 
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
        return "hi"; 
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
    public function verifyOTP(Request $request)
    {
        $inputs =  $request->all(); 
        if($inputs["NEWotp"] == $inputs["CurrentOTP"])
        {
            $email = $request->email; 
            return view("ResetPassword", compact("email")); 
        }
        return redirect("forgotpassword")->withError(["OTP is incorrect, Please resend OTP"]); 
    }
    public function resetpasswordemail(Request $request)
    {
        $this->validate($request, [
            "password" => "same: confirm-password"
        ]); 
        $inputs = $request->all(); 
        $user = DB::table("users")->where(["email", '=', $inputs->email]); 

        $user->password = Hash::make($inputs["password"]);
        $user->save(); 
        
        Auth::login($user);
    }

}
