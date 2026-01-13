<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TrainingController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

/*Route::middleware(['auth', 'role:admin', 'prevent-back-history'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});*/

Route::get('/info', [AuthController::class, 'login'])->name('exams.info');
Route::get('/exams', [ExamController::class, 'categoria'])->name('exams.index');
Route::post('/guardar-respuesta-individual', [ExamController::class, 'guardarRespuestaIndividual'])->name('guardar.respuesta.individual');

// En routes/web.php - Agrega esta línea
Route::post('/guardar-respuestas', [ExamController::class, 'guardarRespuestas']);
Route::get('/training', [TrainingController::class, 'training'])->name('training.index');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

