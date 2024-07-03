@extends('layouts.app')

@section('content')
<div class="container mx-auto my-10 px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <h2 class="text-2xl font-bold text-center mb-6" style="color: #070044;">S'inscrire en tant que Candidat</h2>
            <form method="POST" action="{{ route('candidates.store', $election->id_election) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="id_user" class="block text-[#070044] text-sm font-bold mb-2">Utilisateur</label>
                    <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id_user }}">
                    <p class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                    </p>
                </div>
                <div class="mb-4">
                    <label for="election" class="block text-[#070044] text-sm font-bold mb-2">Élection</label>
                    <p class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        {{ $election->name_election }}
                    </p>
                    <input type="hidden" id="id_election" name="id_election" value="{{ $election->id_election }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-[#2EC7E6] hover:bg-[#1BB6D1] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection