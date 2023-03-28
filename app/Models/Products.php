<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_code',
        'slug',
        'status',
        'cat_id',
        'description',
        'tags',
        'total_stocks'
    ];

    public function productVariables()
    {
        return $this->hasMany(ProductVariables::class, 'product_id');
    }

}
