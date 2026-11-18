@extends('template.app')
@section('title', 'Connexion - Terramoi')

@section('content')
<style>
    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px 0 40px;
    }

    .login-card {
        background: #ffffff;
        width: 100%;
        max-width: 440px;
        padding: 40px 32px;
        border-radius: 16px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
        border: 1px solid #e5e7eb;
    }

    .login-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .login-title {
        font-size: 1.85rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
    }

    .login-subtitle {
        font-size: 0.95rem;
        color: #6b7280;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        font-size: 0.95rem;
        border: 1.5px solid #d1d5db;
        border-radius: 10px;
        background-color: #f9fafb;
        color: #111827;
        transition: all 0.2s ease-in-out;
    }

    .form-input:focus {
        outline: none;
        border-color: #2e7d32;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(46, 125, 50, 0.12);
    }

    .btn-submit {
        width: 100%;
        padding: 13px;
        margin-top: 10px;
        font-size: 1rem;
        font-weight: 600;
        color: #ffffff;
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
        border: none;
        border-radius: 10px;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(46, 125, 50, 0.25);
        transition: all 0.2s ease-in-out;
    }

    .btn-submit:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(46, 125, 50, 0.35);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .alert-error {
        background-color: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        padding: 14px 16px;
        border-radius: 10px;
        margin-bottom: 24px;
        font-size: 0.9rem;
    }

    .alert-error ul {
        margin-left: 18px;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <h1 class="login-title">Bon retour !</h1>
            <p class="login-subtitle">Connectez-vous à votre espace Terramoi</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="nom@exemple.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-submit">Se connecter</button>
        </form>
    </div>
</div>
@endsection
