<?php

use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class)->name('home');


Route::get('/dashboard', [JobsController::class, 'index'])->name('jobs.index')->middleware('rol.user');
Route::get('/jobs/create', [JobsController::class, 'create'])->name('jobs.create');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// Notifications
Route::get("/notifications", NotificationController::class)->name('notifications');

// JOBS EDIT
Route::get('/candidates/{job}', [CandidateController::class, 'index'])->name('candidate.index');
Route::get("/jobs/{job}/edit", [JobsController::class, 'edit'])->name('jobs.edit');
Route::get('/jobs/{job}', [JobsController::class, 'show'])->name('jobs.show');


require __DIR__ . '/auth.php';
