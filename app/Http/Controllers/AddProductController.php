<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AddProductController extends Controller
{
    public function getAddProduct(){
        return view('addProduct');
    }

    public function postAddProduct(Request $req){

        $product = $req->all();
        Session::put('productData', $product);
        // dd($product);
        return response()->json(['success' => true]);

    }
}
?>
