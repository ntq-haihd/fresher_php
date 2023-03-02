<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class logUpController extends Controller
{
    public function getLogUp(){
        return view('signUp');
    }

    public function postLogUp(Request $req){
        
        $email = $req->email;
        $username = $req->username;
        $password = $req->password;

        $rules = [
            'email'=>'email|required'
            ,'username'=>'required|alpha|min:6|max:10'
            ,'password'=>'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'
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
        
        $req->session()->put('username', $username);
        $req->session()->put('password', $password);
        $req->session()->put('email', $email);

       return redirect('loginForm');
        
    }
}
