<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('data');
});
// Route::get('/data', function () {
//     return view('data');
// });
Route::get('/form', function () {
    return view('form');
});
Route::get('/edit', function () {
    return view('edit');
});

//เข้าถึง Data ผ่าน Api
Route::apiResource('api/books', BookController::class);

//Pull data
Route::get('/', [BookController::class, 'index']);

//Add data
Route::post('api/books', [BookController::class, 'store'])->name('books.store');

//Edit and update data
Route::get('api/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/api/books/{id}', [BookController::class, 'update'])->name('books.update');

//Delete data
Route::delete('/api/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
