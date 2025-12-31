@extends('layouts.app')

@section('content')
<h2>{{ isset($coa->id) ? 'Edit' : 'Tambah' }} Chart of Account</h2>

<form action="{{ isset($coa->id) ? route('coas.update', $coa) : route('coas.store') }}" method="POST">
    @csrf
    @if(isset($coa->id))
        @method('PUT')
    @endif
    
    <div class="mb-3">
        <label for="code" class="form-label">Kode</label>
        <input type="text" class="form-control" id="code" name="code" 
               value="{{ old('code', $coa->code ?? '') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" 
               value="{{ old('name', $coa->name ?? '') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="coa_category_id" class="form-label">Kategori</label>
        <select class="form-control" id="coa_category_id" name="coa_category_id" required>
            <option value="">Pilih Kategori</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ (old('coa_category_id', $coa->coa_category_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-success">
        {{ isset($coa->id) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('coas.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const codeInput = document.getElementById('code');
    
    // Data COA yang sudah ada (dari controller)
    const existingCoas = @json($existingCoas ?? []);
    const currentCode = '{{ $coa->code ?? '' }}';

    form.addEventListener('submit', function(e) {
        const inputCode = codeInput.value.trim();
        
        // Skip validasi jika sedang edit dan kode tidak berubah
        if (currentCode && inputCode === currentCode) {
            return true;
        }
        
        // Cek jika kode sudah ada
        if (existingCoas.includes(inputCode)) {
            e.preventDefault(); // Hentikan submit
            alert('⚠️ Kode COA "' + inputCode + '" sudah digunakan!\nSilakan gunakan kode yang lain.');
            codeInput.focus();
            codeInput.select();
            return false;
        }
    });

    // Validasi real-time saat kehilangan fokus
    codeInput.addEventListener('blur', function() {
        const inputCode = this.value.trim();
        
        if (!inputCode) return; // Skip jika kosong
        
        // Skip jika kode sama dengan yang sedang diedit
        if (currentCode && inputCode === currentCode) {
            hideError();
            return;
        }
        
        // Cek duplikat
        if (existingCoas.includes(inputCode)) {
            showError('Kode COA sudah digunakan!');
        } else {
            hideError();
        }
    });

    // Hapus error saat user mulai mengetik lagi
    codeInput.addEventListener('input', function() {
        if (this.value.trim() !== currentCode) {
            hideError();
        }
    });

    function showError(message) {
        // Hapus error sebelumnya
        hideError();
        
        // Tambahkan style error
        codeInput.classList.add('is-invalid');
        
        // Buat element pesan error
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.style.display = 'block';
        errorDiv.id = 'code-error';
        errorDiv.textContent = message;
        
        codeInput.parentNode.appendChild(errorDiv);
    }

    function hideError() {
        codeInput.classList.remove('is-invalid');
        const errorDiv = document.getElementById('code-error');
        if (errorDiv) {
            errorDiv.remove();
        }
    }
});
</script>
