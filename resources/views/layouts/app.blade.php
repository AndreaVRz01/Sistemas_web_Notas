<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Efímeras</title>
    
    <!-- Fuente Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Botón Flotante Permanente de Iniciar Sesión para no autenticados --}}
    @guest
        @if(!request()->routeIs('login'))
            <a href="{{ route('login') }}" class="btn-floating-login">
                <svg class="svg-icon" viewBox="0 0 24 24"><path d="M10 17l5-5-5-5v10zM19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/></svg>
                Iniciar Sesión
            </a>
        @endif
    @endguest

    <div class="app-layout">
        @auth
        <!-- Sidebar Lateral -->
        <aside class="sidebar">
            <h2 class="brand-title">NOTAS 24H</h2>
            <nav class="sidebar-nav">
                <a href="{{ route('notes.index') }}" class="nav-item {{ request()->routeIs('notes.index') ? 'active' : '' }}">
                    <svg class="svg-icon" viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z"/></svg>
                    Notas de Amigos
                </a>
                <a href="{{ route('notes.create') }}" class="nav-item {{ request()->routeIs('notes.create') ? 'active' : '' }}">
                    <svg class="svg-icon" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    Crear Nota
                </a>
            </nav>

            <button type="button" class="theme-toggle-btn" id="theme-toggle">
                <svg class="svg-icon" viewBox="0 0 24 24"><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9c0-.46-.04-.92-.1-1.36-.98 1.37-2.58 2.26-4.4 2.26-2.98 0-5.4-2.42-5.4-5.4 0-1.81.89-3.42 2.26-4.4-.44-.06-.9-.1-1.36-.1z"/></svg>
                Alternar Tema
            </button>

            <div style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 1rem;">
                <p style="font-size: 0.85rem; margin-bottom: 8px;">Conectado como:</p>
                <strong>{{ auth()->user()->name }}</strong>
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
                    @csrf
                    <button type="submit" class="btn-danger" style="width: 100%;">Cerrar Sesión</button>
                </form>
            </div>
        </aside>
        @endauth

        <main class="main-content">
            @yield('content')
        </main>
    </div>

</body>
</html>