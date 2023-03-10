<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController as CategoryIndex;
use App\Http\Controllers\Api\MovieController as MovieIndex;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categories',[CategoryIndex::class, 'index']);
Route::get('/category/{categoryId}',[CategoryIndex::class, 'detail']);

Route::get('/movies',[MovieIndex::class, 'index']);
Route::get('/movie/{movieId}',[MovieIndex::class, 'detail']);
