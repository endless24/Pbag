<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

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

// Route::post('/login', [PageController::class, 'login'])->name('login');
// Route::post('/register', [PageController::class, 'register'])->name('register');
// Route::post('/delete_token', [PageController::class, 'delete_token'])->name('delete_token');


// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/aboutus', [PageController::class, 'aboutus'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/testimony', [PageController::class, 'testimony'])->name('testimony');
// route to view event post details
Route::get('/viewpost/{id}', [PostController::class, 'showpost'])->name('viewpost');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-post', [PageController::class, 'add_post'])->name('add_post');
    Route::get('/add-event', [PageController::class, 'add_event'])->name('add_event');
    Route::get('/add-category', [PageController::class, 'add_category'])->name('add_category');
    // Route::get('/manage-post', [PageController::class, 'view_category'])->name('categories');
});

