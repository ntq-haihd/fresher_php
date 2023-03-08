<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Session;
use Illuminate\Support\Facades\Validator;

class CheckOutController extends Controller
{
    public function getCheckOut()
    {

        $checkOutData = Session::get('checkOutData');
        // dd($checkOutData);

        return view('checkOut', ['checkOutData' => $checkOutData]);
    }

    public function postCheckOut(Request $req)
    {

        
        // validate

        // $firstname = $req->firstname;
        // $lastname = $req->lastname;
        // $email = $req->email;
        // $phone = $req->phone;
        // $address = $req->address;

        $rules = [
            'firstname' => 'required|alpha'
            ,
            'lastname' => 'required|alpha'
            ,
            'email' => 'email'
            ,
            'phone' => 'required|numberic'
            ,
            'address' => 'required'
        ];

        $messages = [
            'required' => 'You have to enter this field'
            ,
            'email' => 'This mail is invalid'
            ,
            'numberic' => 'This is not a phone number'
        ];

        
        $personalInfo = $req->all();
        Session::put('personalInfo', $personalInfo);
        $validator = Validator::make($req->all(), $rules, $messages);
        
        try {
            $validator->validate();
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
       
        return response()->json(['success' => true]);
    }
}
?>