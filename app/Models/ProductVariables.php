<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariables extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'stocks',
        'import_price'
    ];

    public function attributes()
    {
        return $this->hasMany(AttributesVariables::class, 'product_variable_id');
    }
}
