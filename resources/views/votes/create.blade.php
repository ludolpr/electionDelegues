@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vote pour l'élection: {{ $election->name_election }}</h1>
    <form method="POST" action="{{ route('votes.store', $election) }}">
        @csrf
        <div class="mb-3">
            <label for="delegate_id" class="form-label">Choisissez votre délégué</label>
            <select id="delegate_id" name="delegate_id" class="form-select" required>
                <option value="" disabled selected>Choisissez un candidat</option>
                @foreach($candidates as $candidate)
                <option value="{{ $candidate->id_candidate }}">{{ $candidate->user->firstname }}
                    {{ $candidate->user->lastname }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="suppleant_id" class="form-label">Choisissez votre suppléant</label>
            <select id="suppleant_id" name="suppleant_id" class="form-select" required>
                <option value="" disabled selected>Choisissez un candidat</option>
                @foreach($candidates as $candidate)
                <option value="{{ $candidate->id_candidate }}">{{ $candidate->user->firstname }}
                    {{ $candidate->user->lastname }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre votre vote</button>
    </form>
</div>
@endsection