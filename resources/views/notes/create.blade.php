@extends('layouts.app')

@section('content')
<div class="card-form" style="max-width: 600px;">
    <h2 style="margin-bottom: 1.5rem; color: var(--hunter-green);">ESCRIBE TU NOTA / IDEA / SUEÑO</h2>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="type">Selecciona el Tipo:</label>
            <select name="type" id="type" class="form-control" required>
                <option value="texto">Texto (Se verá en forma Cuadrada)</option>
                <option value="sueño">Sueño (Se verá dentro de una Nube)</option>
                <option value="idea">Idea (Se verá dentro de un Óvalo)</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="content">Contenido de la nota:</label>
            <textarea class="form-control" name="content" id="content" rows="6" placeholder="Escribe aquí tu pensamiento..." required></textarea>
        </div>

        <button type="submit" class="btn-primary">Publicar Nota (Duración 24h)</button>
    </form>
</div>
@endsection