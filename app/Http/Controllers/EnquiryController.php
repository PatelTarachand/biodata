<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Enquiry;
use Mail;

class EnquiryController extends Controller
{
    public function enquiry(Request $request){
        $this->validate($request,['name'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'email'=>'required|email|max:50',
            'subject'=>'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'message'=>'required|string|max:500']);
            try {
                $email=$request['email'];
                $enquiry=["title"=>$request['subject'],
                    "body"=>$request['message']];
                Mail::to($email)->send(new Enquiry($enquiry));
                return 'Enquiry send successfully';
            } catch (\Exception $ex) {
                return 'enquiry not send';
            }
        
        
    }
}
