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
    private $id;

    public function __construct(ProductsService $productsService, ProductDetailsService $productDetailsService){
        $this->productService = $productsService;
        $this->productDetailsService = $productDetailsService;
    }


    public function getProducts(){

        // $product = Session::get('productData');




        // dd($this->id);
        // $productDetails = $this->productDetailsService->getById($this->id);
        $products = $this->productService->getAll();

        // return view('products', compact('products'));
        return view('products',[ 'products' => $products]);
     }

    public function postProducts(Request $req){

        $id = $req['id'];

        $productDetails = $this->productDetailsService->getById($id);
        dd($productDetails);

    }
}
