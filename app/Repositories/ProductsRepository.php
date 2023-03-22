<?php

namespace App\Repositories;

use App\Repositories\UsersInterface;
use App\Models\Products;
use App\Models\Categories;

use Illuminate\Support\Str;



/**
 * Interface UsersRepository.
 *
 * @package namespace App\Repositories;
 */
class ProductsRepository extends BaseRepository
{

    // /**
    //  * Summary of create
    //  * @param mixed $req
    //  * @return void
    //  */
    public function create($req = [])
    {

        return Products::create($req->all());

    }
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Products::class;
    }

    public function getAll(){

        return Products::all();
    }

/**
 * Summary of create
 * @param mixed $attributes
 * @return mixed
 */

}
