<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Élections de Délégués 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite('resources/css/app.css', 'resources/sass/app.scss')
</head>

<body class="bg-[#E0E2DB] text-[#070044]">
    <div id="app" class="flex flex-col h-screen">
        <nav class="bg-[#070044] p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a class="text-white text-xl font-bold" href="/">Accueil</a>
                <div class="relative">
                    <ul class="flex space-x-4">
                        <li><a href="{{ route('votes.allResults') }}" class="text-white hover:text-gray-200 font-medium">Résultats</a></li>
                        @guest
                        <li><a href="{{ route('register') }}" class="text-white hover:text-gray-200 font-medium">S'enregistrer</a></li>
                        <li><a href="{{ route('login') }}" class="text-white hover:text-gray-200 font-medium">Se
                                connecter</a></li>
                        @else
                        @if(Auth::user() && Auth::user()->id_role == 1 && !session('isCandidateOrVoter'))
                        <li><a href="{{ route('candidates.create') }}" class="text-white hover:text-gray-200 font-medium">Candidats</a></li>
                        @endif
                        @if(Auth::user() && Auth::user()->id_role == 1)
                        <li><a href="{{ route('votes.create') }}" class="text-white hover:text-gray-200 font-medium">Voter</a></li>
                        <li class="relative group">
                            <a href="#" class="text-white hover:text-gray-200 font-medium">Classes</a>
                            <ul class="absolute hidden group-hover:block bg-[#070044] text-white space-y-2 rounded-lg shadow-lg p-2">
                                <li><a href="{{ route('classrooms.create') }}" class="block hover:bg-gray-700 rounded-md px-4 py-2">Créer une Classe</a></li>
                                <li><a href="{{ route('classrooms.index') }}" class="block hover:bg-gray-700 rounded-md px-4 py-2">Voir les Classes</a></li>
                            </ul>
                        </li>
                        <li class="relative group">
                            <a href="#" class="text-white hover:text-gray-200 font-medium">Élections</a>
                            <ul class="absolute hidden group-hover:block bg-[#070044] text-white space-y-2 rounded-lg shadow-lg p-2">
                                <li><a href="{{ route('elections.create') }}" class="block hover:bg-gray-700 rounded-md px-4 py-2">Créer une Élection</a></li>
                                <li><a href="{{ route('elections.index') }}" class="block hover:bg-gray-700 rounded-md px-4 py-2">Voir les Élections</a></li>
                            </ul>
                        </li>
                        @endif
                        <li><span class="text-white font-semibold">{{ Auth::user()->pseudonym }}</span></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white hover:text-gray-200 font-medium">Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="flex-grow">
            <div class="container mx-auto px-4">
                @if (session()->has('success'))
                <div class="alert alert-success text-[#070044] p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif
                @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#070044] p-4 text-white text-center">
            <p>Informations de contact</p>
            <div class="flex justify-center space-x-4 mt-4">
                <!-- Social media icons -->
                <a href="#" class="bg-[#2EC7E6] p-2 rounded-full flex items-center justify-center w-10 h-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </a>
                <a href="#" class="bg-[#2EC7E6] p-2 rounded-full flex items-center justify-center w-10 h-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </a>
                <!-- Add more icons as needed -->
            </div>
        </footer>

    </div>
</body>

</html>