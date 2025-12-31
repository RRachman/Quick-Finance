<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quick Finance Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --primary: #0f6b42;
        --bg: #f5f7f8;
        --card-bg: #ffffff;
        --text-dark: #1e1f22;
        --radius: 22px;
    }

    body {
        background: var(--bg);
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
    }

    /* Layout */
    .app-wrapper {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
        width: 260px;
        background: var(--card-bg);
        padding: 32px 20px;
        border-right: 1px solid #e8e9eb;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .nav-link {
        padding: 14px 18px;
        border-radius: var(--radius);
        font-weight: 600;
        font-size: 14px;
        color: #4e4e53;
        transition: 0.2s;
    }

    .nav-link:hover,
    .nav-link.active {
        background: var(--primary);
        color: #ffffff;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        padding: 30px 35px;
    }

    /* Top Navbar */
    .top-nav {
        background: var(--card-bg);
        padding: 14px 24px;
        border-radius: var(--radius);
        margin-bottom: 22px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    }

    /* Card Modern */
    .modern-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        padding: 22px 24px;
        box-shadow: 0 6px 14px rgba(0,0,0,0.05);
        transition: .25s ease;
    }
    .modern-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
    }

    .card-title {
        font-size: 18px;
        font-weight: 700;
    }

    .card-number {
        font-size: 34px;
        font-weight: 800;
        color: var(--primary);
    }

    /* Button */
    .btn-modern {
        background: var(--primary);
        border-radius: var(--radius);
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 12px 22px;
        transition: 0.2s;
    }
    .btn-modern:hover {
        background: #0d5b38;
    }

    /* Table */
    .table-modern thead {
        background: var(--primary);
        color: #fff;
    }
    .table-modern tbody tr:hover {
        background: #ebf7f1;
    }

</style>
</head>

<body>
<div class="app-wrapper">

    <!-- SIDEBAR -->
    <nav class="sidebar">
        <h4 class="fw-bold mb-3">Quick Finance</h4>

        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="/">
            Dashboard
        </a>
        <a class="nav-link" href="{{ route('coa-categories.index') }}">Kategori COA</a>
        <a class="nav-link" href="{{ route('coas.index') }}">Daftar COA</a>
        <a class="nav-link" href="{{ route('transactions.index') }}">Transaksi</a>
        <a class="nav-link" href="{{ route('reports.profit-loss') }}">Laporan</a>
    </nav>

    <!-- MAIN -->
    <main class="main-content">



        @if(session('success'))
        <div class="alert alert-success modern-card">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
