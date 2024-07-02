@extends('layouts.app')
@section('content')
<!-- Header -->
<header class="bg-[#E0E2DB] p-4">
    <h1 class="text-center text-4xl font-bold">Élections de Délégués 2024</h1>
</header>


<!-- Hero Banner -->
<section class="bg-cover bg-center" style="background-image: url('path/to/image.jpg');">
    <div class="bg-opacity-50 bg-[#E0E2DB] p-10 text-center">
        <h2 class="text-5xl font-bold text-[#000AC9] mb-10  ">Votez pour vos délégués favoris !</h2>
        <a href="#" class="bg-[#070044] text-white px-6 py-3 rounded-full text-lg font-semibold">Votez
            Maintenant</a>
    </div>
</section>

<!-- About Section -->
<section class="p-8 bg-[#E0E2DB]">
    <h2 class="text-3xl font-bold text-[#070044] mb-4">À propos des élections</h2>
    <div class="bg-white p-6 rounded border border-[#BEB7A4]">
        <p>Explication courte sur le processus des élections.</p>
    </div>
</section>

<!-- Candidates Section -->
<section class="p-8">
    <h2 class="text-3xl font-bold text-[#070044] mb-8">Rencontrez les candidats</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Example candidate card -->
        <div class="bg-white p-6 rounded border border-[#2EC7E6]">
            <h3 class="text-2xl font-semibold mb-2">Nom du Candidat</h3>
            <img src="path/to/candidate-photo.jpg" alt="Photo du candidat" class="w-full h-48 object-cover mb-4 rounded">
        </div>
        <!-- Repeat for other candidates -->
    </div>
</section>

<!-- How to Vote Section -->
<section class="p-8 bg-[#E0E2DB]">
    <h2 class="text-3xl font-bold text-[#070044] mb-4">Comment voter</h2>
    <div class="text-lg">
        <p>Instructions sur comment participer aux élections.</p>
        <!-- Add icons and more content as needed -->
    </div>
</section>

<!-- Results Section -->
<section class="p-8">
    <h2 class="text-3xl font-bold text-[#070044] mb-4">Résultats</h2>
    <div class="bg-white p-6 rounded">
        <p>Graphiques et résultats des élections.</p>
        <!-- Add charts and more content as needed -->
    </div>
</section>
@endsection