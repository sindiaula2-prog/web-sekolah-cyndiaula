@extends('layouts.app')

@section('title', 'Login Administrator - SMK Negeri 1 Cijati')

@section('content')
<div class="login-wrapper">
    <!-- Overlay gelap di atas background blur -->
    <div class="login-overlay"></div>

    <div class="login-card">
        <!-- Logo Sekolah -->
        <div class="login-logo-container">
            <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo SMKN 1 Cijati" class="login-logo">
        </div>

        <div class="login-header">
            <h2>SMK NEGERI 1 CIJATI</h2>
            <p>Portal Administrator Website</p>
        </div>

        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@gmail.com" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="********" class="form-control">
            </div>

            <button type="submit" class="btn-login">
                MASUK KE DASHBOARD
            </button>
        </form>

        <div class="login-footer">
            <a href="{{ url('/') }}">&larr; Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>

<style>
    .login-wrapper {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 40px 20px;
        box-sizing: border-box;
        overflow: hidden;

        /* Foto gerbang sekolah sebagai background */
        background-image: url('{{ asset('images/jurusan/fasilitas/gerbangsekolah.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    /* Efek blur diterapkan lewat pseudo-element supaya card tetap tajam */
    .login-wrapper::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: inherit;
        background-size: cover;
        background-position: center;
        filter: blur(6px);
        transform: scale(1.1); /* mencegah tepi blur yang kosong/pudar */
        z-index: 0;
    }

    /* Overlay gelap navy transparan di atas blur, di bawah card */
    .login-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(11, 37, 69, 0.75) 0%, rgba(18, 59, 114, 0.65) 100%);
        z-index: 1;
    }

    .login-card {
        position: relative;
        z-index: 2;
        background: rgba(255, 255, 255, 0.97);
        width: 100%;
        max-width: 420px;
        padding: 45px 35px;
        border-radius: 24px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
    }

    .login-logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-bottom: 18px;
    }

    .login-logo {
        width: 80px;
        height: 80px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
        filter: drop-shadow(0 4px 8px rgba(0,0,0,0.06));
    }

    .login-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .login-header h2 {
        font-size: 1.4rem;
        font-weight: 800;
        color: #0B2545;
        margin-bottom: 6px;
        letter-spacing: 0.5px;
    }

    .login-header p {
        font-size: 0.88rem;
        color: #64748b;
        font-weight: 500;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #f87171;
        padding: 12px 16px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-size: 0.85rem;
    }

    .alert-error ul {
        margin: 0;
        padding-left: 15px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        font-size: 0.95rem;
        border: 1.5px solid #cbd5e1;
        border-radius: 12px;
        outline: none;
        transition: all 0.3s ease;
        background: #f8fafc;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #1E5CA8;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(30, 92, 168, 0.1);
    }

    .btn-login {
        width: 100%;
        padding: 13px;
        background: linear-gradient(135deg, #123B72 0%, #1E5CA8 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 0.95rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(30, 92, 168, 0.25);
        margin-top: 10px;
        box-sizing: border-box;
    }

    .btn-login:hover {
        background: linear-gradient(135deg, #0B2545 0%, #123B72 100%);
        box-shadow: 0 6px 16px rgba(30, 92, 168, 0.35);
        transform: translateY(-1px);
    }

    .login-footer {
        text-align: center;
        margin-top: 25px;
    }

    .login-footer a {
        font-size: 0.85rem;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    .login-footer a:hover {
        color: #1E5CA8;
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .login-card {
            padding: 35px 25px;
        }
    }
</style>
@endsection