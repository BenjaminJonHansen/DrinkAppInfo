<?php

use App\Http\Controllers\CocktailController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CocktailController::class, 'index']);
Route::get('/dumb', [CocktailController::class, 'dumb']);
Route::post('/search', [CocktailController::class, 'search']);