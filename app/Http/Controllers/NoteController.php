<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $selectedUser = $request->get('friend_id');
        $selectedType = $request->get('type');

        $query = Note::with('user')->active()->latest();

        if ($selectedUser) {
            $query->where('user_id', $selectedUser);
        }

        if ($selectedType) {
            $query->where('type', $selectedType);
        }

        $notes = $query->get();

        return view('notes.index', compact('notes', 'users', 'selectedUser', 'selectedType'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:1000'],
            'type' => ['required', 'in:texto,sueño,idea'],
        ]);

        auth()->user()->notes()->create([
            'content' => $validated['content'],
            'type' => $validated['type'],
            'expires_at' => Carbon::now()->addHours(24),
        ]);

        return redirect()->route('notes.index')->with('success', 'Nota publicada correctamente.');
    }

    public function edit(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para editar esta nota.');
        }

        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para editar esta nota.');
        }

        $validated = $request->validate([
            'content' => ['required', 'string', 'max:1000'],
            'type' => ['required', 'in:texto,sueño,idea'],
        ]);

        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Nota actualizada correctamente.');
    }

    public function destroy(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para eliminar esta nota.');
        }

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Nota eliminada correctamente.');
    }
}