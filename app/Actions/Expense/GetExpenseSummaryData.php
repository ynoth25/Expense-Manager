<?php
namespace App\Actions\Expense;

use App\Models\Expense;
class GetExpenseSummaryData{

  public function getExpenseSummary(){
    $expenses = Expense::with('categories')->get();
    return $expenses;
  }
}