@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="bg-white shadow-md rounded-lg p-4">
        <h2 class="text-2xl font-semibold mb-4">Détails de la Classe : {{ $classroom->name_class }}</h2>
        <p class="mb-4"><strong>Nombre d'Élèves :</strong> {{ $classroom->users->count() }}</p>
        <h3 class="text-xl font-semibold mb-2">Liste des Élèves</h3>
        <ul class="list-disc list-inside">
            @foreach($classroom->users as $user)
            <li>{{ $user->firstname }} {{ $user->lastname }} ({{ $user->email }})</li>
            @endforeach
        </ul>
        <a href="{{ route('classrooms.index') }}" class="bg-[#070044] hover:bg-gray-200 hover:text-[#070044] text-white text-white font-bold py-2 px-4 rounded mt-4 inline-block">Retour
            à la
            liste des classes</a>
    </div>
</div>
@endsection