<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Models\Author;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('main');
Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
