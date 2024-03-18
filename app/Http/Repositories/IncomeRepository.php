<?php

namespace App\Http\Repositories;

use App\Models\Income;
use App\Models\IncomeAmount;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class IncomeRepository
{
    private $income;
    private $incomeAmount;

    public function __construct(Income $income, IncomeAmount $incomeAmount)
    {
        $this->income = $income;
        $this->incomeAmount = $incomeAmount;
    }

    /**
     * Get income amounts by user_id and income's dates.
     *
     * @param string $date
     * @return Collection
     */
    public function getIncomeAmount(string $date): Collection
    {
        $userId = auth()->user()->id;
        $incomeAmounts = $this->incomeAmount->leftJoin('incomes', 'income_amounts.income_id', '=', 'incomes.id')
            ->where('incomes.user_id', $userId)
            ->where('income_amounts.income_date', $date)
            ->select('income_amounts.*', 'incomes.name')
            ->get();

        return $incomeAmounts;
    }

    /**
     * Create a new income.
     *
     * @param array $data
     * @return Income
     */
    private function createNewIncome(array $data): Income
    {
        $income = $this->income->create($data);

        return $income;
    }

    /**
     * Get all incomes by user_id.
     *
     * @return Income
     */
    public function getIncome(): Collection
    {
        $userId = auth()->user()->id;
        $incomes = $this->income->where('user_id', $userId)
            ->get();

        return $incomes;
    }

    /**
     * Get income info by income's id and date.
     *
     * @param id $incomeId
     * @param string $incomeDate
     * @return Income
     */
    public function getIncomeByIdAndDate($incomeId, $incomeDate): IncomeAmount|null
    {
        $income = $this->incomeAmount->where('income_id', $incomeId)
            ->where('income_date', $incomeDate)
            ->first();

        return $income;
    }

    /**
     * Add new amount for income.
     *
     * @param array $data
     * @return void
     */
    public function addNewAmount(array $data): void
    {
        DB::transaction(function () use ($data) {
            if (array_key_exists('name', $data)) {
                $data['user_id'] = auth()->user()->id;
                $newIncome = $this->createNewIncome($data);
                $data['income_id'] = $newIncome->id;
            }

            $this->incomeAmount->create($data);
        });
    }

    /**
     * Get the income and income amount via income amount id.
     *
     * @param int $id
     * @return IncomeAmount
     */
    public function getIncomeAmountById(int $id): IncomeAmount
    {
        $income = $this->incomeAmount->where('id', $id)
            ->with('income')
            ->first();

        return $income;
    }

    /**
     * Update the income amount data via income amount id.
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function updateIncomeAmountById(array $data, int $id): void
    {
        $this->incomeAmount->where('id', $id)
            ->update([
                'amount' => $data['amount'],
                'income_date' => $data['income_date'],
            ]);
    }

    /**
     * Delete the income amount by id.
     *
     * @param int $id
     * @return void
     */
    public function deleteIncome(int $id): void
    {
        $incomeAmount = $this->incomeAmount->findOrFail($id);
        $incomeAmount->delete();
    }
}
