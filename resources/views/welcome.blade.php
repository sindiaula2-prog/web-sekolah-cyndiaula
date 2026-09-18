<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                /* ... Kode bawaan Tailwind kamu ... */
            </style>
        @endif

        {{-- CSS Tambahan Khusus Logo Jurusan & Card --}}
        <style>
            :root {
                --navy: #0B2545;
                --blue: #1E5CA8;
                --paper: #F5F8FC;
                --ink-soft: #4C5B70;
                --line: #DCE6F2;
            }

            .jurusan-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 20px;
            }

            .jurusan-card {
                background: #fff;
                border: 1px solid var(--line);
                border-radius: 16px;
                padding: 24px 20px;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .jurusan-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 24px rgba(11, 37, 69, 0.08);
            }

            /* FIX KELUARAN LOGO JURUSAN */
            .jurusan-logo {
                width: 90px !important;
                height: 90px !important;
                min-width: 90px;
                min-height: 90px;
                margin: 0 auto 16px !important;
                border-radius: 50% !important;
                background: #ffffff !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                overflow: hidden !important;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
                border: 2px solid var(--line) !important;
                padding: 6px !important;
            }

            .jurusan-logo img {
                width: 100% !important;
                height: 100% !important;
                object-fit: contain !important;
                border-radius: 50% !important;
                display: block !important;
            }

            .logo-empty {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                background: var(--paper);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.75rem;
                font-weight: 700;
                color: var(--blue);
            }

            .jurusan-kode {
                display: inline-block;
                background: var(--blue);
                color: #fff;
                font-size: 0.75rem;
                font-weight: 700;
                padding: 4px 12px;
                border-radius: 20px;
                margin-bottom: 12px;
            }
        </style>
    </head>
    <body class="antialiased">
        @yield('content')
    </body>
</html>