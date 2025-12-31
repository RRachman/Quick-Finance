@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail Transaksi</h2>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Transaksi #{{ $transaction->id }}</h5>
        <p class="card-text">
            <strong>Tanggal:</strong> {{ $transaction->date->format('d/m/Y') }}<br>
            <strong>COA:</strong> {{ $transaction->coa->code }} - {{ $transaction->coa->name }}<br>
            <strong>Kategori:</strong> {{ $transaction->coa->category->name }}<br>
            <strong>Deskripsi:</strong> {{ $transaction->description }}<br>
            <strong>Debit:</strong> <span class="text-danger">{{ number_format($transaction->debit) }}</span><br>
            <strong>Credit:</strong> <span class="text-success">{{ number_format($transaction->credit) }}</span><br>
            <strong>Dibuat:</strong> {{ $transaction->created_at->format('d/m/Y H:i') }}<br>
            <strong>Diupdate:</strong> {{ $transaction->updated_at->format('d/m/Y H:i') }}
        </p>
        <div class="mt-3">
            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection