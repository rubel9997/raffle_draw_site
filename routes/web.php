<?php

use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('raffle-draw-register');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/participant_store', [ParticipantController::class, 'store'])->name('participant_store');
Route::get('/download_excel_sheet', [ParticipantController::class, 'downloadExcelSheet'])->name('download_excel_sheet');
Route::get('/participant_delete/{id}', [ParticipantController::class, 'destroy'])->name('participant_delete');
