@extends('layouts.app')

@section('content')
<div>
    <h1 style="margin-bottom: 1.5rem; color: var(--hunter-green);">NOTAS DE LOS AMIGOS</h1>

    <!-- Caja de Filtros -->
    <form method="GET" action="{{ route('notes.index') }}" class="filter-box">
        <div>
            <label class="form-label" for="friend_id">Filtrar por Amigo:</label>
            <select name="friend_id" id="friend_id" class="form-control" onchange="this.form.submit()">
                <option value="">Todos los amigos</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $selectedUser == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="form-label" for="type">Tipo de Nota:</label>
            <select name="type" id="type" class="form-control" onchange="this.form.submit()">
                <option value="">Todos los tipos</option>
                <option value="texto" {{ $selectedType == 'texto' ? 'selected' : '' }}>Texto (Cuadrado)</option>
                <option value="sueño" {{ $selectedType == 'sueño' ? 'selected' : '' }}>Sueño (Nube)</option>
                <option value="idea" {{ $selectedType == 'idea' ? 'selected' : '' }}>Idea (Óvalo)</option>
            </select>
        </div>

        @if($selectedUser || $selectedType)
            <div style="align-self: flex-end;">
                <a href="{{ route('notes.index') }}" class="btn-primary" style="padding: 10px 15px; text-decoration: none; background-color: var(--reddish-brown);">Limpiar Filtros</a>
            </div>
        @endif
    </form>

    <!-- Grid de Notas -->
    <div class="notes-grid">
        @forelse($notes as $note)
            <div class="note-card note-shape-{{ $note->type }}">
                <div>
                    <div class="note-header">
                        <span>{{ $note->user->name }}</span>
                        <span style="text-transform: uppercase; font-size: 0.75rem; background: rgba(0,0,0,0.15); padding: 2px 6px; border-radius: 4px;">{{ $note->type }}</span>
                    </div>
                    <div class="note-content">
                        {{ $note->content }}
                    </div>
                </div>

                <div class="note-footer">
                    <div>Publicado: {{ $note->created_at->format('d/m/Y H:i') }}</div>
                    <div>Expira: {{ $note->expires_at->format('d/m/Y H:i') }} (24h)</div>

                    <!-- Acciones solo para el dueño de la nota -->
                    @if($note->user_id === auth()->id())
                        <div class="note-actions">
                            <a href="{{ route('notes.edit', $note) }}" style="color: inherit; font-weight: bold; text-decoration: underline;">Editar</a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('¿Eliminar esta nota?')">Eliminar</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <p style="grid-column: 1/-1; text-align: center; color: var(--text-muted); font-size: 1.1rem; padding: 3rem;">
                No hay notas activas disponibles en este momento.
            </p>
        @endforelse
    </div>
</div>
@endsection