<?php

namespace App\Repositories;

use App\Repositories\UsersInterface;
use App\Models\Products;
use App\Models\Categories;

use Illuminate\Support\Str;
// use Predis\Command\Traits\DB;
use Illuminate\Support\Facades\DB;




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
                'status' => $data['status'],
                'slug' => Str::slug($data['title']),
                'cat_id' => $data['categories'],
                'tags' => $data['tags'],
                'thumbnail' => $data['thumbnail']
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

        return Products::join('categories', 'products.cat_id', '=', 'categories.id')
                        ->join('product_variables', 'product_variables.product_id', '=', 'products.id')
                        ->select('products.*', 'categories.title as cat_name',
                                DB::raw('CONCAT(MIN(product_variables.import_price)," - ", MAX(product_variables.import_price)) as price_range'),
                                DB::raw('SUM(product_variables.stocks) as total_stock'))
                        ->groupBy('products.id')
                        ->get();

    }

/**
 * Summary of create
 * @param mixed $attributes
 * @return mixed
 */

}
