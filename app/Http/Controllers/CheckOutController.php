<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CheckOutController extends Controller
{
    public function getCheckOut(){

        $checkOutData = Session::get('checkOutData');
        dd($checkOutData);

        return view('checkOut', ['checkOutData' => $checkOutData]);
    }

    public function postCheckOut(Request $req){
        
        $firstname = $req->firstname;
        $lastname = $req->lastname;
        $email = $req->email;
        $phone = $req->phone;
        $address = $req->address;

        $rules = [
            'firstname' => 'required|alpha'
            ,'lastname' => 'same:firstname'
            ,'email' => 'email'
            ,'phone' => 'required|numberic'
            ,'address' => 'required'
        ];

        $messages = [
            'required' => 'you have to enter this field'
            ,'email' => 'this mail is invalid'
            ,'numberic' => 'this is not a phone number'
        ];

        

        $req->validate($rules, $messages);
    }
}
?>
