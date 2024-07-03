@extends('layouts.app')

@section('content')
<div class="container mx-auto my-10 px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <h2 class="text-2xl font-bold text-center mb-6" style="color: #070044;">Créer une Élection</h2>
            <form method="POST" action="{{ route('elections.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="name_election" class="block text-[#070044] text-sm font-bold mb-2">Nom de
                        l'élection</label>
                    <input type="text" class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name_election" name="name_election" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-[#070044] text-sm font-bold mb-2">Description</label>
                    <textarea class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="id_class" class="block text-[#070044] text-sm font-bold mb-2">Classe</label>
                    <select id="id_class" name="id_class" class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($classes as $class)
                        <option value="{{ $class->id_class }}">{{ $class->name_class }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-[#2EC7E6] hover:bg-[#1BB6D1] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection