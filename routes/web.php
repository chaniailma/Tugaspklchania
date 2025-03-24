<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {   
    return view('welcome');
    
});

//==================== Pendaftaran (Bisa Diakses Tanpa Login) ====================
Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create'); // Form Pendaftaran
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store'); // Simpan Pendaftaran
Route::get('/pendaftaran/search', [PendaftaranController::class, 'search'])->name('pendaftaran.search');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('nilai')->group(function () {
        Route::get('/', [NilaiController::class, 'index'])->name('nilai');
        Route::get('/create', [NilaiController::class, 'create'])->name('nilai.create');
        Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
        Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
        Route::put('/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

        
    });

    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::get('/pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
Route::put('/pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
Route::put('/pendaftaran/{id}/updatestatus', [PendaftaranController::class, 'updateStatus'])->name('pendaftaran.updatestatus');
Route::get('/pendaftaran/{id}/download', [PendaftaranController::class, 'downloadPdf'])->name('pendaftaran.download');



    Route::prefix('mapel')->group(function () {
        Route::get('/', [MapelController::class, 'index'])->name('mapel');
        Route::get('/create', [MapelController::class, 'create'])->name('mapel.create');
        Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/{id}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/{id}', [MapelController::class, 'destroy'])->name('mapel.delete'); 
        
    });

    Route::prefix('teachers')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teachers');
        Route::get('/create', [TeacherController::class, 'create'])->name('teachers.create');
        Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
        Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
        Route::put('/{id}', [TeacherController::class, 'update'])->name('teachers.update');
        Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('teachers.delete');  
        Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
    });

    // Routes untuk Students
    Route::prefix('students')->group(function () {
        Route::get('/', [StudentsController::class, 'index'])->name('students');
        Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
        Route::post('/students', [StudentsController::class, 'store'])->name('students.store'); // 
        Route::get('/students/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit');
        Route::put('/{id}', [StudentsController::class, 'update'])->name('students.update');
        Route::delete('/{id}', [StudentsController::class, 'delete'])->name('students.delete');
        Route::get('/students/{id}', [StudentsController::class, 'show'])->name('students.show');
        Route::get('/students-data', [StudentsController::class, 'getStudentsData'])->name('students.get');

    });
    

    // Routes untuk User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.delete'); // Menggunakan `destroy` bukan `delete`
    });

        //pdf
        Route::get('/nilai/export-pdf', [PdfController::class, 'exportPdf'])->name('nilai.export-pdf');
    // Routes untuk Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
