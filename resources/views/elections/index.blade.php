@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="text-center mb-4">Gestion des Élections</h2>
            <a href="{{ route('elections.create') }}" class="btn bg-[#2EC7E6] text-white p-3 rounded-lg mb-4">Créer une
                Nouvelle Élection</a>

            <h3 class="text-center mb-4">Élections en cours</h3>
            @if($elections->isEmpty())
            <p>Aucune élection en cours pour le moment.</p>
            @else
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($elections as $election)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $election->name_election }}</h5>
                            <p class="card-text">{{ $election->description }}</p>
                            <p class="card-text"><strong>Nombre d'électeurs :</strong> {{ $election->number_voters }}
                            </p>
                            <p class="card-text"><strong>Nombre de votes :</strong> {{ $election->number_votes }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('elections.show', $election->id_election) }}" class="btn btn-sm bg-[#2EC7E6] text-white">Voir Détails</a>
                            <a href="{{ route('elections.edit', $election->id_election) }}" class="btn btn-sm btn-light">Modifier</a>
                            <form action="{{ route('elections.destroy', $election->id_election) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-dark">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection