<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ClassroomController;

// page home
Route::get('/', function () {
    return view('welcome');
});

// auth et profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('elections/{election}/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
    Route::post('elections/{election}/candidates', [CandidateController::class, 'store'])->name('candidates.store');
});

// groupes principaux
Route::resource('elections', ElectionController::class)->middleware('auth');
Route::resource('candidates', CandidateController::class);
Route::resource('votes', VoteController::class);
Route::resource('classrooms', ClassroomController::class);
Route::resource('users', UserController::class);

// Route::get('elections/{election}/add-candidates', [ElectionController::class, 'addCandidates'])->name('elections.addCandidates')->middleware('auth');
// Route::post('elections/{election}/store-candidates', [ElectionController::class, 'storeCandidates'])->name('elections.storeCandidates')->middleware('auth');

// Candidats
Route::get('elections/{election}/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('elections/{election}/candidates', [CandidateController::class, 'store'])->name('candidates.store');
Route::resource('candidates', CandidateController::class)->except(['create', 'store']);


// votes
Route::post('elections/{election}/vote', [ElectionController::class, 'storeVote'])->name('elections.storeVote')->middleware('auth');


// autres
require __DIR__ . '/auth.php';