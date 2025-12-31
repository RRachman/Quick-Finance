@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail Kategori</h2>
    <a href="{{ route('coa-categories.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $coaCategory->name }}</h5>
        <p class="card-text">
            <strong>Jumlah COA:</strong> {{ $coaCategory->coas->count() }}<br>
            <strong>Dibuat:</strong> {{ $coaCategory->created_at->format('d/m/Y H:i') }}<br>
            <strong>Diupdate:</strong> {{ $coaCategory->updated_at->format('d/m/Y H:i') }}
        </p>
        
        @if($coaCategory->coas->count() > 0)
        <h6>Daftar COA:</h6>
        <ul>
            @foreach($coaCategory->coas as $coa)
            <li>{{ $coa->code }} - {{ $coa->name }}</li>
            @endforeach
        </ul>
        @endif
        
        <div class="mt-3">
            <a href="{{ route('coa-categories.edit', $coaCategory) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('coa-categories.destroy', $coaCategory) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection