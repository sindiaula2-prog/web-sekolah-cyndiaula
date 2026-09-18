<style>
    .profil-sidebar {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid var(--line);
        box-shadow: 0 6px 20px rgba(0,0,0,0.04);
        overflow: hidden;
        position: sticky;
        top: 100px;
    }
    .sidebar-header {
        background: var(--navy);
        color: white;
        padding: 18px 20px;
        font-size: 1.05rem;
        font-weight: 700;
    }
    .sidebar-menu { 
        list-style: none; 
        padding: 10px; 
        margin: 0; 
    }
    .sidebar-menu li { 
        margin-bottom: 4px; 
    }
    .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px 16px;
        color: var(--ink-soft);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.98rem;
        border-radius: 10px;
        transition: all 0.2s ease;
    }
    .sidebar-menu a:hover, 
    .sidebar-menu a.active {
        background: #eff6ff;
        color: var(--blue);
    }
</style>

<div class="profil-sidebar">
    <div class="sidebar-header">📑 Navigasi Profil</div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('profil.sejarah') }}" class="{{ request()->routeIs('profil.sejarah') ? 'active' : '' }}">
                🏛️ Sejarah Singkat
            </a>
        </li>
        <li>
            <a href="{{ route('profil.visi-misi') }}" class="{{ request()->routeIs('profil.visi-misi') ? 'active' : '' }}">
                🎯 Visi &amp; Misi
            </a>
        </li>
        <li>
            <a href="{{ route('profil.fasilitas') }}" class="{{ request()->routeIs('profil.fasilitas') ? 'active' : '' }}">
                🏫 Fasilitas Sekolah
            </a>
        </li>
        <li>
            <a href="{{ route('kontak') }}" style="border-top: 1px dashed var(--line); margin-top: 6px; padding-top: 14px;" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">
                📞 Kontak &amp; Lokasi
            </a>
        </li>
    </ul>
</div>