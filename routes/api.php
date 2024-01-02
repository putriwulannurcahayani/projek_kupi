<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PendapatanController;
use App\Http\Controllers\Api\PengeluaranController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/tes', function() {
    return response()->json("tes");
});
Route::post('/login', [AuthController::class,'authenticate']);
Route::post('/register', [AuthController::class,'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::resource('/product', ProductController::class);
    Route::get('/pendapatan', [PendapatanController::class, 'index'] );
    Route::post('/pendapatan', [PendapatanController::class, 'store'] );
    Route::get('/pengeluaran', [PengeluaranController::class,'index'] );
    Route::post('/pengeluaran', [PengeluaranController::class, 'store'] );
});


