@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Transaksi</h2>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Tambah Transaksi</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>COA</th>
            <th>Deskripsi</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->date->format('d/m/Y') }}</td>
            <td>{{ $transaction->coa->code }} - {{ $transaction->coa->name }}</td>
            <td>{{ $transaction->description }}</td>
            <td class="text-danger">{{ $transaction->debit > 0 ? number_format($transaction->debit) : '-' }}</td>
            <td class="text-success">{{ $transaction->credit > 0 ? number_format($transaction->credit) : '-' }}</td>
            <td>
                <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection