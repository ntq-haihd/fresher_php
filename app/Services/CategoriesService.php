<?php

namespace App\Services;

use App\Constants\UserConst;
use App\Repositories\CategoriesRepository;
// use Cloudinary\Cloudinary;
// use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;




class CategoriesService
{

    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function create(Request $req)
    {

        // dd('req->thumbnail');
        // $req->thumbnail = Cloudinary::upload(($req->thumbnail)->getRealPath())->getSecurePath();
        // dd($req->thumbnail);

        // Upload thumbnail to Cloudinary
        // $thumbnail_url = Cloudinary::upload($req['thumbnail']->getRealPath())->getSecurePath();
        // $response = Cloudinary::upload($req->file('thumbnail')->getRealPath());



        return $this->categoriesRepository->create($req);

    }

    public function getAll()
    {

        return $this->categoriesRepository->getAll();
    }

}
