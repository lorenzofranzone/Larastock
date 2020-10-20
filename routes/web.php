<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\
{
    AlbumController
};

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

Route::get('/', function () {
    return view('home');
});

use App\Models\{User, Album};

// TEST DELETE
Route::resource('/albums', AlbumController::class);
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('album.show');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('album.create');
Route::delete('/albums/{album}', [AlbumController::class, 'delete']);