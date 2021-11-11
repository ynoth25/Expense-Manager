<?php
namespace App\Actions\Expense;

use App\Models\Expense;
class GetAllExpenseAction{

    public function getExpenses(){
        return $expenses = Expense::with('categories')->latest()->get();
    }
}
