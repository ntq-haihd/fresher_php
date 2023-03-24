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


        return $this->categoriesRepository->create($req);

    }

    public function getAll(){

        return $this->categoriesRepository->getAll();
    }

}
