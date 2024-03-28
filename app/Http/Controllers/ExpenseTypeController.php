<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ExpenseRepository;
use App\Http\Requests\ExpenseTypeRequest;

class ExpenseTypeController extends Controller
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
        $expenseTypes = $this->expenseRepository->getAllExpenseTypes($userId);

        return view('expense_type.list', [
            'expenseTypes' => $expenseTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseTypeRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $this->expenseRepository->createExpenseType($data);

        return redirect()->route('expenseTypeList');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $userId = auth()->user()->id;
        $expenseType = $this->expenseRepository->getExpenseType($userId, $id);

        return view('expense_type.edit', [
            'expenseType' => $expenseType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseTypeRequest $request, int $id)
    {
        $userId = auth()->user()->id;

        $data = $request->validated();

        $this->expenseRepository->updateExpenseType($data, $userId, $id);

        return redirect()->route('expenseTypeList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
