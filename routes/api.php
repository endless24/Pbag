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
    Route::post('/fetchmission',[PostController::class, 'fetch_post_mission'])->name('api.fetch.post.mission');
    Route::post('/fetchmissioncount/{id}',[PostController::class, 'fetch_post_mission_count'])->name('api.fetch.post.mission.count');
    Route::post('/delete',[PostController::class, 'delete_post'])->name('api.delete.post');
});

Route::prefix('contact')->group(function () {
    Route::post('/add',[PostController::class,'store_contact'])->name('api.store.contact');
    Route::post('/fetch',[PostController::class,'fetch_contact'])->name('api.fetch.contact');
    Route::post('/delete',[PostController::class,'delete_contact'])->name('api.delete.contact');
});

Route::prefix('category')->group(function () {
    Route::post('/add', [PostController::class, 'store_category'])->name('api.store.category');
    Route::post('/fetch', [PostController::class, 'fetch_category'])->name('api.fetch.category');
    Route::post('/delete', [PostController::class, 'delete_category'])->name('api.delete.category');
});

// Route::middleware(['auth:sanctum'])->group(function () {
//     
// });
