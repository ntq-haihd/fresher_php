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
use SplFileInfo;





class CategoriesService
{

    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function create($req = [])
    {

        $thumbnail = Cloudinary::upload($req['image']->getRealPath())->getSecurePath();
        $title = $req['title'];
        $description = $req['description'];

        $dataAll = [
            'title' => $title,
            'description' => $description,
            'thumbnail' => $thumbnail,
            'slug' => Str::slug($title)
        ];

        return $this->categoriesRepository->create($dataAll);

    }

    public function getAll()
    {

        return $this->categoriesRepository->getAll();
    }

}
