<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Traits\ExpenseTypeTrait;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Database\Eloquent\Collection;

class ExpenseRepository
{
    use ExpenseTypeTrait;

    private $expense;
    private $expenseType;

    public function __construct(Expense $expense, ExpenseType $expenseType)
    {
        $this->expense = $expense;
        $this->expenseType = $expenseType;
    }

    /**
     * Get all expenses.
     *
     * @param int $userId
     * @param string $date
     * @return Collection
     */
    public function getAllExpense(int $userId, string $date): Collection
    {
        $expenses = $this->expense->leftJoin(
            'expense_types',
            'expenses.expense_type_id',
            '=',
            'expense_types.id'
        )
            ->where('expenses.user_id', $userId)
            ->where('expense_date', $date)
            ->select('expenses.*', 'expense_types.name as type')
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

    /**
     * Get all expense amount group by expense type.
     *
     * @param int $userId
     * @param string $date
     * @return Collection
     */
    public function getExpenseAmountByExpenseType(int $userId, string $date): Collection
    {
        $expenses = $this->expense->leftJoin(
            'expense_types',
            'expenses.expense_type_id',
            '=',
            'expense_types.id'
        )
        ->where('expenses.user_id', $userId)
        ->where('expense_date', $date)
        ->selectRaw('expense_types.name, sum(amount) as expense_amount')
        ->groupBy('expense_types.name')
        ->orderBy('expense_amount', 'DESC')
        ->get();

        return $expenses;
    }
}
