@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Master Chart of Account</h2>
    <a href="{{ route('coas.create') }}" class="btn btn-primary">Tambah COA</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coas as $coa)
        <tr>
            <td>{{ $coa->code }}</td>
            <td>{{ $coa->name }}</td>
            <td>{{ $coa->category->name }}</td>
            <td>
                <a href="{{ route('coas.edit', $coa) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('coas.destroy', $coa) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection