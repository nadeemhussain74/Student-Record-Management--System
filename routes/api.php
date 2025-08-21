<?php

use App\Http\Controllers\SudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/getAllStudent',[SudentController::class, 'index']);
Route::get('/getStudent/{id}',[SudentController::class, 'show']);
Route::post('/saveStudent',[SudentController::class, 'store']);
Route::put('/student/{id}',[SudentController::class, 'update']);
Route::delete('/deleteStudent/{id}',[SudentController::class, 'destroy']);
