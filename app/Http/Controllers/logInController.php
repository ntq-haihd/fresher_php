<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class logInController extends Controller
{
    public function getLogIn(){

        return view('signIn');
    }

    public function postLogIn(Request $req){
        $username = $req->username;
        $password = $req->password;
        
        $rules =[
            'username'=>'required|alpha|min:6|max:10'
            ,'password'=>'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'
        ];
        $messages =[
            'required'=>'this field must not be empty'
            ,'alpha'=>'username contains only letters'
            ,'min'=>'this field must have at least 6 characters'
            ,'max'=>'this field must have less than 11 characters'
            ,'regex'=>'Minimum 8 characters, lowercase letter a-z, at least uppercase letter A-Z, at least number 0-9'
        ];

        $req->validate($rules, $messages);
        
        $user = [
            'name' => $username,
            'password' => $password,
        ];


        if(Auth::attempt($user)){
            return redirect('cart');
        }else{
            return redirect()->back()->with('status', 'Incorrect username or password!');
        }

    }
}
