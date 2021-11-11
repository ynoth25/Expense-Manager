<?php
namespace App\Actions\Expense;

use App\Models\Category;
class GetAllCategoriesAction{

    public function getCategories(){
        return $categories = Category::latest()->get();
    }
}
