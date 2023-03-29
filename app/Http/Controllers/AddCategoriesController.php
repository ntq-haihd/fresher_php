<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
// use Cloudinary\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use SplFileInfo;




/**
 * Summary of AddCategoriesController
 */
class AddCategoriesController extends Controller
{
    //

    public function getAddCategories()
    {
        return view('addCategories');
    }

    protected $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    public function postAddCategories(Request $request)
    {

        $data = $request->all();

        $this->categoriesService->create($data);

        return redirect('addproduct');
    }
}
