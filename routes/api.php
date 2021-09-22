<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('post')->group(function () {
    Route::post('/add',[PostController::class, 'store_post'])->name('api.store.post');
    Route::post('/fetch',[PostController::class, 'fetch_post'])->name('api.fetch.post');
    Route::post('/delete',[PostController::class, 'delete_post'])->name('api.delete.post');
});

