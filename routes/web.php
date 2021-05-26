<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QtasnimController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [QtasnimController::class, 'index']);
Route::post('/input', [QtasnimController::class, 'store']);
Route::get('/ubah/{id}', [QtasnimController::class, 'edit']);
//Route::post('/ubah/{id}', [QtasnimController::class, 'update']);
Route::post('/ubah/{id}', [QtasnimController::class, 'update']);
Route::delete('/delete/{id}', [QtasnimController::class, 'destroy']);
