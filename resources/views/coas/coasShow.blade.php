@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail COA</h2>
    <a href="{{ route('coas.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $coa->code }} - {{ $coa->name }}</h5>
        <p class="card-text">
            <strong>Kategori:</strong> {{ $coa->category->name }}<br>
            <strong>Dibuat:</strong> {{ $coa->created_at->format('d/m/Y H:i') }}<br>
            <strong>Diupdate:</strong> {{ $coa->updated_at->format('d/m/Y H:i') }}
        </p>
        <div class="mt-3">
            <a href="{{ route('coas.edit', $coa) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('coas.destroy', $coa) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection