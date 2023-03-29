<?php

namespace App\Http\Controllers;

use App\Models\AttributeValues;
use App\Services\CategoriesService;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use Session;

class AddProductController extends Controller
{

    protected $productsService;
    protected $categoriesService;

    public function __construct(ProductsService $productsService, CategoriesService $categoriesService)
    {
        $this->productsService = $productsService;
        $this->categoriesService = $categoriesService;
    }
    public function getAddProduct()
    {

        $categories = $this->categoriesService->getAll();

        return view('addProduct2', compact('categories'));
    }

    public function postAddProduct(Request $req)
    {
        $dataProduct = json_decode($req['dataProduct']);
        $variables = json_decode($req['variables']);
        $thumbnail = $req['thumbnail'];

        $data = [
            'dataProduct' => $dataProduct,
            'variables' => $variables,
            'thumbnail' => $thumbnail
        ];
        // dd($data);
        $this->productsService->create($data);

        return response()->json([
            'success' => true,
            'message' => 'ok'
        ]);

    }
}
?>
