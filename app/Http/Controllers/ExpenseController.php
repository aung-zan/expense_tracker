<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ExpenseRepository;
use App\Http\Requests\ExpenseRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    private $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        $userId = auth()->user()->id;
        $date = $request->get('date') ?? Carbon::now()->format('Y-m');

        $expenses = $this->expenseRepository->getAllExpense($userId, $date);

        return view('expense.list', [
            'expenses' => $expenses,
            'date' => $date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->user()->id;

        $expenseTypes = $this->expenseRepository->getAllExpenseTypes($userId);

        return view('expense.create', [
            'expenseTypes' => $expenseTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        $userId = auth()->user()->id;
        $data = $request->validated();
        $data['user_id'] = $userId;

        $this->expenseRepository->createExpense($data);

        return redirect()->route('expenseList');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $userId = auth()->user()->id;

        $expenseCategory = $this->expenseRepository->getAllExpenseTypes($userId);
        $expense = $this->expenseRepository->getExpense($id, $userId);

        return view('expense.edit', [
            'expenseCategory' => $expenseCategory,
            'expense' => $expense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, int $id)
    {
        $userId = auth()->user()->id;
        $data = $request->validated();

        $this->expenseRepository->updateExpense($data, $id, $userId);

        return redirect()->route('expenseList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $userId = auth()->user()->id;

        $this->expenseRepository->deleteExpense($id, $userId);

        return redirect()->route('expenseList');
    }
}
