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
}
