@extends('layouts.app')

@section('content')
<div class="container mx-auto my-10 px-4">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <h2 class="text-2xl font-bold text-center mb-6" style="color: #070044;">Votez pour
                {{ $election->name_election }}
            </h2>
            <form method="POST" action="{{ route('elections.storeVote', $election->id_election) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="delegate_id" class="block text-[#070044] text-sm font-bold mb-2">Sélectionnez un
                        Délégué</label>
                    <select id="delegate_id" name="delegate_id" class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($candidates as $candidate)
                        <option value="{{ $candidate->id_candidate }}">{{ $candidate->user->firstname }}
                            {{ $candidate->user->lastname }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="suppleant_id" class="block text-[#070044] text-sm font-bold mb-2">Sélectionnez un
                        Suppléant</label>
                    <select id="suppleant_id" name="suppleant_id" class="shadow appearance-none border border-[#070044] rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($candidates as $candidate)
                        <option value="{{ $candidate->id_candidate }}">{{ $candidate->user->firstname }}
                            {{ $candidate->user->lastname }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-[#2EC7E6] hover:bg-[#1BB6D1] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection