<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        $elections = Election::with('classroom')->get();
        return view('votes.index', compact('elections'));
    }

    public function create(Election $election)
    {
        $candidates = $election->candidates;
        return view('votes.create', compact('election', 'candidates'));
    }

    public function store(Request $request, Election $election)
    {
        $request->validate(['delegate_id' => 'required|exists:candidates,id_candidate',
            'suppleant_id' => 'required|exists:candidates,id_candidate',
        ]);

        // Enregistrer les votes pour le délégué et le suppléant
        Vote::create([
            'id_user' => Auth::id(),
            'id_election' => $election->id_election,
            'id_candidate' => $request->delegate_id
        ]);

        Vote::create([
            'id_user' => Auth::id(),
            'id_election' => $election->id_election,
            'id_candidate' => $request->suppleant_id
        ]);

        $election->increment('number_votes', 2);

        return redirect()->route('elections.show', $election)->with('success', 'Vote enregistré avec succès.');
    }

    public function show(Election $election)
    {
        $election->load('candidates.user', 'classroom', 'votes');
        return view('elections.show', compact('election'));
    }
}