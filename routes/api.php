<?php

use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/all-forms-records', [FrontController::class, 'allFromsRecords']);
Route::post('/save-fields-records', [FrontController::class, 'saveFieldsRecords']);
Route::post('/submitForm-fields-records', [FrontController::class, 'submitFormFieldsRecords']);

Route::get('/get-settings', [FrontController::class, 'getSettings']);
