<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ExpenseRepository;
use App\Http\Requests\ExpenseCategoryRequest;

class ExpenseCategoryController extends Controller
{
    private $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $userId = auth()->user()->id;
        $expenseCategories = $this->expenseRepository->getAllExpenseCategory($userId);

        return view('expense_category.list', [
            'expenseCategories' => $expenseCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseCategoryRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $this->expenseRepository->createExpenseCategory($data);

        return redirect()->route('expenseCategoryList');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $userId = auth()->user()->id;
        $expenseCategory = $this->expenseRepository->getExpenseCategory($userId, $id);

        return view('expense_category.edit', [
            'expenseCategory' => $expenseCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseCategoryRequest $request, int $id)
    {
        $userId = auth()->user()->id;

        $data = $request->validated();

        $this->expenseRepository->updateExpenseCategory($data, $userId, $id);

        return redirect()->route('expenseCategoryList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
