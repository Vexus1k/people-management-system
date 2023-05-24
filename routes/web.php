<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('Popiołek/50192')->group(function () {
    Route::get('people', [PeopleController::class, 'index']);
    Route::get('people/{id}', [PeopleController::class, 'show']);
    Route::put('people/{id}', [PeopleController::class, 'update']);
    Route::delete('people/{id}', [PeopleController::class, 'destroy']);
    Route::post('people', [PeopleController::class, 'create']);
});
