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
class AttributeValuesRepository extends BaseRepository
{

    public function create($attributes = [])
    {
        return AttributeValues::create(
            [
                'attribute_id' => $attributes['attribute_id'],
                'value' => $attributes['value']
            ]

        );
    }
    // public function create($attributes = [])
    // {
    //     $attributeValues = [];
    //     foreach ($attributes as $attribute) {
    //         $attributeValues[] = [
    //             'attribute_id' => $attribute['attribute_id'],
    //             'value' => $attribute['value']
    //         ];
    //     }
    //     return AttributeValues::create($attributeValues);
    // }

    public function getAll()
    {
        return AttributeValues::all();
    }

    public function getModel()
    {
        return AttributeValues::class;
    }
}
