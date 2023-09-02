<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'product_id',
        'quantity_added',
        'stock_in_date',
        'stock_in_by',
    ];

    public function stockInByUser()
    {
        return $this->belongsTo(User::class, 'stock_in_by', 'id');
    }
}
