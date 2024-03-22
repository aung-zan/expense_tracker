<?php

namespace App\Http\Repositories\Traits;

use Illuminate\Database\Eloquent\Collection;
use App\Models\ExpenseCategory;

trait ExpenseCategoryTrait
{
    /**
     * Get all expense_type.
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
     * Create a new expense_type.
     *
     * @param array $data
     * @return void
     */
    public function createExpenseCategory(array $data): void
    {
        $this->expenseCategory->create($data);
    }

    /**
     * Get an expense_type by id.
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
     * Update an expense_type by id.
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
