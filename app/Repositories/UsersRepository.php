<?php

namespace App\Repositories;

use App\Repositories\UsersInterface;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Interface UsersRepository.
 *
 * @package namespace App\Repositories;
 */
class UsersRepository implements UsersInterface
{
    public function createUsers($req)
    {

        $gender = ($req->input('gender') == "Male") ? '0' : '1';
        $email = $req->email;
        $username = $req->username;
        $password = $req->password;
        $phone_number = $req->phone_number;
        $first_name = $req->first_name;
        $last_name = $req->last_name;
        $gender = $req->gender;

        $rules = [
            'email' => 'required|email'
            ,
            'username' => 'required|alpha|min:6|max:10'
            ,
            'first_name' => 'required|alpha|min:6|max:10'
            ,
            'last_name' => 'required|alpha|min:6|max:10'
            ,
            'password' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'
            ,
            'phone_number' => 'required'
        ];

        $messages = [
            'email.email' => 'this is not an email'
            ,
            'required' => 'this field must not be empty'
            ,
            'alpha' => 'username contains only letters'
            ,
            'min' => 'this field must have at least 6 characters'
            ,
            'max' => 'this field must have less than 11 characters'
            ,
            'regex' => 'Minimum 8 characters, lowercase letter a-z, at least uppercase letter A-Z, at least number 0-9'
        ];

        $req->validate($rules, $messages);

        return Users::create(
            [
                'username' => $username,
                'email' => $email,
                'phone_number' => $phone_number,
                'password' => Hash::make($password),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'gender' => $gender,
                'slug' => Str::slug($req->username)
            ]
        );

    }

    public function find($req)
    {

        $username = $req->username;
        $password = $req->password;

        $rules = [
            'username' => 'required|alpha|min:6|max:10'
            ,
            'password' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'
        ];
        $messages = [
            'required' => 'this field must not be empty'
            ,
            'alpha' => 'username contains only letters'
            ,
            'min' => 'this field must have at least 6 characters'
            ,
            'max' => 'this field must have less than 11 characters'
            ,
            'regex' => 'Minimum 8 characters, lowercase letter a-z, at least uppercase letter A-Z, at least number 0-9'
        ];

        $req->validate($rules, $messages);

        $user = Users::where('username', $username)->first();

        return $user;
    }
}
