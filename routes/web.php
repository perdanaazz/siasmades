<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

//Register & Login Routes
Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

//Auth Routes
Route::group(['middleware' => 'auth'],function(){
    Route::get('/siasmades',[MahasiswaController::class,'index'])->name('mahasiswas.index');
    //view pengajuan
    Route::view('/ktpform', 'ktpform');
    Route::view('/penghasilanform', 'penghasilanform');
    Route::view('/sktmform', 'sktmform');
    Route::get('/pengajuan', [MahasiswaController::class, 'pengajuan'])->name('siasmades.pengajuan');
    Route::post('/mahasiswas',[MahasiswaController::class,'store'])->name('mahasiswas.store');
    //fitur
    Route::get('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'show'])->name('mahasiswas.show');
    Route::get('/mahasiswas/{mahasiswa}/edit',[MahasiswaController::class,'edit'])->name('mahasiswas.edit');
    Route::patch('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'update'])->name('mahasiswas.update');
    Route::delete('/mahasiswas/{mahasiswa}',[MahasiswaController::class,'destroy'])->name('mahasiswas.destroy');
    Route::get('/siasmades-delete',[MahasiswaController::class, 'delete']);
    // Route::get('/editprofil', [MahasiswaController::class, 'editprofil'])->name('siasmades.editprofil');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    //fitur sorting
    Route::get('/sortbynama', [MahasiswaController::class, 'sortynama']);
    Route::get('/sortbytanggal', [MahasiswaController::class, 'sortytanggal']);
    Route::get('/sortbykategori', [MahasiswaController::class, 'sortykategori']);
});