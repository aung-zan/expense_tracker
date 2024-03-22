<?php

namespace App\Http\Repositories\Traits;

use App\Models\IncomeType;
use Illuminate\Database\Eloquent\Collection;

trait IncomeTypeTrait
{
    /**
     * Get all income_type.
     *
     * @param int $userId
     * @return Collection
     */
    public function getAllIncomeType(int $userId): Collection
    {
        $incomeTypes = $this->incomeType->where('user_id', $userId)
            ->get();

        return $incomeTypes;
    }

    /**
     * Create a new income_type.
     *
     * @param array $data
     * @return IncomeType
     */
    public function createNewIncomeType(array $data): IncomeType
    {
        $incomeType = $this->incomeType->create($data);

        return $incomeType;
    }

    /**
     * Update an income_type by id.
     *
     * @param array $data
     * @param int $userId
     * @param int $id
     * @return IncomeType
     */
    public function updateIncomeType(array $data, int $id, int $userId): IncomeType
    {
        $incomeType = $this->incomeType->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $incomeType->name = $data['name'];
        $incomeType->save();

        return $incomeType;
    }

    /**
     * Delete an income_type by id.
     *
     * @param int $id
     * @param int $userId
     * @return void
     */
    public function deleteIncomeType(int $id, int $userId): void
    {
        $incomeType = $this->incomeType->where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $incomeType->delete();
    }
}
