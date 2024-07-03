@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="bg-white shadow-md rounded-lg p-4">
        <h2 class="text-2xl font-semibold mb-4">Modifier la Classe</h2>

        @if ($errors->any())
        <div class="bg-gray-700 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('classrooms.update', $classroom->id_class) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name_class" class="block text-gray-700 font-bold mb-2">Nom de la Classe :</label>
                <input type="text" name="name_class" id="name_class" value="{{ old('name_class', $classroom->name_class) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-[#070044] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Mettre à jour
                </button>
                <a href="{{ route('classrooms.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection