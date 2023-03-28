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
    protected $hehe;

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

        // return Products::join('product_variables', 'products.id', '=', 'product_variables.product_id')
        //     ->join('attributes_variables', 'product_variables.id', '=', 'attributes_variables.id')
        //     ->join('attribute_values', 'attribute_values.id', '=', 'attributes_variables.id')
        //     ->select('product_variables.*', 'attribute_values.value as value')
        //     // ->where('product_variables.product_id', '=', 'products.id')
        //     ->groupBy('product_variables.id')
        //     ->get();

        



        $colorValues = DB::table('attribute_values')
            ->select('products.id', 'attribute_values.value as color')
            ->join('attributes_variables', 'attribute_values.id', '=', 'attributes_variables.attribute_value_id')
            ->join('product_variables', 'attributes_variables.product_variable_id', '=', 'product_variables.id')
            ->join('products', 'product_variables.product_id', '=', 'products.id')
            ->join('attributes', 'attribute_values.attribute_id', '=', 'attributes.id')
            ->where('attributes.id', '=', 1)
            ->get();

        $sizeValues = DB::table('attribute_values')
            ->select('products.id', 'attribute_values.value as size')
            ->join('attributes_variables', 'attribute_values.id', '=', 'attributes_variables.attribute_value_id')
            ->join('product_variables', 'attributes_variables.product_variable_id', '=', 'product_variables.id')
            ->join('products', 'product_variables.product_id', '=', 'products.id')
            ->join('attributes', 'attribute_values.attribute_id', '=', 'attributes.id')
            ->where('attributes.id', '=', 2)
            ->get();

        // combine the results using the product ID as the key
        $results = [];
        foreach ($colorValues as $color) {
            $results[$color->id]['color'] = $color->color;
        }
        foreach ($sizeValues as $size) {
            $results[$size->id]['size'] = $size->size;
        }

        dd($results);
        // $results will contain an array of products with their respective color and size values










        // dd($query->get());

    }

    public function getModel()
    {
        return Products::class;
    }

    public function find($id)
    {
        $this->productId = $id;
        return $this->hehe = Products::where('products.id', '=', $id)->first();

    }
}
