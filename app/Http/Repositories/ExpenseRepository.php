<?php

namespace App\Http\Repositories;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Collection;

class ExpenseRepository
{
    private $expense;
    private $expenseCategory;

    public function __construct(Expense $expense, ExpenseCategory $expenseCategory)
    {
        $this->expense = $expense;
        $this->expenseCategory = $expenseCategory;
    }

    /**
     * Get all expense categories.
     *
     * @param int $userId
     * @return Collection
     */
    public function getAllExpenseCategory(int $userId): Collection
    {
        $expenseCategories = $this->expenseCategory->where('user_id', $userId)
            ->get();

        return $expenseCategories;
    }

    /**
     * Create new expense category.
     *
     * @param array $data
     * @return void
     */
    public function createExpenseCategory(array $data): void
    {
        $this->expenseCategory->create($data);
    }

    /**
     * Get expense_category by id.
     *
     * @param int $userId
     * @param int $id
     * @return ExpenseCategory
     */
    public function getExpenseCategory(int $userId, int $id): ExpenseCategory
    {
        $expenseCategory = $this->expenseCategory->where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();

        return $expenseCategory;
    }

    /**
     * Update expense category by id.
     *
     * @param array $data
     * @param int $userId
     * @param int $id
     * @return void
     */
    public function updateExpenseCategory(array $data, int $userId, int $id): void
    {
        $this->expenseCategory->where('user_id', $userId)
            ->where('id', $id)
            ->update($data);
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

    public function createExpense(array $data): void
    {
        $this->expense->create($data);
    }

    public function getExpense(int $id, int $userId): Expense
    {
        $expense = $this->expense->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        return $expense;
    }

    public function updateExpense(array $data, int $id, int $userId): void
    {
        $this->expense->where('id', $id)
            ->where('user_id', $userId)
            ->update($data);
    }

    public function deleteExpense(int $id, int $userId): void
    {
        $expense = $this->expense->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $expense->delete();
    }
}
