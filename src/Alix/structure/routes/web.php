<?php

use App\Http\Controllers\TaskController;
use Framework\Http\Route;

/**
 * Routes allows us to register actions against specific uris
 */

Route::get('/', 'home');
//worst practice
Route::get('/callback', function () {
    return 'callback';
});
//best practice
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);