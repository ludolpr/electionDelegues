@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Modifier l'Élection</h2>
            <form method="POST" action="{{ route('elections.update', $election->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name_election" class="form-label">Nom de l'élection</label>
                    <input type="text" class="form-control" id="name_election" name="name_election" value="{{ $election->name_election }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $election->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="number_voters" class="form-label">Nombre d'électeurs</label>
                    <input type="number" class="form-control" id="number_voters" name="number_voters" value="{{ $election->number_voters }}" required>
                </div>
                <div class="mb-3">
                    <label for="number_votes" class="form-label">Nombre de votes</label>
                    <input type="number" class="form-control" id="number_votes" name="number_votes" value="{{ $election->number_votes }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-[#2EC7E6] text-white">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection