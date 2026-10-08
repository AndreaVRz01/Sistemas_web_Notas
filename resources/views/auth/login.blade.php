@extends('layouts.app')

@section('content')
<div class="card-form">
    <h2 style="text-align: center; margin-bottom: 1.5rem; color: var(--hunter-green);">INICIAR SESIÓN</h2>

    @if ($errors->any())
        <div style="color: var(--reddish-brown); margin-bottom: 1rem; font-size: 0.9rem;">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="email">Correo Electrónico</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Contraseña</label>
            <input class="form-control" type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn-primary" style="margin-top: 1rem;">Entrar</button>
    </form>

    <p style="text-align: center; margin-top: 1.5rem; font-size: 0.9rem;">
        ¿No tienes cuenta? <a href="{{ route('register') }}" style="color: var(--spicy-paprika); font-weight: bold;">Crear cuenta</a>
    </p>
</div>
@endsection