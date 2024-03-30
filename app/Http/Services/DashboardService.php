<?php

namespace App\Http\Services;

use App\Http\Repositories\ExpenseRepository;
use App\Http\Repositories\IncomeRepository;

class DashboardService
{
    private $incomeRepository;
    private $expenseRepository;

    public function __construct(IncomeRepository $incomeRepository, ExpenseRepository $expenseRepository)
    {
        $this->incomeRepository = $incomeRepository;
        $this->expenseRepository = $expenseRepository;
    }

    /**
     * Return the overview dashboard data.
     *
     * @param int $userId
     * @param string $date
     * @return array
     */
    public function overviewData(int $userId, string $date): array
    {
        $incomes = $this->incomeRepository->getAllIncome($userId, $date);
        $expenses = $this->expenseRepository->getExpenseAmountByExpenseType($userId, $date);

        $overviewData = [
            $incomes->sum('amount'),
            $expenses->sum('expense_amount')
        ];

        $incomeList = $incomes->map(function ($income) {
            return $income->only('name', 'amount');
        });

        $expenseList = $expenses->map(function ($expense) {
            return $expense->only('name', 'expense_amount');
        });

        return [
            'overview' => $overviewData,
            'incomeList' => $incomeList->toArray(),
            'expenseList' => $expenseList->toArray(),
        ];
    }
}
