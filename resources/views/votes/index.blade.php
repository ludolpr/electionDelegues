@extends('layouts.app')

@section('content')
<div class="container mx-auto my-5">
    <div class="text-center">
        <h2 class="text-3xl font-semibold mb-4">Liste des Votes</h2>
        <a href="{{ route('votes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">Nouveau Vote</a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Utilisateur</th>
                    <th class="px-4 py-2">Élection</th>
                    <th class="px-4 py-2">Candidat</th>
                    <th class="px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($votes as $vote)
                <tr>
                    <td class="border px-4 py-2">{{ $vote->user->firstname }} {{ $vote->user->lastname }}</td>
                    <td class="border px-4 py-2">{{ $vote->election->name_election }}</td>
                    <td class="border px-4 py-2">{{ $vote->candidate->user->firstname }}
                        {{ $vote->candidate->user->lastname }}
                    </td>
                    <td class="border px-4 py-2">{{ $vote->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection