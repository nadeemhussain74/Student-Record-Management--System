<?php

use App\Http\Controllers\SudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/saveStudent/ge tAllStudent',[SudentController::class, 'index']);
Route::post('/saveStudent',[SudentController::class, 'store']);
