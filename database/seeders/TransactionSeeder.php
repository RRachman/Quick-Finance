<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $transactions = [
            [
                'date' => '2022-01-01',
                'coa_id' => 1, // Gaji Karyawan
                'description' => 'Gaji Di Perusahaan A',
                'debit' => 0,
                'credit' => 5000000
            ],
            [
                'date' => '2022-01-02', 
                'coa_id' => 2, // Gaji Ketua MPR
                'description' => 'Gaji Ketum',
                'debit' => 0,
                'credit' => 7000000
            ],
            [
                'date' => '2022-01-10',
                'coa_id' => 6, // Bensin
                'description' => 'Bensin Anak', 
                'debit' => 25000,
                'credit' => 0
            ],
            [
                'date' => '2022-02-01',
                'coa_id' => 1, // Gaji Karyawan
                'description' => 'Gaji Bulan Februari',
                'debit' => 0,
                'credit' => 5000000
            ],
            [
                'date' => '2022-02-15',
                'coa_id' => 3, // Profit Trading
                'description' => 'Profit Trading Saham',
                'debit' => 0, 
                'credit' => 3000000
            ],
            [
                'date' => '2022-02-20',
                'coa_id' => 4, // Biaya Sekolah
                'description' => 'SPP Sekolah',
                'debit' => 2000000,
                'credit' => 0
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}