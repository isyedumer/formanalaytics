<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\LocalController;

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
    Route::get('/localtesting', [LocalController::class, 'local'])->name('localTesting');
    Route::get('/get-records', [LocalController::class, 'getRecords'])->name('getRecords');
    Route::post('/save-form-feilds-records', [LocalController::class, 'saveFormFields'])->name('saveFormFields');
    Route::get('/form-settings',[LocalController::class,'getFormSettingsForm'])->name('form.settings.show');
    Route::post('/save-form-settings',[LocalController::class,'saveFormSettings']);
    Route::get('/get-records-session/{id}', [LocalController::class, 'getRecordsBySessionId'])->name('getRecordsBySessionId');
    Route::get('/generate-csv',[LocalController::class,'generateCSV']);

});
