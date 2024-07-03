<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::with('classroom')->get();
        return view('elections.index', compact('elections'));
    }

    public function create()
    {
        $classes = Classroom::all();
        return view('elections.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_election' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'id_class' => 'required|exists:classrooms,id_class'
        ]);

        $election = Election::create([
            'name_election' => $request->name_election,
            'description' => $request->description,
            'id_class' => $request->id_class,
            'number_votes' => 0,
            'number_voters' => 0
        ]);

        return redirect()->route('elections.index')->with('success', 'Élection créée avec succès.');
    }

    public function show(Election $election)
    {
        $election->load('candidates.user', 'classroom', 'votes');
        return view('elections.show', compact('election'));
    }

    public function edit(Election $election)
    {
        $classes = Classroom::all();
        return view('elections.edit', compact('election', 'classes'));
    }

    public function update(Request $request, Election $election)
    {
        $request->validate([
            'name_election' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'id_class' => 'required|exists:classrooms,id_class'
        ]);

        $election->update($request->only('name_election', 'description', 'id_class'));

        return redirect()->route('elections.index')->with('success', 'Élection mise à jour avec succès.');
    }

    public function destroy(Election $election)
    {
        $election->delete();

        return redirect()->route('elections.index')->with('success', 'Élection supprimée avec succès.');
    }

    public function addCandidates(Election $election)
    {
        $students = User::where('id_class', $election->id_class)->where('id_role', 1)->get();
        return view('elections.add_candidates', compact('election', 'students'));
    }

    public function storeCandidates(Request $request, Election $election)
    {
        $request->validate([
            'candidates' => 'required|array',
            'candidates.*' => 'exists:users,id_user',
        ]);

        foreach ($request->candidates as $userId) {
            Candidate::create([
                'id_user' => $userId,
                'id_election' => $election->id_election
            ]);
        }

        $election->increment('number_voters', count($request->candidates));

        return redirect()->route('elections.show', $election)->with('success', 'Candidats ajoutés avec succès.');
    }

    public function showVoteForm(Election $election)
    {
        $candidates = $election->candidates;
        return view('elections.vote', compact('election', 'candidates'));
    }

    public function storeVote(Request $request, Election $election)
    {
        $request->validate([
            'delegate_id' => 'required|exists:candidates,id_candidate',
            'suppleant_id' => 'required|exists:candidates,id_candidate',
        ]);

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
}