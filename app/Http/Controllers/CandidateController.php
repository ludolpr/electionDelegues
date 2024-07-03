<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function create()
    {
        if (Auth::user()->id_role != 1) {
            return redirect()->route('elections.index')->with('error', 'Seuls les élèves peuvent s\'inscrire en tant que candidats.');
        }

        $elections = Election::all();
        return view('candidates.create', compact('elections'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_user' => 'required|exists:users,id_user',
            'id_election' => 'required|exists:elections,id_election',
        ]);

        $election = Election::find($request->id_election);

        // Vérifier si l'utilisateur est déjà candidat pour cette élection
        if ($election->candidates()->where('id_user', $request->id_user)->exists()) {
            return redirect()->route('elections.show', $election)->with('error', 'Vous êtes déjà candidat pour cette élection.');
        }

        // Créer le candidat
        Candidate::create([
            'id_user' => $request->id_user,
            'id_election' => $request->id_election,
        ]);

        // Incrémenter le nombre d'électeurs
        $election->increment('number_voters');

        return redirect()->route('elections.show', $election)->with('success', 'Vous vous êtes inscrit avec succès en tant que candidat.');
    }
}