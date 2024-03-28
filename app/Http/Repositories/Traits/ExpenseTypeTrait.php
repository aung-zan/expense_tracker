<?php

namespace App\Http\Repositories\Traits;

use Illuminate\Database\Eloquent\Collection;
use App\Models\ExpenseType;

trait ExpenseTypeTrait
{
    /**
     * Get all expense_type.
     *
     * @param int $userId
     * @return Collection
     */
    public function getAllExpenseTypes(int $userId): Collection
    {
        $expenseTypes = $this->expenseType->where('user_id', $userId)
            ->get();

        return $expenseTypes;
    }

    /**
     * Create a new expense_type.
     *
     * @param array $data
     * @return void
     */
    public function createExpenseType(array $data): void
    {
        $this->expenseType->create($data);
    }

    /**
     * Get an expense_type by id.
     *
     * @param int $userId
     * @param int $id
     * @return ExpenseType
     */
    public function getExpenseType(int $userId, int $id): ExpenseType
    {
        $expenseType = $this->expenseType->where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();

        return $expenseType;
    }

    /**
     * Update an expense_type by id.
     *
     * @param array $data
     * @param int $userId
     * @param int $id
     * @return void
     */
    public function updateExpenseType(array $data, int $userId, int $id): void
    {
        $this->expenseType->where('user_id', $userId)
            ->where('id', $id)
            ->update($data);
    }
}
