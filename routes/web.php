<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/playlist', [PlaylistController::class, 'index'])->name('playlist.index');
Route::get('/playlist/create', [PlaylistController::class, 'create'])->name('playlist.create');
Route::post('/playlist/store', [PlaylistController::class, 'store'])->name('playlist.store');
Route::get('/playlist/edit/{playlist}', [PlaylistController::class, 'edit'])->name('playlist.edit');
Route::put('/playlist/update/{playlist}', [PlaylistController::class, 'update'])->name('playlist.update');
Route::delete('/playlist/destroy/{playlist}', [PlaylistController::class, 'destroy'])->name('playlist.destroy');


Route::get('/content/show/{playlist}', [ContentController::class, 'show'])->name('content.show');
Route::get('/content/create', [ContentController::class, 'create'])->name('content.create');
Route::post('/content/store', [ContentController::class, 'store'])->name('content.store');
Route::get('/content/edit/{content}', [ContentController::class, 'edit'])->name('content.edit');
Route::put('/content/update/{content}', [ContentController::class, 'update'])->name('content.update');
Route::delete('/content/destroy/{content}', [ContentController::class, 'destroy'])->name('content.destroy');
