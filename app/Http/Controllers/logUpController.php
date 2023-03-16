<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;

class logUpController extends Controller
{
    public function getLogUp(){
        return view('signUp');
    }

    public function postLogUp(Request $req){

        $email = $req->email;
        $username = $req->username;
        $password = $req->password;
        $phone = $req->phone;

        $rules = [
            'email'=>'email|required'
            ,'username'=>'required|alpha|min:6|max:10'
            ,'password'=>'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'
            ,'phone'=>'required'
        ];

        $messages = [
            'email.email'=>'this is not an email'
            ,'required'=>'this field must not be empty'
            ,'alpha'=>'username contains only letters'
            ,'min'=>'this field must have at least 6 characters'
            ,'max'=>'this field must have less than 11 characters'
            ,'regex'=>'Minimum 8 characters, lowercase letter a-z, at least uppercase letter A-Z, at least number 0-9'
        ];

        $req->validate($rules, $messages);

        $user = User::create(
            [
                'username' => $username,
                'email' => $email,
                'phone_number' => $phone,
                'password' => Hash::make($password)
            ]
        );

       return redirect('loginForm');

    }
}
