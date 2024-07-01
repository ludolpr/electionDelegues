<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// user route
Route::resource('users', UserController::class)->except('index', 'create', 'store');
Route::resource('elections', ElectionController::class);
Route::resource('candidates', CandidateController::class);
Route::resource('votes', VoteController::class);