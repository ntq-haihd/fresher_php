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

        $checkOutData = Session::get('dataShoppingCart');
        // dd($checkOutData);

        return view('checkOut', ['dataShoppingCart' => $checkOutData]);
    }

    public function postCheckOut(Request $req)
    {


        // validate

        $personalInfo = $req->all();
        Session::put('shippingInfo', $personalInfo);
        


        $validator = $req->validate(
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
            ],

            $messages = [
                'required' => 'You have to enter this field'
                ,
                'email' => 'This mail is invalid'
                ,
                'numberic' => 'This is not a phone number'
            ]
        );

        // dd($personalInfo);
        return response()->json(['success' => true]);
    }
}
?>