<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ClassroomController;


// Auth
require __DIR__ . '/auth.php';

// Page home
Route::get('/', function () {
    return view('welcome');
});

// Auth et profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('elections/{election}/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
    Route::post('elections/{election}/candidates', [CandidateController::class, 'store'])->name('candidates.store');
});

// Groupes principaux
Route::resource('elections', ElectionController::class)->middleware('auth');
Route::resource('candidates', CandidateController::class);
Route::resource('votes', VoteController::class);
Route::resource('classrooms', ClassroomController::class);
Route::resource('users', UserController::class);

// Candidats
Route::get('candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('candidates', [CandidateController::class, 'store'])->name('candidates.store');


// votes
Route::get('votes/results', [VoteController::class, 'allResults'])->name('votes.allResults');
Route::get('votes/results/{id_election}', [VoteController::class, 'results'])->name('votes.results');


// Routes pour les candidats
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');

// Routes pour les électeurs (si nécessaire)
Route::get('/elections', [ElectionController::class, 'index'])->name('elections.index');
Route::post('/elections/vote', [ElectionController::class, 'vote'])->name('elections.vote');