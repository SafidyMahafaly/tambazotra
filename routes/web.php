<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KenoController;
use App\Http\Controllers\TirageController;
use Illuminate\Routing\RedirectController;
use App\Http\Controllers\RediectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[RediectController::class,'index'])->name('dashboard');
Route::post('/tirage',[TirageController::class,'store'])->name('tirage');
Route::get('/choix',[TirageController::class,'choix']);
Route::get('/tiragevita',[TirageController::class,'vita']);
Route::get('/keno',[KenoController::class,'index'])->name('keno.index');
require __DIR__.'/auth.php';
