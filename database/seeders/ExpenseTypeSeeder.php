<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * create and return the default expense categories data.
     *
     * @return array
     */
    private function createData(): array
    {
        $data = [];
        $expenseTypes = config('constants.default_expense_types', []);

        foreach ($expenseTypes as $expenseType) {
            $expenseTypeArr = [
                'user_id' => 1,
                'name' => $expenseType,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            array_push($data, $expenseTypeArr);
        }

        return $data;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->createData();

        DB::table('expense_types')->insert($data);
    }
}
