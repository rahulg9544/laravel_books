<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('books', BookController::class)->except(['show']);

Route::get('books/report', [BookController::class, 'showReport'])->name('books.showReport');

Route::post('books/report', [BookController::class, 'report'])->name('books.report');
