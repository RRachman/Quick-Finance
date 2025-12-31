<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coa;

class CoaSeeder extends Seeder
{
    public function run()
    {
        $coas = [
            ['code' => '401', 'name' => 'Gaji Karyawan', 'coa_category_id' => 1],
            ['code' => '402', 'name' => 'Gaji Ketua MPR', 'coa_category_id' => 1],
            ['code' => '403', 'name' => 'Profit Trading', 'coa_category_id' => 2],
            ['code' => '601', 'name' => 'Biaya Sekolah', 'coa_category_id' => 3],
            ['code' => '602', 'name' => 'Bensin', 'coa_category_id' => 4],
            ['code' => '603', 'name' => 'Parkir', 'coa_category_id' => 4],
            ['code' => '604', 'name' => 'Makan Siang', 'coa_category_id' => 5],
            ['code' => '605', 'name' => 'Makanan Pokok Bulanan', 'coa_category_id' => 5],
        ];

        foreach ($coas as $coa) {
            Coa::create($coa);
        }
    }
}