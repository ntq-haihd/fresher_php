<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductsService;

use Session;

class ProductsController extends Controller
{

    protected $productService;
    public function __construct(ProductsService $productsService){
        $this->productService = $productsService;
    }


    public function getProducts(){

        $product = Session::get('productData');

        $products = $this->productService->getAll();

        return view('products', compact('products'));
    }
}
