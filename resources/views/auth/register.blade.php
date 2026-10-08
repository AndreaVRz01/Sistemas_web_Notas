@extends('layouts.app')

@section('content')
<div class="card-form">
    <h2 style="text-align: center; margin-bottom: 1.5rem; color: var(--hunter-green);">CREAR CUENTA</h2>

    @if ($errors->any())
        <div style="color: var(--reddish-brown); margin-bottom: 1rem; font-size: 0.9rem;">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">Nombre Completo</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Correo Electrónico</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Contraseña</label>
            <input class="form-control" type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn-primary" style="margin-top: 1rem;">Registrarse</button>
    </form>

    <p style="text-align: center; margin-top: 1.5rem; font-size: 0.9rem;">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}" style="color: var(--spicy-paprika); font-weight: bold;">Inicia sesión</a>
    </p>
</div>
@endsection