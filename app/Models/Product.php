<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_code',
        'barcode',
        'description',
        'price',
        'reorder_level',
        'stock_on_hand',
        'product_type_id',
        'category_id',
        'brand_id',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function incrementStockOnHand($quantity)
    {
        $this->stock_on_hand += $quantity;
    }
}
