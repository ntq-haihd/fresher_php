<?php

namespace App\Services;

use App\Constants\UserConst;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductsService
{

    protected $productsRepository;

    public function __construct(ProductsRepository $productsRepository){
        $this->productsRepository = $productsRepository;
    }

    public function create(Request $req){

        $req['slug'] = Str::slug($req->title);

        return $this->productsRepository->create($req);

    }

    public function getAll(){
        return $this->productsRepository->getAll();
    }

}
