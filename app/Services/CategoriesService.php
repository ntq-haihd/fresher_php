<?php

namespace App\Services;

use App\Constants\UserConst;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoriesService
{

    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository){
        $this->categoriesRepository = $categoriesRepository;
    }

    public function create(Request $req){

        $attributes = [
            'title' => $req->title,
            'slug' => Str::slug($req->title),
            'description' => $req->description
        ];

        return $this->categoriesRepository->create($attributes);

    }

    public function getAll(){

        return $this->categoriesRepository->getAll();
    }

}
