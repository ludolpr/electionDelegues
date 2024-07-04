@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="text-center">
        <h2 class="text-3xl font-semibold mb-4">Détails de l'Élection</h2>
        <a href="{{ route('elections.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">Retour à la
            liste</a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-2xl font-semibold mb-4">{{ $election->name_election }}</h3>
        <p class="text-gray-700 mb-4"><strong>Description :</strong> {{ $election->description }}</p>
        <p class="text-gray-700 mb-4"><strong>Classe :</strong> {{ $election->classroom->name_class }}</p>
        <p class="text-gray-700 mb-4"><strong>Nombre d'électeurs :</strong> {{ $election->number_voters }}</p>
        <p class="text-gray-700 mb-4"><strong>Nombre de votes :</strong> {{ $election->number_votes }}</p>
        <p class="text-gray-700 mb-4"><strong>Créée le :</strong> {{ $election->created_at }}</p>

        <div class="mt-4">
            <h4 class="text-xl font-semibold mb-2">Candidats</h4>
            @if($election->candidates->isEmpty())
            <p>Aucun candidat pour cette élection.</p>
            @else
            <ul class="list-disc list-inside">
                @foreach($election->candidates as $candidate)
                <li>{{ $candidate->user->firstname }} {{ $candidate->user->lastname }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="bg-gray-100 px-4 py-2 flex justify-end mt-6">
            <a href="{{ route('elections.edit', $election->id_election) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-1 px-3 rounded-lg mr-2">Modifier</a>
            <form action="{{ route('elections.destroy', $election->id_election) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-300 hover:bg-red-500 text-gray-700 py-1 px-3 rounded-lg">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection