<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Repositories\UsersInterface;
use App\Models\Products;
use App\Models\ProductVariables;
use App\Models\AttributeProductVariables;
use App\Models\Attributes;
use App\Models\AttributeValues;
use Illuminate\Support\Str;
use DB;

/**
 * Interface UsersRepository.
 *
 * @package namespace App\Repositories;
 */
class ProductVariablesRepository extends BaseRepository
{

    protected $productId;

    public function create($attributes = [])
    {
        return ProductVariables::create(
            [
                'product_id' => $attributes['product_id'],
                'stocks' => $attributes['stocks'],
                'import_price' => $attributes['import_price']
            ]
        );
    }

    /**
     * Summary of getAll
     * @return void
     */
    public function getAll()
    {

        // dd($this->productId);
        // $product = $this->find($this->productId);
        // return $product;

    }

    public function getById($id)
    {
        
        return Products::with('productVariables.attributes.values.attribute')
        ->where('id', $id)
        ->get();
    }
    public function getModel()
    {
        return Products::class;
    }

    public function find($id)
    {
        return ProductVariables::where('product_id', $id)->get();
    }
}
