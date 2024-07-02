@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Liste des Candidats</h2>
            <div class="text-center mt-4 mb-3">
                <a href="{{ route('candidates.create') }}" class="btn bg-[#2EC7E6] text-white">Ajouter un Candidat</a>
            </div>
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($candidates as $candidate)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidate->name }}</h5>
                            <p class="card-text">{{ $candidate->description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-sm btn-light">
                                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828911.png" alt="Edit" style="width: 20px; height: 20px;">
                            </a>
                            <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm bg-[#070044] text-white">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection