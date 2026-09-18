<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SMK Negeri 1 Cijati')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        /* =========================
            RESET
        ========================= */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        /* =========================
            NAVBAR
        ========================= */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 5%;
            background: #ffffffd3;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        /* =========================
            BRAND
        ========================= */
        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            z-index: 1001;
        }

        .brand img.logo {
            width: 66px;
            height: 66px;
            object-fit: contain;
            border-radius: 50%;
            background: #ffffff;
            padding: 5px;
            border: 2px solid #e6f8fa;
            box-shadow: 0 4px 12px rgba(11, 37, 69, 0.14);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex-shrink: 0;
        }

        .brand:hover img.logo {
            transform: scale(1.08) rotate(-4deg);
            box-shadow: 0 6px 18px rgba(11, 37, 69, 0.22);
        }

        .brand h1 {
            font-size: 1.2rem;
            font-weight: 800;
            color: #0B2545;
            line-height: 1.25;
            letter-spacing: 0.2px;
        }

        .brand p {
            font-size: 0.8rem;
            color: #00A8B5;
            font-weight: 600;
        }

        /* =========================
            NAVIGATION
        ========================= */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
            z-index: 1001;
        }

        .nav-item {
            position: relative;
        }

        .nav-item > a {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            color: #334155;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .nav-item > a:hover,
        .nav-item > a.active {
            color: #0284c7;
            background: #f0f9ff;
        }

        /* =========================
            CHEVRON
        ========================= */
        .chevron {
            font-size: 0.7rem;
            transition: transform 0.2s ease;
        }

        .nav-item:hover .chevron {
            transform: rotate(180deg);
        }

        /* =========================
            DROPDOWN
        ========================= */
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            min-width: 200px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            padding: 8px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease;
            z-index: 1002;
            list-style: none;
        }

        .nav-item:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 14px;
            color: #334155;
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            border-radius: 8px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .dropdown-menu a:hover {
            background: #f1f5f9;
            color: #0284c7;
        }

        /* =========================
            TOMBOL LOGIN (SIDIK JARI)
        ========================= */
        .btn-masuk {
            background: #edf1f4 !important;
            color: #06153d !important;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-decoration: none !important;
            font-size: 0.9rem;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            cursor: pointer !important;
            position: relative !important;
            z-index: 9999 !important; 
            border: 1px solid #cfe2ff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease;
            margin-left: 20px;
            flex-shrink: 0;
            pointer-events: auto !important;
        }

        .btn-masuk:hover {
            background: #1d4ed8 !important;
            color: #ffffff !important;
            transform: scale(1.08);
            border-color: #1d4ed8;
        }

        .btn-masuk:active {
            transform: scale(0.95);
        }

        /* =========================
            FOOTER
        ========================= */
        .site-footer {
            background: #ffffff;
            color: #334155;
            padding: 60px 5% 20px;
            margin-top: 60px;
            font-size: 0.9rem;
            border-top: 1px solid #e2e8f0;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.02);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: start;
        }

        .footer-left .footer-brand-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .footer-left .footer-brand-row img {
            width: 52px;
            height: 52px;
            object-fit: contain;
            border-radius: 50%;
            background: #ffffff;
            padding: 4px;
            border: 2px solid #e6f8fa;
            box-shadow: 0 3px 8px rgba(11, 37, 69, 0.10);
        }

        .footer-left .footer-brand-row h3 {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0B2545;
        }

        .footer-contact-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 25px;
        }

        .footer-contact-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #475569;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .footer-contact-list span.icon {
            font-size: 1rem;
            flex-shrink: 0;
        }

        /* =========================
            SOCIAL MEDIA
        ========================= */
        .footer-socials {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .social-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: #f1f5f9;
            color: #334155;
            border-radius: 50%;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .social-circle:hover {
            background: #0284c7;
            color: #ffffff;
            border-color: #0284c7;
            transform: translateY(-3px);
        }

        /* =========================
            MAP
        ========================= */
        .footer-right h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0f172a;
            text-align: center;
            margin-bottom: 20px;
        }

        .footer-map-box {
            position: relative;
            width: 100%;
            height: 250px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .footer-map-box iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .map-btn-overlay {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #ffffff;
            color: #0284c7;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.78rem;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            border: 1px solid #e2e8f0;
            z-index: 2;
        }

        .map-btn-overlay:hover {
            background: #f0f9ff;
            color: #0284c7;
        }

        /* =========================
            FOOTER BOTTOM
        ========================= */
        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            text-align: center;
            font-size: 0.85rem;
            color: #64748b;
        }

        /* =========================
            RESPONSIVE
        ========================= */
        @media (max-width: 900px) {
            .navbar {
                flex-wrap: wrap;
                gap: 10px;
            }

            .nav-links {
                order: 3;
                flex-wrap: wrap;
                justify-content: center;
                width: 100%;
            }

            .btn-masuk {
                margin-left: auto;
                order: 2;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 12px 20px;
            }

            .brand h1 {
                font-size: 0.95rem;
            }

            .brand p {
                font-size: 0.65rem;
            }

            .brand img.logo {
                width: 46px;
                height: 46px;
            }

            .nav-links {
                gap: 4px;
            }

            .nav-item > a {
                font-size: 0.78rem;
                padding: 7px 8px;
            }
        }
    </style>

    @yield('styles')

