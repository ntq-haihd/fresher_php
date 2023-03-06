<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function getCart(){
        return view('cart');
    }

    public function postCart(Request $req){
        
        $data = $req->all();
        Session::put('checkOutData', $data);
        return response()->json(['success' => true]);
    }
}

?>
