<?php

namespace App\Services;

use App\Constants\UserConst;
use App\Repositories\CategoriesRepository;
// use Cloudinary\Cloudinary;
// use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Repositories\ProductVariablesRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;




class ProductDetailsService
{

    protected $productVariablesRepository;

    public function __construct(ProductVariablesRepository $productVariablesRepository)
    {
        $this->productVariablesRepository = $productVariablesRepository;
    }

    public function create(Request $req)
    {


        // return $this->categoriesRepository->create($req);

    }

    public function getAll()
    {

        return $this->productVariablesRepository->getAll();
    }

    public function find($id){

        return $this->productVariablesRepository->find($id);
    }

}
