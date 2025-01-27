@extends('layouts.app')

@section('content')
<div class="container mx-auto my-10 px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <h2 class="text-2xl font-bold text-center mb-6" style="color: #070044;">Inscription à une élection</h2>
            <form method="POST" action="{{ route('candidates.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="id_user" class="block text-[#070044] text-sm font-bold mb-2">Nom et prénom</label>
                    <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id_user }}">
                    <p class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                    </p>
                </div>
                <div class="mb-4">
                    <label for="id_election" class="block text-[#070044] text-sm font-bold mb-2">Élection</label>
                    <select id="id_election" name="id_election" class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" disabled selected>Choisissez une élection</option>
                        @foreach($elections as $election)
                        <option value="{{ $election->id_election }}">{{ $election->name_election }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-[#070044] text-sm font-bold mb-2">Rôle</label>
                    <select id="role" name="role" class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" disabled selected>Choisissez votre rôle</option>
                        <option value="candidate">Candidat</option>
                        <option value="voter">Électeur</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-[#2EC7E6] hover:bg-[#1BB6D1] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection