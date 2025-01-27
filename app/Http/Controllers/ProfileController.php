<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name_class' => 'required|string|max:50',
        ]);

        Classroom::create($request->all());

        return redirect()->route('classrooms.index')->with('success', 'Classe créée avec succès.');
    }

    public function show(Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom): RedirectResponse
    {
        $request->validate([
            'name_class' => 'required|string|max:50',
        ]);

        $classroom->update($request->all());

        return redirect()->route('classrooms.index')->with('success', 'Classe mise à jour avec succès.');
    }

    public function destroy(Classroom $classroom): RedirectResponse
    {
        $classroom->delete();

        return redirect()->route('classrooms.index')->with('success', 'Classe supprimée avec succès.');
    }
}