@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="text-center mb-4">Gestion des Élections</h2>
            <a href="{{ route('elections.create') }}" class="btn bg-[#2EC7E6] text-white p-3 rounded-lg">Créer une
                Nouvelle Élection</a>
        </div>
    </div>
</div>
@endsection