<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
use Auth;
use App\Mail\EmailVerify;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //p($request->all());//custom helper print data in pre tag
        $this->validate($request,[
            'name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:70',
            //'email'=>'required|unique:users,email|max:70',
            'password'=>'required|min:8|max:12',
        ]);
        $register=DB::table('users')->insert([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
            '_token'=>$request['_token'],
            'created_at'=>$request['created_at'],
        ]);
        $otp=random_int(111111,999999);
        session()->put('email',$request['email']);
        session()->put("otp",$otp);
        if($register){
            $emailVerify=[
                "title"=>"Welcome to our Biodata team $request->name",
                "body"=>"your otp is $otp",
            ];
            Mail::to($request['email'])->send(new emailVerify($emailVerify));
            return view('otp')->with('success','Email verify by otp');
        }else{
            return back()->with('error','Something went wrong');
        }
    }

    public function emailVerify(Request $request)
    {
        $otp=$request['otp'];
        $this->validate($request,[
            'otp'=>'max:6|min:6|required',
        ]);
        $email=session()->get('email');
        $sessionOtp=session()->get('otp');
        
        if($otp==$sessionOtp){
            $users=DB::table('users')->where('email',$email)->update([
                'email_verified_at'=>now(),
            ]);
            if($users){
                return redirect()->route('login')->with('success','Email is verified keep login');
            }else{
                return back()->with('success','Email is not verified');
            }
        }else{
            return back()->with('error','Otp is not match');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|max:70|email|exists:users,email',
            'password'=>'required|max:70',
        ]);
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            if(isset(auth()->user()->email_verified_at)){
                if(auth()->user()->user_type=="admin"){
                    return redirect()->route('dashboard')->with('success','Sign in successfully');
                }else{
                    return redirect()->route('user_index')->with('success','Sign in successfully');
                }
                
            }else{
                return back()->with('error','Email is not verified');
            }
        }else{
            return back()->with('error','Something went wrong');
        }
    }

    public function user_logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('user_index')->with('success','Logout successfully');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
