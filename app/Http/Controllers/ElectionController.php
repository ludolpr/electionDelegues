<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::all();
        return view('elections.index', compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('elections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_election' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'number_voters' => 'required|integer',
            'number_votes' => 'required|integer',
        ]);

        $election = new Election();
        $election->name_election = $request->name_election;
        $election->description = $request->description;
        $election->number_voters = $request->number_voters;
        $election->number_votes = $request->number_votes;
        $election->save();

        return redirect()->route('elections.index')->with('success', 'Élection créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Election $election)
    {
        return view('elections.show', compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
    {
        return view('elections.edit', compact('election'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
    {
        $request->validate([
            'name_election' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'number_voters' => 'required|integer',
            'number_votes' => 'required|integer',
        ]);

        $election->name_election = $request->name_election;
        $election->description = $request->description;
        $election->number_voters = $request->number_voters;
        $election->number_votes = $request->number_votes;
        $election->save();

        return redirect()->route('elections.index')->with('success', 'Élection mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
    {
        $election->delete();

        return redirect()->route('elections.index')->with('success', 'Élection supprimée avec succès.');
    }
}