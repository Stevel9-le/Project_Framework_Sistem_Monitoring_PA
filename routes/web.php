<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SidangScheduleController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ProgressLogController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'admin'])
        ->name('dashboard');

    // Project (CRUD)
    Route::resource('project', ProjectController::class);

    // Task (INDEX SAJA)
    Route::get('/tasks', [TaskController::class, 'index'])
        ->name('tasks.index');

    // Sidang Schedule (CRUD)
    Route::resource('sidang-schedules', SidangScheduleController::class);

    // Assessment (INDEX SAJA)
    Route::get('/assessments', [AssessmentController::class, 'index'])
        ->name('assessments.index');

    // Progress Log (INDEX SAJA)
    Route::get('/progress-logs', [ProgressLogController::class, 'index'])
        ->name('progress-logs.index');

    // KHUSUS ADMIN
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
    });
});
