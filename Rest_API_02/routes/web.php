<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});


//getApiData
Route::get('/api/data', [ApiController::class, 'getData'])->name('fetchdata');

//getApiDataId
Route::get('/api/data/{id}', [ApiController::class, 'getDataId'])->name('fetchdataId');

//Edit and Update
Route::get('/api/data/{id}/edit', [ApiController::class, 'edit'])->name('edit');
Route::put('/api/data/{id}', [ApiController::class, 'update'])->name('update');
