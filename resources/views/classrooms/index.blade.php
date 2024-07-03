@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="bg-white shadow-md rounded-lg p-4">
        <h2 class="text-2xl font-semibold mb-4">Liste des Classes</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-100">Nom de la Classe</th>
                    <th class="py-2 px-4 bg-gray-100">Nombre d'Élèves</th>
                    <th class="py-2 px-4 bg-gray-100">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classrooms as $classroom)
                <tr>
                    <td class="border px-4 py-2">{{ $classroom->name_class }}</td>
                    <td class="border px-4 py-2">{{ $classroom->users_count }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="bg-[#070044] hover:bg-gray-200 hover:text-[#070044] text-white text-white font-bold py-2 px-4 rounded">Voir</a>
                        <a href="{{ route('classrooms.edit', $classroom) }}" class="bg-[#070044] hover:bg-gray-200 hover:text-[#070044] text-white text-white font-bold py-2 px-4 rounded">Éditer</a>
                        <form action="{{ route('classrooms.destroy', $classroom) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#070044] hover:bg-gray-200 hover:text-[#070044] text-white font-bold py-2 px-4 rounded">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection