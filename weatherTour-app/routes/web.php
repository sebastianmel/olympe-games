<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\HomeController;
use CsvController as GlobalCsvController;
use ParisController as GlobalParisController;
use BordeauxController as GlobalBordeauxController;
use LilleController as GlobalLilleController;
use LyonController as GlobalLyonController;
use MarseilleController as GlobalMarseilleController;
use MontpellierController as GlobalMontpellierController;
use NantesController as GlobalNantesController;
use NiceController as GlobalNiceController;
use StrasbourgController as GlobalStrasbourgController;
use ToulouseController as GlobalToulouseController;
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
    return view('homeB');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [GlobalCsvController::class, 'getCSVFromS3'])->name('dashboard');
    Route::get('/dashboard/paris', [GlobalParisController::class, 'getCSVFromS3'])->name('parisPage');
    Route::get('/dashboard/bordeaux', [GlobalBordeauxController::class, 'getCSVFromS3'])->name('bordeauxPage');
    Route::get('/dashboard/lille', [GlobalLilleController::class, 'getCSVFromS3'])->name('lillePage');
    Route::get('/dashboard/lyon', [GlobalLyonController::class, 'getCSVFromS3'])->name('lyonPage');
    Route::get('/dashboard/marseille', [GlobalMarseilleController::class, 'getCSVFromS3'])->name('marseillePage');
    Route::get('/dashboard/montpellier', [GlobalMontpellierController::class, 'getCSVFromS3'])->name('montpellierPage');
    Route::get('/dashboard/nantes', [GlobalNantesController::class, 'getCSVFromS3'])->name('nantesPage');
    Route::get('/dashboard/nice', [GlobalNiceController::class, 'getCSVFromS3'])->name('nicePage');
    Route::get('/dashboard/strasbourg', [GlobalStrasbourgController::class, 'getCSVFromS3'])->name('strasbourgPage');
    Route::get('/dashboard/toulouse', [GlobalToulouseController::class, 'getCSVFromS3'])->name('toulousePage');
});

require __DIR__.'/auth.php';
