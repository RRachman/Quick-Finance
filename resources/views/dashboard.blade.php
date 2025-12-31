@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-4">Dashboard Quick Finance</h2>

<div class="row g-4">

    <!-- CARD KATEGORI -->
    <div class="col-md-4">
        <div class="modern-card">
            <p class="card-title">Kategori COA</p>
            <h2 class="card-number">{{ App\Models\CoaCategory::count() }}</h2>
            <p class="mt-1 text-secondary" style="font-size: 14px;">Total Kategori</p>
            <a href="{{ route('coa-categories.index') }}" class="btn-modern mt-3 w-100">
                Kelola Kategori
            </a>
        </div>
    </div>

    <!-- CARD COA -->
    <div class="col-md-4">
        <div class="modern-card">
            <p class="card-title">Chart of Account</p>
            <h2 class="card-number">{{ App\Models\Coa::count() }}</h2>
            <p class="mt-1 text-secondary" style="font-size: 14px;">Total COA</p>
            <a href="{{ route('coas.index') }}" class="btn-modern mt-3 w-100">
                Kelola COA
            </a>
        </div>
    </div>

    <!-- CARD TRANSAKSI -->
    <div class="col-md-4">
        <div class="modern-card">
            <p class="card-title">Transaksi</p>
            <h2 class="card-number">{{ App\Models\Transaction::count() }}</h2>
            <p class="mt-1 text-secondary" style="font-size: 14px;">Total Transaksi</p>
            <a href="{{ route('transactions.index') }}" class="btn-modern mt-3 w-100">
                Kelola Transaksi
            </a>
        </div>
    </div>

</div>

<div class="modern-card mt-5 d-flex justify-content-between align-items-center">
    <div>
        <h5 class="mb-0 fw-bold">Laporan Profit & Loss</h5>
        <p class="text-secondary small mb-0">Lihat laporan keuangan perusahaan dengan cepat.</p>
    </div>
    <a href="{{ route('reports.profit-loss') }}" class="btn-modern" style="width: 200px;">
        Lihat Laporan
    </a>
</div>

@endsection
