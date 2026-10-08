@extends('layouts.app')

@section('content')
<div class="card-form" style="max-width: 600px;">
    <h2 style="margin-bottom: 1.5rem; color: var(--hunter-green);">EDITAR NOTA</h2>

    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="type">Tipo de Nota:</label>
            <select name="type" id="type" class="form-control" required>
                <option value="texto" {{ $note->type == 'texto' ? 'selected' : '' }}>Texto (Cuadrado)</option>
                <option value="sueño" {{ $note->type == 'sueño' ? 'selected' : '' }}>Sueño (Nube)</option>
                <option value="idea" {{ $note->type == 'idea' ? 'selected' : '' }}>Idea (Óvalo)</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="content">Contenido:</label>
            <textarea class="form-control" name="content" id="content" rows="6" required>{{ $note->content }}</textarea>
        </div>

        <button type="submit" class="btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection