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


        // dd(Cloudinary::upload($request->file('thumbnail')->getRealPath())->getSecurePath());
        // $response = Cloudinary::upload(($request->thumbnail)->getRealPath())->getSecurePath();
        // $file = $request->thumbnail;

        // $response = Cloudinary::upload($file->getRealPath())->getSecurePath();



        $data = $request->all();


        dd($data);
        // Cloudinary::upload($image_name, null);

        // dd($response);

        // $this->categoriesService->create($request);

        return redirect('addproduct');
    }
}
