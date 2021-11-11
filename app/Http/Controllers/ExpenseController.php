<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Requests\AddExpenseRequest;
use App\Actions\Expense\GetAllExpenseAction;
use Inertia\Inertia;

class ExpenseController extends Controller
{

    public function __construct(){
        $this->getAllExpenseAction = new GetAllExpenseAction();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Expense/Expenses', [
            'preloaded_expenses' => $this->getAllExpenseAction->getExpenses(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddExpenseRequest $request)
    {
        if($request->validated()){
            try{
                $expense = new Expense();
                $expense->category_id = $request->expense_category;
                $expense->amount = $request->amount;
                $expense->entry_date = $request->entry_date;
                $expense->save();
                return response()->json($this->getAllExpenseAction->getExpenses());
            } catch(Throwable $e) {}
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expenseModel
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expenseModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expenseModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expenseModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expenseModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, AddExpenseRequest $request)
    {
        if($request->validated()){
            try{
                $expense = Expense::findOrFail($id);
                $expense->category_id = $request->expense_category;
                $expense->amount = $request->amount;
                $expense->entry_date = $request->entry_date;
                $expense->save();
                return response()->json($this->getAllExpenseAction->getExpenses());
            }catch(Throwable $e){}
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expenseModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return response()->json('Expense Deleted');
    }
}
