<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Route::get('/mahasiswas',[MahasiswaController::class,'index'])->name('mahasiswas.index');
// Route::get('/mahasiswas/create',[MahasiswaController::class,'create'])->name('mahasiswas.create');
// Route::post('/mahasiswas',[MahasiswaController::class,'store'])->name('mahasiswas.store');
// Route::get('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'show'])->name('mahasiswas.show');
// Route::get('/mahasiswas/{mahasiswa}/edit',[MahasiswaController::class,'edit'])->name('mahasiswas.edit');
// Route::patch('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'update'])->name('mahasiswas.update');
// Route::delete('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'destroy'])->name('mahasiswas.destroy');

Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'],function(){
    Route::get('/home',[MahasiswaController::class,'home'])->name('mahasiswas.home');
    Route::get('/mahasiswas',[MahasiswaController::class,'index'])->name('mahasiswas.index');
    Route::get('/mahasiswas/create',[MahasiswaController::class,'create'])->name('mahasiswas.create');
    Route::post('/mahasiswas',[MahasiswaController::class,'store'])->name('mahasiswas.store');
    Route::get('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'show'])->name('mahasiswas.show');
    Route::get('/mahasiswas/{mahasiswa}/edit',[MahasiswaController::class,'edit'])->name('mahasiswas.edit');
    Route::patch('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'update'])->name('mahasiswas.update');
    Route::delete('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'destroy'])->name('mahasiswas.destroy');
    //fitur sorting
    Route::get('/mahasiswas-sortbynim', [MahasiswaController::class, 'sortynim']);
    Route::get('/mahasiswas-sortbyname', [MahasiswaController::class, 'sortynama']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