</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->
    <header class="navbar">

        <!-- LOGO -->
        <a href="{{ route('beranda') }}" class="brand">
            <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo SMKN 1 Cijati" class="logo">
            <div>
                <h1>SMK NEGERI 1 CIJATI</h1>
                <p>Sekolah Unggul, Berkarakter, Berprestasi</p>
            </div>
        </a>

        <!-- NAVIGASI -->
        <ul class="nav-links">
            <li class="nav-item">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
                    BERANDA
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil*') ? 'active' : '' }}">
                    PROFIL SEKOLAH
                    <span class="chevron">▾</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profil.sejarah') }}">Sejarah</a></li>
                    <li><a href="{{ route('profil.visi-misi') }}">Visi &amp; Misi</a></li>
                    <li><a href="{{ route('profil.pegawai') }}">Pegawai</a></li>
                    <li><a href="{{ route('profil.fasilitas') }}">Fasilitas</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('jurusan') }}" class="{{ request()->routeIs('jurusan*') ? 'active' : '' }}">
                    KONSENTRASI KEAHLIAN
                    <span class="chevron">▾</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('jurusan.detail', 'aphp') }}">APHP</a></li>
                    <li><a href="{{ route('jurusan.detail', 'bd') }}">BD</a></li>
                    <li><a href="{{ route('jurusan.detail', 'rpl') }}">RPL</a></li>
                    <li><a href="{{ route('jurusan.detail', 'tkr') }}">TKR</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('ekskul.index') }}" class="{{ request()->routeIs('ekskul*') ? 'active' : '' }}">
                    EKSTRAKURIKULER
                </a>
            </li>

            <li class="nav-item">
                <a href="javascript:void(0);" class="{{ request()->routeIs('berita', 'agenda', 'galeri') ? 'active' : '' }}">
                    INFORMASI
                    <span class="chevron">▾</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('berita') }}">Berita</a></li>
                    <li><a href="{{ route('agenda') }}">Agenda</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">
                    KONTAK
                </a>
            </li>
        </ul>


    </header>

    <!-- =========================
         CONTENT
    ========================= -->
    <main>
        @yield('content')
    </main>

    <!-- =========================
         FOOTER
    ========================= -->
    <footer class="site-footer">

        <div class="footer-container">

            <div class="footer-left">

                <div class="footer-brand-row">
                    <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo SMKN 1 Cijati">
                    <h3>SMKN 1 Cijati</h3>
                </div>

                <ul class="footer-contact-list">
                    <li>
                        <span class="icon">📍</span>
                        <span>
                            Jl. Raya Cijati, RT.6/RW.2, Cijati,
                            Kec. Cijati, Kabupaten Cianjur,
                            Jawa Barat 43284, Indonesia
                        </span>
                    </li>

                    <li>
                        <span class="icon">📞</span>
                        <span>
                            0857-9722-7508
                        </span>
                    </li>

                    <li>
                        <span class="icon">✉️</span>
                        <span>
                            info@smkn1cijati.sch.id
                        </span>
                    </li>
                </ul>

                <!-- SOCIAL -->
                <div class="footer-socials">
                    <a href="https://smkn1cijati.sch.id" target="_blank" rel="noopener noreferrer" class="social-circle">🌐</a>
                    <a href="https://instagram.com/smkn1cijati" target="_blank" rel="noopener noreferrer" class="social-circle">IG</a>
                    <a href="https://facebook.com/smkn1cijati" target="_blank" rel="noopener noreferrer" class="social-circle">FB</a>
                    <a href="https://youtube.com/@smkn1cijati" target="_blank" rel="noopener noreferrer" class="social-circle">YT</a>
                    <a href="https://tiktok.com/@smkn1cijati" target="_blank" rel="noopener noreferrer" class="social-circle">TT</a>
                </div>

            </div>

            <!-- MAP -->
            <div class="footer-right">

                <h4>Lokasi Sekolah Smk Negri 1 Cijati</h4>

                <div class="footer-map-box">

                    <a href="https://www.google.com/maps/search/?api=1&query=SMK+Negeri+1+Cijati+Cianjur"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="map-btn-overlay">
                        Open in Maps ↗
                    </a>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.559986!2d106.7732545!3d-7.2457565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTQnNDQuNyJTIDEwNsKwNDYnMjMuNyJF!5e0!3m2!1sid!2sid!4v1234567890"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>

            </div>

        </div>

        <!-- COPYRIGHT -->
        <div class="footer-bottom">
            &copy; Copyright <strong>SMKN 1 Cijati</strong> All Rights Reserved
            
<a href="{{ route('login') }}" class="btn-masuk">🔒</a>
        </div>

    </footer>

    @yield('scripts')

    <!-- SCRIPT UNTUK MEMASTIKAN TOMBOL LOGIN BERFUNGSI KE ROUTE LOGIN -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tombolLogin = document.getElementById("tombolLogin");
            if (tombolLogin) {
                tombolLogin.addEventListener("click", function(e) {
                    e.preventDefault();
                    window.location.href = "{{ route('login') }}";
                });
            }
        });
    </script>
</body>
</html>