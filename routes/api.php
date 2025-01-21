<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadPDFController;

Route::middleware(['cors'])->group(function () {
    Route::get('pdf-download-api', [DownloadPDFController::class, 'downloadCV']);
});


// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

