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
class AttributesRepository extends BaseRepository
{

    /**
     * Summary of create
     * @param mixed $attributes
     * @return void
     */
    public function create($attributes = [])
    {

    }

    public function getAll()
  {
        return Attributes::all();
  }

    public function getModel()
    {
        return Attributes::class;
    }
}
