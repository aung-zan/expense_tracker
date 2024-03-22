<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IncomeRepository;
use App\Http\Requests\IncomeTypeRequest;

class IncomeTypeController extends Controller
{
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeTypeRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        this->incomeRepository->createNewIncomeType($data);

        return response()->json(['message' => 'successfully created.'], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeTypeRequest $request, int $id)
    {
        $userId = auth()->user()->id;
        $data = $request->validated();

        $this->incomeRepository->updateIncomeType($data, $id, $userId);

        return response()->json(['message' => 'successfully updated.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $userId = auth()->user()->id;

        $this->incomeRepository->deleteIncomeType($id, $userId);

        return response()->json(['message' => 'successfully deleted.'], 200);
    }
}
