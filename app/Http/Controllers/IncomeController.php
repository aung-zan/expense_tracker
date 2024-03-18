<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IncomeRepository;
use App\Http\Requests\IncomeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        $date = $request->get('date') ?? Carbon::now()->format('Y-m');
        $incomeAmounts = $this->incomeRepository->getIncomeAmount($date);

        return view('income.list', [
            'incomeAmounts' => $incomeAmounts,
            'date' => $date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $incomes = $this->incomeRepository->getIncome();

        return view('income.create', [
            'incomes' => $incomes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeRequest $request)
    {
        $data = $request->validated();
        $this->incomeRepository->addNewAmount($data);

        return redirect()->route('incomeList');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $incomeAmount = $this->incomeRepository->getIncomeAmountById($id);

        return view('income.edit', [
            'incomeAmount' => $incomeAmount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeRequest $request, int $id)
    {
        $data = $request->validated();
        $this->incomeRepository->updateIncomeAmountById($data, $id);

        return redirect()->route('incomeList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->incomeRepository->deleteIncome($id);

        return redirect()->route('incomeList');
    }
}
