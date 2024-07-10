<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ActorController;

Route::apiResource('movies', MovieController::class);
Route::apiResource('genres', GenreController::class);
Route::apiResource('actors', ActorController::class);
