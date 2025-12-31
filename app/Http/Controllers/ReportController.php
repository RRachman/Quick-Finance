<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function profitLoss(Request $request)
    {
        $year = $request->get('year', date('Y'));
        
        $reportData = Transaction::with('coa.category')
            ->selectRaw('
                coa_categories.name as category,
                MONTH(transactions.date) as month,
                SUM(transactions.credit) as total_credit,
                SUM(transactions.debit) as total_debit
            ')
            ->join('coas', 'transactions.coa_id', '=', 'coas.id')
            ->join('coa_categories', 'coas.coa_category_id', '=', 'coa_categories.id')
            ->whereYear('transactions.date', $year)
            ->groupBy('coa_categories.name', 'month')
            ->orderBy('coa_categories.name')
            ->orderBy('month')
            ->get();

        // Format data
        $formattedData = [];
        $months = range(1, 12);
        $categories = ['Salary', 'Other Income', 'Family Expense', 'Transport Expense', 'Meal Expense'];
        
        // Initialize dengan 0
        foreach ($categories as $category) {
            foreach ($months as $month) {
                $formattedData[$category][$month] = [
                    'income' => 0,
                    'expense' => 0
                ];
            }
        }

        // Fill dengan data aktual
        foreach ($reportData as $item) {
            if (isset($formattedData[$item->category][$item->month])) {
                $formattedData[$item->category][$item->month] = [
                    'income' => $item->total_credit,
                    'expense' => $item->total_debit
                ];
            }
        }

        // Hitung totals
        $totals = [
            'income' => array_fill(1, 12, 0),
            'expense' => array_fill(1, 12, 0),
            'net' => array_fill(1, 12, 0)
        ];

        foreach ($formattedData as $categoryData) {
            foreach ($categoryData as $month => $data) {
                $totals['income'][$month] += $data['income'];
                $totals['expense'][$month] += $data['expense'];
                $totals['net'][$month] = $totals['income'][$month] - $totals['expense'][$month];
            }
        }

        return view('reports.profitLoss', compact('formattedData', 'months', 'year', 'totals'));
    }

    public function exportExcel($year)
    {
        $filename = "laporan_transaksi_{$year}.xlsx";
        
        return Excel::download(new TransactionsExport($year), $filename);
    }
}