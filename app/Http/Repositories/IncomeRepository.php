<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Traits\IncomeTypeTrait;
use App\Models\Income;
use App\Models\IncomeType;
use Illuminate\Database\Eloquent\Collection;

class IncomeRepository
{
    use IncomeTypeTrait;

    private $income;
    private $incomeType;

    public function __construct(Income $income, IncomeType $incomeType)
    {
        $this->income = $income;
        $this->incomeType = $incomeType;
    }

    /**
     * Get all income.
     *
     * @param int $userId
     * @param string $date
     * @return Collection
     */
    public function getAllIncome(int $userId, string $date): Collection
    {
        $incomes = $this->income->leftJoin(
            'income_types',
            'incomes.income_type_id',
            '=',
            'income_types.id'
        )
            ->where('incomes.user_id', $userId)
            ->where('income_date', $date)
            ->select('incomes.*', 'income_types.name')
            ->get();

        return $incomes;
    }

    /**
     * Get an income info by income's id and date.
     *
     * @param id $userId
     * @param id $incomeTypeId
     * @param string $incomeDate
     * @return Income|null
     */
    public function getIncomeByIdAndDate(array $data): Income|null
    {
        $query = $this->income->where('user_id', $data['user_id'])
            ->where('income_type_id', $data['income_type_id'])
            ->where('income_date', $data['income_date']);

        if (array_key_exists('income_id', $data)) {
            $query = $query->where('id', '<>', $data['income_id']);
        }

        $income = $query->first();

        return $income;
    }

    /**
     * Create a new income.
     *
     * @param array $data
     * @return void
     */
    public function createNewIncome(array $data): void
    {
        $this->income->create($data);
    }

    /**
     * Get an income by id.
     *
     * @param int $id
     * @param int $userId
     * @return Income
     */
    public function getIncome(int $id, int $userId): Income
    {
        $income = $this->income->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        return $income;
    }

    /**
     * Update an income by id.
     *
     * @param array $data
     * @param int $id
     * @param int $userId
     * @return void
     */
    public function updateIncome(array $data, int $id, int $userId): void
    {
        $this->income->where('id', $id)
            ->where('user_id', $userId)
            ->update($data);
    }

    /**
     * Delete an income by id.
     *
     * @param int $id
     * @return void
     */
    public function deleteIncome(int $id, int $userId): void
    {
        $income = $this->income->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $income->delete();
    }
}
