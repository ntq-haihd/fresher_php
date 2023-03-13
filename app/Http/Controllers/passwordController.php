<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use Illuminate\Http\Request;
use Session;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class passwordController extends Controller
{
    public function getForgetPassword()
    {
        return view('forgottenPassword');
    }

    public function postForgetPassword(Request $req)
    {
        $email = $req->email;

        $rules = ['email' => 'email|required'];
        $messages = ['email.email' => 'this is not an email'];

        $req->validate($rules, $messages);


        if (User::where('email', $email)->first()) {
            $mailable = new NotifyMail('123456');
            Mail::to($email)->send($mailable);
            return redirect('loginForm');
        } else {
            return redirect()->back()->with('status', 'Email does not exist!');
        }

    }
}