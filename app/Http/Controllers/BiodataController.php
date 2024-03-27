<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BiodataController extends Controller
{
    public function biodata(Request $request){
        $user_id=auth()->user()->id;
        $personal_details=DB::table('personal_details')->where('user_id',$user_id)->count();
        $professional_details=DB::table('professional_details')->where('user_id',$user_id)->count();
        $family_details=DB::table('family_details')->where('user_id',$user_id)->count();
        $education_details=DB::table('education_details')->where('user_id',$user_id)->count();
        $address_details=DB::table('address_details')->where('user_id',$user_id)->count();
        $land_details=DB::table('land_details')->where('user_id',$user_id)->count();
        $maternal_details=DB::table('maternal_details')->where('user_id',$user_id)->count();
        return view('user.biodata',compact('personal_details','professional_details','family_details','education_details','address_details',
            'land_details','maternal_details'));
    }

    public function storePersonalDetails(Request $request){
        $request->validate(['full_name'=>'required|max:70|regex:/^[a-zA-Z\s]+$/u',
        'dob'=>'required|date',
        'contact_number'=>'required|max:10|min:10',
        'gender'=>'required']);
        try {
            DB::table('personal_details')->insert($request->except('_token'));
            return back()->with('success','Personal Details Added Successfully');
        } catch (\Exception $ex) {
            return back()->with('error','Personal Details is Not Added');
        }
    }

    public function storeProfessionalDetails(Request $request){
        $request->validate(['current_job'=>'required|max:70|string',
        'organization'=>'nullable|max:70',
        'annual_income'=>'nullable|max:20']);
        try {
            DB::table('professional_details')->insert($request->except('_token'));
            return back()->with('success','Professional Details Added Successfully');
        } catch (\Exception $ex) {
            return back()->with('error','Professional Details is Not Added');
        }
    }

    public function storeFamilyDetails(Request $request){
        $request->validate(['father_name'=>'required|max:70|string',
            'mother_name'=>'required|max:70|string',
            'grand_father_name'=>'nullable|max:70|string',
            'grand_mother_name'=>'nullable|max:70|string',
            'uncle_name'=>'nullable|max:255|string',
            'aunty_name'=>'nullable|max:255|string',
            'brother_name'=>'nullable|max:255|string',
            'sister_name'=>'nullable|max:255|string']);
        try {
            DB::table('family_details')->insert($request->except('_token'));
            return back()->with('success','Family Details Added Successfully');
        } catch (\Exception $ex) {
            return back()->with('error','Family Details is Not Added');
        }
    }

    public function storeEducationDetails(Request $request){
        $request->validate(['education'=>'required|max:255|string']);
        try {
            DB::table('education_details')->insert($request->except('_token'));
            return back()->with('success','Education Details Added Successfully');
        } catch (\Exception $ex) {
            return back()->with('error','Education Details is Not Added');
        }
    }

    public function storeAddressDetails(Request $request){
        $request->validate(['permanent_address'=>'required|max:500|string',
            'correspondance_address'=>'nullable|max:500|string']);
        try {
            DB::table('address_details')->insert($request->except('_token'));
            return back()->with('success','Address Details Added Successfully');
        } catch (\Exception $ex) {
            return back()->with('error','Address Details is Not Added');
        }
    }

    public function storeLandDetails(Request $request){
        $request->validate(['land'=>'required|max:100|string']);
        try {
            DB::table('land_details')->insert($request->except('_token'));
            return back()->with('success','Land Details Added Successfully');
        } catch (\Exception $ex) {
            return back()->with('error','Land Details is Not Added');
        }
    }

    public function storeMaternalDetails(Request $request){
        $request->validate(['mama_name'=>'nullable|max:70|regex:/^[a-zA-Z\s]+$/u',
            'mami_name'=>'nullable|max:70|regex:/^[a-zA-Z\s]+$/u',
            'maternal_address'=>'required|max:500|string']);
        try {
            DB::table('maternal_details')->insert($request->except('_token'));
            return back()->with('success','Maternal Details Added Successfully');
        } catch (\Exception $ex) {
            return back()->with('error','Maternal Details is Not Added');
        }
    }

    public function preview(Request $request){
        $user_id=auth()->user()->id;
        $personal_details=DB::table('personal_details')->where('user_id',$user_id)->get();
        $professional_details=DB::table('professional_details')->where('user_id',$user_id)->get();
        $family_details=DB::table('family_details')->where('user_id',$user_id)->get();
        $education_details=DB::table('education_details')->where('user_id',$user_id)->get();
        $address_details=DB::table('address_details')->where('user_id',$user_id)->get();
        $land_details=DB::table('land_details')->where('user_id',$user_id)->get();
        $maternal_details=DB::table('maternal_details')->where('user_id',$user_id)->get();
        return view('user.preview',compact('personal_details','professional_details','family_details','education_details','address_details',
            'land_details','maternal_details'));
    }
}
