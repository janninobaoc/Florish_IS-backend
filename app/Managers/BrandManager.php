<?php

namespace App\Managers;
use App\Models\Brand;

class BrandManager
{
    public function createBrand($brandData)
    {
        $brand = new Brand();
        $brand->brand_name = $brandData['brand_name'];

        $brand->save();

        return $brand;
    }

    public function getAllBrands()
    {
        return Brand::all();
    }

    public function getBrandById(string $id)
    {
        return Brand::find($id);
    }

    public function updateBrand(Brand $brand, array $data)
    {
        $brand->update($data);
    }

    public function deleteBrand(Brand $brand): void
    {
        $brand->delete();
    }
}