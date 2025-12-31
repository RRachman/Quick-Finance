<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Coa;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('coa.category')->orderBy('date', 'desc')->get();
        return view('transactions.transactionsIndex', compact('transactions'));
    }

    public function create()
    {
        $transaction = new Transaction(); // Empty object untuk create
        $transaction->date = now(); // Default date today
        $coas = Coa::all();
        return view('transactions.transactionsForm', compact('transaction', 'coas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'coa_id' => 'required|exists:coas,id',
            'description' => 'required|string',
            'debit' => 'required_without:credit|numeric|min:0',
            'credit' => 'required_without:debit|numeric|min:0'
        ]);

        Transaction::create($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.transactionsShow', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $coas = Coa::all();
        return view('transactions.transactionsForm', compact('transaction', 'coas'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'date' => 'required|date',
            'coa_id' => 'required|exists:coas,id',
            'description' => 'required|string',
            'debit' => 'required_without:credit|numeric|min:0',
            'credit' => 'required_without:debit|numeric|min:0'
        ]);

        $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}