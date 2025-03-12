<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

    // Routes untuk Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
