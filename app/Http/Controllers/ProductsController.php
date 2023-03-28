<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductsService;
use App\Services\ProductDetailsService;
use Session;

class ProductsController extends Controller
{

    protected $productService;
    protected $productDetailsService;
    public function __construct(ProductsService $productsService, ProductDetailsService $productDetailsService){
        $this->productService = $productsService;
        $this->productDetailsService = $productDetailsService;
    }


    public function getProducts(){

        $product = Session::get('productData');



        $products = $this->productService->getAll();
        $productDetails = $this->productDetailsService->getAll();
        // dd($productDetails);

        return view('products', compact('products', 'productDetails'));
    }

    public function postProducts(Request $req){

        $id = $req->productID;
        // dd($id);
        return $this->productDetailsService->find($id);

    }
}
