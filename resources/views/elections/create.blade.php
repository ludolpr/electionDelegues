@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Créer une Élection</h2>
            <form method="POST" action="{{ route('elections.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="name_election" class="block text-gray-700 text-sm font-bold mb-2">Nom de
                        l'élection</label>
                    <input type="text" class="form-control" id="name_election" name="name_election" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="number_voters" class="block text-gray-700 text-sm font-bold mb-2">Nombre
                        d'électeurs</label>
                    <input type="number" class="form-control" id="number_voters" name="number_voters" required>
                </div>
                <div class="mb-4">
                    <label for="number_votes" class="block text-gray-700 text-sm font-bold mb-2">Nombre de votes</label>
                    <input type="number" class="form-control" id="number_votes" name="number_votes" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-[#2EC7E6] text-white p-2 rounded-lg">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection