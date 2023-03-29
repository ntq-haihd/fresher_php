<?php

namespace App\Repositories;

use App\Models\AttributesVariables;
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
class AttributesVariablesRepository extends BaseRepository
{

    public function create($attributes = [])
    {
        $attrValueId = $attributes['attribute_value_id'];
        $proVariId = $attributes['product_variable_id'];

        foreach($attrValueId as $attr){
            AttributesVariables::firstOrCreate(
                [
                    'attribute_value_id' => $attr,
                    'product_variable_id' => $proVariId
                ]
            );
        }

    }

    public function getAll()
  {
        return AttributesVariables::all();
  }

    public function getModel()
    {
        return AttributesVariables::class;
    }

}
