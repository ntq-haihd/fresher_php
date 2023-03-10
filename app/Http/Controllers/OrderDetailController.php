<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class OrderDetailController extends Controller
{   
    public function getOrderDetail(){

        $getPersonalInfo = Session::get('shippingInfo');
        dd($getPersonalInfo);
        return view('orderdetail', ['shippingInfo' => $getPersonalInfo]);
    }
    
}
