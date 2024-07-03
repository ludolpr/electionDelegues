<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::with('user', 'candidate', 'election')->get();
        return view('votes.index', compact('votes'));
    }

    public function create()
    {
        $elections = Election::all();
        $candidates = Candidate::all();
        return view('votes.create', compact('elections', 'candidates'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_election' => 'required|exists:elections,id_election',
            'id_candidate' => 'required|exists:candidates,id_candidate',
        ]);

        Vote::create([
            'id_user' => Auth::id(),
            'id_election' => $request->id_election,
            'id_candidate' => $request->id_candidate,
        ]);

        return redirect()->route('votes.index')->with('success', 'Vote enregistré avec succès.');
    }

    public function show(Vote $vote)
    {
        return view('votes.show', compact('vote'));
    }

    public function edit(Vote $vote)
    {
        $elections = Election::all();
        $candidates = Candidate::all();
        return view('votes.edit', compact('vote', 'elections', 'candidates'));
    }

    public function update(Request $request, Vote $vote): RedirectResponse
    {
        $request->validate([
            'id_election' => 'required|exists:elections,id_election',
            'id_candidate' => 'required|exists:candidates,id_candidate',
        ]);

        $vote->update([
            'id_election' => $request->id_election,
            'id_candidate' => $request->id_candidate,
        ]);

        return redirect()->route('votes.index')->with('success', 'Vote mis à jour avec succès.');
    }

    public function destroy(Vote $vote): RedirectResponse
    {
        $vote->delete();

        return redirect()->route('votes.index')->with('success', 'Vote supprimé avec succès.');
    }
}