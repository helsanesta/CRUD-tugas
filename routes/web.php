<?php

use App\Http\Controllers\SiswaController;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SiswaController::class, 'index'])->name('home');

Route::get('/buat', [SiswaController::class, 'create'])->name('siswa.tambah-data');
Route::post('/store-data', [SiswaController::class, 'store'])->name('siswa.store-data');

Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit-siswa');
Route::post('/update/{id}', [SiswaController::class, 'update'])->name('siswa.update-data');

Route::get('/detail/{id}', [SiswaController::class, 'show'])->name('siswa.tampilkan-data');

Route::delete('/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.hapus-data');