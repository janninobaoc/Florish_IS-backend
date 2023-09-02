<?php

namespace App\Managers;
use App\Models\Category;

class CategoryManager
{
    public function createCategory($categoryData)
    {
        $category = new Category();
        $category->category_name = $categoryData['category_name'];
        $category->category_code = strtoupper($categoryData['category_code']); 

        $category->save();

        return $category;
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById(string $id)
    {
        return Category::find($id);
    }

    public function updateCategory(Category $category, array $data)
    {
        $category->update($data);
    }

    public function deleteCategory(Category $category): void
    {
        $category->delete();
    }
}
