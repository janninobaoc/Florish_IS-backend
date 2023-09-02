<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockAdjustmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'action' => 'required',
            'product_id' => 'required|exists:products,id',
            'remarks' => 'required',
            'quantity' => 'required|integer|min:1',
        ];
    }
}
