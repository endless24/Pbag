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
    Route::post('/mission_',[PostController::class, 'mission_count'])->name('api.mission.post');
});

Route::prefix('contact')->group(function () {
    Route::post('/add',[PostController::class,'store_contact'])->name('api.store.contact');
    Route::post('/fetch',[PostController::class,'fetch_contact'])->name('api.fetch.contact');
    Route::post('/delete',[PostController::class,'delete_contact'])->name('api.delete.contact');
});

// Route::prefix('category')->group(function () {
//     Route::post('/add', [PostController::class, 'store_category'])->name('api.store.category');
//     Route::post('/fetch', [PostController::class, 'fetch_category'])->name('api.fetch.category');
//     Route::post('/delete', [PostController::class, 'delete_category'])->name('api.delete.category');
// });

Route::prefix('event')->group(function () {
    Route::post('/add',[PostController::class, 'store_event'])->name('api.store.event');
    Route::post('/fetch',[PostController::class, 'fetch_event'])->name('api.fetch.event');
    Route::post('/fetchevent',[PostController::class, 'fetch_post_event'])->name('api.fetch.post.event');
    Route::post('/delete',[PostController::class, 'delete_event'])->name('api.delete.event');
    Route::post('/event',[PostController::class, 'event_count'])->name('api.count.event');
});



Route::prefix('testimony')->group(function () {
    Route::post('/add', [PostController::class, 'store_testimony'])->name('api.store.testimony');
    Route::post('/fetch', [PostController::class, 'fetch_testimony'])->name('api.fetch.testimony');
    Route::post('/fetchtestimony', [PostController::class, 'fetch_testimony_once'])->name('api.fetch.testimony.once');
    Route::post('/delete', [PostController::class, 'delete_testimony'])->name('api.delete.testimony');
    Route::post('/testimony', [PostController::class, 'count_testimony'])->name('api.count.testimony');
});

// Route::middleware(['auth:sanctum'])->group(function () {
//     
// });
