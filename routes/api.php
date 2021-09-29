<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

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

Route::post('/login', [PageController::class, 'login']);

Route::prefix('post')->group(function () {
    Route::post('/add',[PostController::class, 'store_post'])->name('api.store.post');
    Route::post('/fetch',[PostController::class, 'fetch_post'])->name('api.fetch.post');
    Route::post('/delete',[PostController::class, 'delete_post'])->name('api.delete.post');
});

Route::prefix('category')->group(function () {
    Route::post('/add', [PostController::class, 'store_category'])->name('api.store.category');
    Route::post('/fetch', [PostController::class, 'fetch_category'])->name('api.fetch.category');
    Route::post('/delete', [PostController::class, 'delete_category'])->name('api.delete.category');
});

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::prefix('post')->group(function () {
//         Route::post('/add',[PostController::class, 'store_post'])->name('api.store.post');
//         Route::post('/fetch',[PostController::class, 'fetch_post'])->name('api.fetch.post');
//         Route::post('/delete',[PostController::class, 'delete_post'])->name('api.delete.post');
//     });

//     Route::prefix('category')->group(function () {
//         Route::post('/add', [PostController::class, 'store_category'])->name('api.store.category');
//         Route::post('/fetch', [PostController::class, 'fetch_category'])->name('api.fetch.category');
//         Route::post('/delete', [PostController::class, 'delete_category'])->name('api.delete.category');
//     });
// });
