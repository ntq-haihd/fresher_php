<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Summary of AddCategoriesController
 */
class AddCategoriesController extends Controller
{
    //

    public function getAddCategories(){
        return view('addCategories');
    }

    protected $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function postAddCategories(Request $request)
    {


        $this->categoriesService->create($request);

        return redirect('addproduct');
    }
}
