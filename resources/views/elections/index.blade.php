@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="text-center">
        <h2 class="text-3xl font-semibold mb-4">Gestion des Élections</h2>
        <a href="{{ route('elections.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">Créer une Nouvelle
            Élection</a>
    </div>

    <h3 class="text-center text-2xl font-semibold mb-4">Élections en cours</h3>

    @if($elections->isEmpty())
    <p class="text-center">Aucune élection en cours pour le moment.</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach($elections as $election)
        <div class="bg-white shadow-md rounded-lg">
            <div class="p-4">
                <h5 class="text-xl font-semibold mb-2">{{ $election->name_election }}</h5>
                <p class="text-gray-700 mb-4">{{ $election->description }}</p>
                <p class="text-gray-700"><strong>Nombre d'électeurs :</strong> {{ $election->number_voters }}</p>
                <p class="text-gray-700"><strong>Nombre de votes :</strong> {{ $election->number_votes }}</p>
                <p class="text-gray-700"><strong>Nombre de votes :</strong> {{ $election->created_at }}</p>
            </div>
            <div class="bg-gray-100 px-4 py-2 flex justify-end">
                <a href="{{ route('elections.show', $election->id_election) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-lg mr-2">Voir Détails</a>
                <a href="{{ route('elections.edit', $election->id_election) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-1 px-3 rounded-lg mr-2">Modifier</a>
                <form action="{{ route('elections.destroy', $election->id_election) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gray-300 hover:bg-red-500 text-gray-700 text-black py-1 px-3 rounded-lg">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection