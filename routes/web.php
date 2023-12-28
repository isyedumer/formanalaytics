<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GeneralSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// })->middleware(['verify.shopify'])->name('home');


Route::group(['middleware' => 'verify.shopify'], function () {

    Route::get('/', [FormController::class, 'index'])->name('home');
    Route::get('/get-all-forms', [FormController::class, 'formDetails'])->name('form.view');
});
