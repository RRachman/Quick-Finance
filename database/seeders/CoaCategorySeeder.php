<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CoaCategory;

class CoaCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Salary'],
            ['id' => 2, 'name' => 'Other Income'],
            ['id' => 3, 'name' => 'Family Expense'],
            ['id' => 4, 'name' => 'Transport Expense'],
            ['id' => 5, 'name' => 'Meal Expense'],
        ];

        foreach ($categories as $category) {
            CoaCategory::create($category);
        }
    }
}