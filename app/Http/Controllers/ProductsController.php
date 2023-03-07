<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
    public function getProducts(){

        $product = Session::get('productData');
        // dd($product);

        return view('products');
    }
}
