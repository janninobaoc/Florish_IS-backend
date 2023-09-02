<?php

namespace App\Managers;

use App\Models\Product;
use App\Models\StockIn;
use Illuminate\Support\Facades\Auth;

class StockInManager
{
    public function createStockIn(array $stockInData)
    {
        $stockInData['reference_number'] = $this->generateReferenceNumber();
        $stockInData['stock_in_by'] = Auth::id(); // Set the current user's ID
        $stockInData['stock_in_date'] = now(); // Set the current date and time

        StockIn::create($stockInData);

        // Update the stock_on_hand of the related product
        $product = Product::findOrFail($stockInData['product_id']);
        $product->incrementStockOnHand($stockInData['quantity_added']);

        // Save the changes
        $product->save();
    }

    protected function generateReferenceNumber(): string
    {
        $timestamp = now()->format('YmdHis'); // Current date and time in YmdHis format
        $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number
        return "{$timestamp}{$randomNumber}";
    }

    public function getAllStockIns()
    {
        return StockIn::with(['stockInByUser'])->get();
    }
}
