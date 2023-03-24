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
    public function create($data = [])
    {

        return Products::create(
            [
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => 1,
                'slug' => Str::slug($data['title']),
                'cat_id' => $data['categories'],
                'tags' => $data['tags']
            ]
        );


    }
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Products::class;
    }

    public function getAll()
    {

        return Products::all();
    }

/**
 * Summary of create
 * @param mixed $attributes
 * @return mixed
 */

}
