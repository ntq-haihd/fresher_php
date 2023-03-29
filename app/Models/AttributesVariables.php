<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesVariables extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_value_id',
        'product_variable_id'
    ];

    public function values()
    {
        return $this->belongsTo(AttributeValues::class, 'attribute_value_id');
    }


}
