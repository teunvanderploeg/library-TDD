<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::post('/books', [BooksController::class, 'store']);
Route::patch('/books/{book}', [BooksController::class, 'update']);
Route::delete('/books/{book}', [BooksController::class, 'destroy']);

Route::post('/author', [AuthorController::class, 'store']);
