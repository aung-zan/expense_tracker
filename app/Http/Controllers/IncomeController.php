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
        $userId = auth()->user()->id;
        $date = $request->get('date') ?? Carbon::now()->format('Y-m');

        $incomeAmounts = $this->incomeRepository->getAllIncome($userId, $date);

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
        $userId = auth()->user()->id;

        $incomeTypes = $this->incomeRepository->getAllIncomeType($userId);

        return view('income.create', [
            'incomeTypes' => $incomeTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $this->incomeRepository->createNewIncome($data);

        return redirect()->route('incomeList');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $userId = auth()->user()->id;

        $incomeTypes = $this->incomeRepository->getAllIncomeType($userId);
        $income = $this->incomeRepository->getIncome($id, $userId);

        return view('income.edit', [
            'incomeTypes' => $incomeTypes,
            'income' => $income,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeRequest $request, int $id)
    {
        $userId = auth()->user()->id;
        $data = $request->validated();

        $this->incomeRepository->updateIncome($data, $id, $userId);

        return redirect()->route('incomeList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $userId = auth()->user()->id;

        $this->incomeRepository->deleteIncome($id, $userId);

        return redirect()->route('incomeList');
    }
}
