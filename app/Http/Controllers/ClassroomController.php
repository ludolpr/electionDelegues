<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::withCount('users')->get();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_class' => 'required|string|max:255',
        ]);

        Classroom::create([
            'name_class' => $request->name_class,
        ]);

        return redirect()->route('classrooms.index')->with('success', 'Classe créée avec succès.');
    }

    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name_class' => 'required|string|max:255',
        ]);

        $classroom->update([
            'name_class' => $request->name_class,
        ]);

        return redirect()->route('classrooms.index')->with('success', 'Classe mise à jour avec succès.');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route('classrooms.index')->with('success', 'Classe supprimée avec succès.');
    }

    public function show(Classroom $classroom)
    {
        $classroom->load('users');
        return view('classrooms.show', compact('classroom'));
    }
}
