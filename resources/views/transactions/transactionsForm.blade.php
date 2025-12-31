@extends('layouts.app')

@section('content')
<h2>{{ isset($transaction->id) ? 'Edit' : 'Tambah' }} Transaksi</h2>

<form action="{{ isset($transaction->id) ? route('transactions.update', $transaction) : route('transactions.store') }}" method="POST">
    @csrf
    @if(isset($transaction->id))
        @method('PUT')
    @endif
    
    <div class="mb-3">
        <label for="date" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="date" name="date" 
               value="{{ old('date', isset($transaction->date) ? $transaction->date->format('Y-m-d') : date('Y-m-d')) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="coa_id" class="form-label">COA</label>
        <select class="form-control" id="coa_id" name="coa_id" required>
            <option value="">Pilih COA</option>
            @foreach($coas as $coa)
            <option value="{{ $coa->id }}" 
                {{ (old('coa_id', $transaction->coa_id ?? '') == $coa->id) ? 'selected' : '' }}>
                {{ $coa->code }} - {{ $coa->name }} ({{ $coa->category->name }})
            </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" required>{{ old('description', $transaction->description ?? '') }}</textarea>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="debit" class="form-label">Debit</label>
                <input type="number" class="form-control" id="debit" name="debit" 
                       value="{{ old('debit', $transaction->debit ?? 0) }}" min="0" step="0.01">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="credit" class="form-label">Credit</label>
                <input type="number" class="form-control" id="credit" name="credit" 
                       value="{{ old('credit', $transaction->credit ?? 0) }}" min="0" step="0.01">
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-success">
        {{ isset($transaction->id) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    const coaSelect = document.getElementById('coa_id');
    const debitInput = document.getElementById('debit');
    const creditInput = document.getElementById('credit');
    
    function toggleInputs() {
        const selectedOption = coaSelect.options[coaSelect.selectedIndex];
        const coaCode = selectedOption.textContent.split(' - ')[0]; // Ambil kode dari teks option
        
        // Reset semua input terlebih dahulu
        debitInput.disabled = false;
        creditInput.disabled = false;
        
        // Logika disable berdasarkan kode COA
        if (coaCode >= 400 && coaCode <= 499) {
            debitInput.disabled = true;
            debitInput.value = '0'; // Reset value jika di-disable
        } else if (coaCode >= 600 && coaCode <= 699) {
            creditInput.disabled = true;
            creditInput.value = '0'; // Reset value jika di-disable
        }
    }
    
    // Event listener untuk perubahan dropdown COA
    coaSelect.addEventListener('change', toggleInputs);
    
    // Jalankan sekali saat halaman dimuat untuk set status awal
    toggleInputs();
});
</script>