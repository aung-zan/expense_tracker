<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * create and return the default expense categories data.
     *
     * @return array
     */
    private function createData(): array
    {
        $data = [];
        $categories = config('constants.default_expense_categories', []);

        foreach ($categories as $category) {
            $categoryArr = [
                'user_id' => 1,
                'name' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            array_push($data, $categoryArr);
        }

        return $data;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->createData();

        DB::table('expense_categories')->insert($data);
    }
}
