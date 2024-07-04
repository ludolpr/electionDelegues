<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        if ($user->id_role != 1) {
            return redirect()->route('elections.index')->with('error', "Seuls les élèves peuvent s'inscrire en tant que candidats.");
        }

        $isCandidateOrVoter = Candidate::where('id_user', $user->id_user)->exists() || Vote::where('id_user', $user->id_user)->exists();

        $elections = Election::all();
        return view('candidates.create', compact('elections', 'isCandidateOrVoter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|in:candidate,voter',
            'id_user' => 'required|exists:users,id_user',
            'id_election' => 'required|exists:elections,id_election',
        ]);

        $election = Election::find($request->id_election);

        if ($request->role == 'candidate') {
            if ($election->candidates()->where('id_user', $request->id_user)->exists()) {
                return redirect()->route('elections.index')->with('error', 'Vous êtes déjà candidat pour cette élection.');
            }

            Candidate::create([
                'id_user' => $request->id_user,
                'id_election' => $request->id_election,
            ]);
        } elseif ($request->role == 'voter') {
            if ($election->votes()->where('id_user', $request->id_user)->exists()) {
                return redirect()->route('elections.index')->with('error', 'Vous êtes déjà électeur pour cette élection.');
            }

            Vote::create([
                'id_user' => $request->id_user,
                'id_election' => $request->id_election,
                'id_candidate' => null,
            ]);
        }

        $election->increment('number_voters');

        return redirect()->route('elections.index')->with('success', 'Vous vous êtes inscrit avec succès en tant que ' . ($request->role == 'candidate' ? 'candidat' : 'électeur') . '.');
    }
}