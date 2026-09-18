<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - SMKN 1 Cijati</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #0B2545;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 1050;
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h2 {
            font-size: 1.05rem;
            font-weight: 800;
            margin: 0;
        }

        .sidebar-header p {
            font-size: 0.75rem;
            color: #94a3b8;
            margin: 2px 0 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 16px 0;
            margin: 0;
            flex: 1;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            border-left: 3px solid transparent;
            transition: all 0.15s ease;
        }

        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background: rgba(255,255,255,0.08);
            color: #fff;
            border-left-color: #38bdf8;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-footer a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .main-area {
            margin-left: 240px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 1;
        }

        .topbar {
            background: #fff;
            padding: 14px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar h4 {
            margin: 0;
            font-weight: 700;
            color: #0B2545;
        }

        .content-wrapper {
            flex: 1;
            padding: 24px 30px;
        }

        .admin-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .welcome-banner {
            background: linear-gradient(135deg, #0B2545 0%, #1e3a63 100%);
            color: #fff;
            border-radius: 14px;
            padding: 28px 30px;
            box-shadow: 0 6px 18px rgba(11, 37, 69, 0.18);
        }

        .dashboard-card {
            display: block;
            background: #fff;
            border-radius: 14px;
            padding: 26px;
            height: 100%;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border: 1px solid #eef2f6;
            transition: all 0.2s ease;
            position: relative;
            z-index: 2;
        }

        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(11, 37, 69, 0.12);
            border-color: #cbd5e1;
        }

        .icon-circle {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .card-link {
            display: inline-block;
            color: #0284c7;
            font-weight: 700;
            font-size: 0.88rem;
            text-decoration: none;
        }

        .dashboard-card:hover .card-link {
            text-decoration: underline;
        }

        .table-responsive-fix {
            overflow-x: auto;
            width: 100%;
        }

        .admin-card table {
            width: 100%;
        }

        .admin-card table img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            display: block;
        }

        .admin-card table td,
        .admin-card table th {
            vertical-align: middle;
            padding: 12px 16px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main-area {
                margin-left: 200px;
            }
        }
    </style>

    @yield('styles')
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>SMKN 1 CIJATI</h2>
            <p>Panel Administrator</p>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    🏠 Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.profil.index') }}" class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                    📋 Profil Sekolah
                </a>
            </li>
            <li>
                <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    📰 Berita
                </a>
            </li>
            <li>
                <a href="{{ route('admin.agenda.index') }}" class="{{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
                    📅 Agenda
                </a>
            </li>
            <li>
                <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                    🖼️ Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                    👨‍🏫 Guru & Pegawai
                </a>
            </li>
            <li>
                <a href="{{ route('admin.jurusan.index') }}" class="{{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">
                    🎓 Konsentrasi Keahlian
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ekskul.index') }}" class="{{ request()->routeIs('admin.ekskul.*') ? 'active' : '' }}">
                    ⚽ Ekstrakurikuler
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kontak.index') }}" class="{{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
                    ✉️ Kontak
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link p-0" style="color:#cbd5e1; font-weight:600; font-size:0.85rem;">
                    🚪 Keluar
                </button>
            </form>
        </div>
    </aside>

    <div class="main-area">
        <div class="topbar">
            <h4>@yield('page-title', 'Dashboard')</h4>
            <div>
                <span class="text-muted small">{{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </div>

        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>