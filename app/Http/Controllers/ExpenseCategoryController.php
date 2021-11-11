<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AddExpenseCategoryRequest;
use App\Actions\Expense\GetAllCategoriesAction;
use Inertia\Inertia;

class ExpenseCategoryController extends Controller
{

    public function __construct(){
        $this->getAllCategoriesAction = new GetAllCategoriesAction();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getAllCategoriesAction->getCategories();
        return Inertia::render('Expense/Categories', [
            'preloaded_categories' => $categories
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
    public function store(AddExpenseCategoryRequest $request)
    {
        if($request->validated()){
            try{
                $category = new Category();
                $category->name = $request->name;
                $category->description = $request->description;
                $category->save();
                return response()->json($this->getAllCategoriesAction->getCategories());
            } catch(Exception $e){}
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $expenseCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(Category $expenseCategoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $expenseCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $expenseCategoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $expenseCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, AddExpenseCategoryRequest $request )
    {
        if($request->validated()){
            try{
                $category = Category::findOrFail($id);
                $category->name = $request->name;
                $category->description = $request->description;
                $category->save();
                return response()->json($this->getAllCategoriesAction->getCategories());
            }catch(Throwable $e){}
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $expenseCategoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json('Category Deleted');
    }
}
