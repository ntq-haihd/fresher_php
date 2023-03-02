<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use Illuminate\Http\Request;
use Session;
use Mail;

class passwordController extends Controller
{
    public function getForgetPassword(){
        return view('forgottenPassword');
    }

    public function postForgetPassword(Request $req){
        $email = $req->email;

        $rules = ['email'=>'email|required'];
        $messages = ['email.email'=>'this is not an email'];

        $req->validate($rules, $messages);

        $mailable = new NotifyMail('123456');
        if($email == Session::get('email')){
            Mail::to($email)->send($mailable);
            return 'New Password has sent to your email!';
        }else{
            return 'Your email is not correct';
        }
        
    }
}
