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
class CategoriesRepository extends BaseRepository
{

    public function create($attributes = [])
    {
        return Categories::create($attributes);
    }

    public function getAll()
  {
        return Categories::all();
  }

    public function getModel()
    {
        return Categories::class;
    }
}
