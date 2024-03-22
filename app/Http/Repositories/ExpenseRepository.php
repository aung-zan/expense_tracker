<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Traits\ExpenseCategoryTrait;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Collection;

class ExpenseRepository
{
    use ExpenseCategoryTrait;

    private $expense;
    private $expenseCategory;

    public function __construct(Expense $expense, ExpenseCategory $expenseCategory)
    {
        $this->expense = $expense;
        $this->expenseCategory = $expenseCategory;
    }

    /**
     * Get all expenses.
     */
    public function getAllExpense(int $userId, string $date): Collection
    {
        $expenses = $this->expense->leftJoin(
            'expense_categories',
            'expenses.expense_category_id',
            '=',
            'expense_categories.id'
        )
            ->where('expenses.user_id', $userId)
            ->where('expense_date', $date)
            ->select('expenses.*', 'expense_categories.name as category')
            ->get();

        return $expenses;
    }

    /**
     * Create a new expense.
     *
     * @param array $data
     * @return void
     */
    public function createExpense(array $data): void
    {
        $this->expense->create($data);
    }

    /**
     * Get an expense by id.
     *
     * @param int $id
     * @param int $userId
     * @return Expense
     */
    public function getExpense(int $id, int $userId): Expense
    {
        $expense = $this->expense->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        return $expense;
    }

    /**
     * Update an expense by id.
     *
     * @param array $data
     * @param int $id
     * @param int $userId
     * @return void
     */
    public function updateExpense(array $data, int $id, int $userId): void
    {
        $this->expense->where('id', $id)
            ->where('user_id', $userId)
            ->update($data);
    }

    /**
     * Delete an expense by id.
     *
     * @param int $id
     * @param int $userId
     * @return void
     */
    public function deleteExpense(int $id, int $userId): void
    {
        $expense = $this->expense->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $expense->delete();
    }
}
