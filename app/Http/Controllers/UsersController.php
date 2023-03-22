<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\NotifyMail;

class UsersController extends Controller
{
    protected $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function getSignUp()
    {

        return view('signUp');
    }

    public function getLogIn()
    {

        return view('signIn');
    }

    public function postSignUp(Request $req)
    {

        $user = $this->usersRepository->createUsers($req);
        return redirect('loginForm');

    }
    public function postLogIn(Request $req)
    {

        $username = $req->username;
        $password = $req->password;

        $user = $this->usersRepository->find($req);

        if ($user && Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect('cart');
        } else {
            return redirect()->back()->with('status', 'Incorrect username or password!');
        }

    }

    public function getForgetPassword()
    {

        return view('forgottenPassword');
    }

    public function postForgetPassword(Request $req)
    {

        $username = $req->username;

        $user = $this->usersRepository->find($req);

        if ($user && $user->username == $username) {
            $mailable = new NotifyMail(Hash::needsRehash($user->password));
            Mail::to($user->email)->send($mailable);
            return redirect('loginForm');
        } else {
            return redirect()->back()->with('status', 'Username does not exist!');
        }
    }
}
