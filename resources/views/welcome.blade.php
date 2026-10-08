@extends('layouts.app')

@section('content')
<div style="text-align: center; max-width: 650px; margin: 4rem auto;">
    <h1 class="brand-title" style="font-size: 3rem; color: var(--spicy-paprika); margin-bottom: 1.5rem;">BIENVENIDO A NOTAS 24H</h1>
    
    <div class="card-form" style="max-width: 100%;">
        <p style="font-size: 1.2rem; line-height: 1.6; color: var(--text-main);">
            Un espacio donde puedes compartir tus pensamientos, ideas y sueños con tus amigos. 
            Todas las notas son efímeras y se destruyen automáticamente tras <strong>24 horas</strong>.
        </p>
    </div>

    <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 1rem;">
        <a href="{{ route('login') }}" class="btn-primary" style="width: auto; padding: 12px 30px; text-decoration: none;">
            Iniciar Sesión
        </a>
        <a href="{{ route('register') }}" class="btn-primary" style="width: auto; padding: 12px 30px; background-color: var(--muted-teal); color: var(--graphite); text-decoration: none;">
            Crear Cuenta
        </a>
    </div>
</div>
@endsection