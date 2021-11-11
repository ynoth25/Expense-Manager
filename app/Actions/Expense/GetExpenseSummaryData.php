<?php
namespace App\Actions\Expense;

use App\Models\Expense;
use App\Models\Category;
class GetExpenseSummaryData{

  public function getExpenseSummary(){
    $data = array();
    $categories = Category::with('expenses')->get();
    $data["labels"] = $categories->pluck('name')->toArray();
    $data["data"] = collect($categories)->map(function ($item) {
      return $item->expenses->sum('amount');
    })->toArray();

    return $data;
  }
}