<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    
    const PRODUCT_TYPE_FOR_CONVENIENCE = 1;
    const PRODUCT_TYPE_FOR_REFILLING = 2;
    const PRODUCT_TYPE_FOR_PASTRY= 3;

    protected $fillable = [
        'product_type',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
