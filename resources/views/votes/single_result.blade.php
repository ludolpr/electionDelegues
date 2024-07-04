@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="text-center">
        <h2 class="text-3xl font-semibold mb-4">Résultats des Votes pour l'Élection : {{ $election->name_election }}
        </h2>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-5">
        <h3 class="text-2xl font-semibold mb-4">Résultats :</h3>
        <ul class="list-disc list-inside">
            @foreach($election->candidates as $candidate)
            <li>
                {{ $candidate->user->firstname }} {{ $candidate->user->lastname }} -
                {{ $voteCounts[$candidate->id_candidate] ?? 0 }} votes
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection