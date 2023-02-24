<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\OwnerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Welcome Page with Search button
Route::get('/', [OwnerController::class, 'index']);
// SEARCH PAGE
Route::get('/search', [OwnerController::class, 'search'])->name('owners.search');
//detail page
Route::get('/detail/{animalId}', [AnimalController::class, 'detail'])->name('animal.detail');
