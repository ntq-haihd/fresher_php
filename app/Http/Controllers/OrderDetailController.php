<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class OrderDetailController extends Controller
{
    public function getOrderDetail(){

        $getPersonalInfo = Session::get('personalInfo');
        dd($getPersonalInfo);
        return view('orderdetail', ['personalInfo' => $getPersonalInfo]);
    }
    
}
