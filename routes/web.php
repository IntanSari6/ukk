<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhotoDataController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GalleryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('initial-view.home');
// });

Route::get('/', [GalleryController::class, 'index']);

Route::get('/gallery', function () {
    return view('initial-view.gallery');
});
Route::get('/category', function () {
    return view('initial-view.category');
});
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth');

    Route::get('/photo-data', [PhotoDataController::class, 'index'])->middleware('auth');

    Route::get('/profile', [DashboardController::class, 'profile'])->middleware('auth');

    Route::resource('/dashboard/photo-data', PhotoDataController::class)->middleware('auth');

    Route::resource('/dashboard/album', AlbumController::class)->middleware('auth');
});
