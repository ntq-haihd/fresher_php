<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function getOrderDetails(){
        return view('orderdetail');
    }
}
