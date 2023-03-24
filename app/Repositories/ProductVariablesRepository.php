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

/**
 * Interface UsersRepository.
 *
 * @package namespace App\Repositories;
 */
class ProductVariablesRepository extends BaseRepository
{

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

    public function getAll()
  {
        return ProductVariables::all();
  }

    public function getModel()
    {
        return ProductVariables::class;
    }
}
