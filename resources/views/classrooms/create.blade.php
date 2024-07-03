@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="bg-white shadow-md rounded-lg p-4">
        <h2 class="text-2xl font-semibold mb-4">Créer une Nouvelle Classe</h2>
        <form action="{{ route('classrooms.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name_class" class="block text-gray-700 font-medium mb-2">Nom de la classe</label>
                <input type="text" name="name_class" id="name_class" class="border border-gray-300 p-2 rounded-lg w-full" required>
            </div>
            <button type="submit" class="bg-[#070044] hover:bg-gray-200 hover:text-[#070044] text-white text-white font-bold py-2 px-4 rounded-lg">Créer
                Classe</button>
        </form>
    </div>
</div>
@endsection