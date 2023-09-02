<?php
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class StockManager
{
    public function getCriticalStock()
    {
        return Product::where('stock_on_hand', '<=', DB::raw('reorder_level'))->get();
    }
}
