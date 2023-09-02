<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'action',
        'product_id',
        'remarks',
        'quantity',
        'user',
    ];
    public function stockAdjustmentByUser()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
    public function adjustedProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
