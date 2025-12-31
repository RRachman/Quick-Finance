@extends('layouts.app')

@section('content')
<h2>{{ isset($category->id) ? 'Edit' : 'Tambah' }} Kategori COA</h2>

<form action="{{ isset($category->id) ? route('coa-categories.update', $category) : route('coa-categories.store') }}" method="POST">
    @csrf
    @if(isset($category->id))
        @method('PUT')
    @endif
    
    <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" id="name" name="name" 
               value="{{ old('name', $category->name ?? '') }}" required>
    </div>
    
    <button type="submit" class="btn btn-success">
        {{ isset($category->id) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('coa-categories.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection

