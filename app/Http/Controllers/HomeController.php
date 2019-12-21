<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use DB,Mail;
use App\User;
use Auth;
use Config, \Crypt, Session,Hash;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

   
    public function index()
    {
        return view('home');
    }


    public function signUp($id=0)
    {
        $data = []; 
        $partner_id = $partner_verify = 0;  $partner_email = '';
        if($id){
            $partner_id = Crypt::decrypt($id);
            $partnerData = User::find($partner_id);        
            $partner_email = $partnerData->email;
            $partner_verify = 1;
        }
        $data['partner_id'] = $partner_id;        
        $data['partner_email'] = $partner_email;
        $data['partner_verify'] = $partner_verify;  
        $data['countries'] = DB::table('countries')->get();  
        return View('front.wedding_planner.couple.registration', $data);
       
    }
    public function couple_store(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required|alpha',
            'lastname' => 'nullable|alpha',
            'location' => 'required',
            'country' => 'required',
            'wedding_date' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
            'gender' => 'required'
       ]);
         $user = User::where('email', '=', Input::get('email'))->first();
         $fullname = request('firstname'). '' . request('lastname');
         if ($user === null) 
         {
             $userdata= new User();
             $userdata->name= request('firstname')." ".request('lastname');
             $userdata->first_name= request('firstname');
             $userdata->last_name= request('lastname');
             $userdata->email= request('email');
             $userdata->password= bcrypt(request('password'));
             $userdata->location= request('location');
             $userdata->country= request('country');
             $userdata->wedding_date= request('wedding_date');
             $userdata->phone= request('phone_number');
             $userdata->gender= request('gender');
             $userdata->partner_id= request('partner_id');
             $userdata->partner_verify= request('partner_verify');
             $userdata->partner_email= request('partner_email');
             $userdata->estimate= 2000000;
             
             if($userdata->save())
             {
                \Session::flash('success_message', 'Successfully Registered! Please login!');
                if(request('partner_id')>0)
                {
                    $partner = User::find(request('partner_id'));
                    $partner->partner_id = $userdata->id;                
                    $partner->save();
                }
             }
             else
             {
                \Session::flash('error_message', 'Please Try Again!!!');
             }

          
            return redirect()->route('couple-login');
        }
        else
        {
            \Session::flash('error_message', 'Already with us!!! Please login!');
                 return redirect()->route('signUp');
        }
    }
    public function couple_login()
    {
        session(['link' => url()->previous()]);
        if(Auth::check()){
            
            return redirect()->route('couple.dashboard');
        }
        return View('front.wedding_planner.couple.login');
    } 
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required'
        ]);
        if ($validator->fails()) {
            \Session::flash('error_message', 'Please fill All The Fields !!!');
            return redirect()->route('couple-login');
        }  
        else
        {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                if($request->session()->has('link')){
                    return redirect(session('link'));
                }
                return redirect()->route('couple.dashboard');
            }
            else
            {
            \Session::flash('error_message', 'Invalid Login Details !!!');
            return redirect()->route('couple-login');
            }
        }
    }
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/couple-login');
    }
}
