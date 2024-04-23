<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EvenementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::resource('evenements', EvenementController::class);
Route::post('/register', [EvenementController::class, 'register'])->name('evenements.register');




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/{id}', [EvenementController::class, 'registerInEvent'])->name('registerInEvent');

Route::delete('/cancel/{id}', [EvenementController::class, 'cancelRegistration'])->name('cancelRegistration');

// Admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/employes', [App\Http\Controllers\AdminController::class, 'manageEmployes'])->name('admin.employes');
Route::get('/admin/evenements', [App\Http\Controllers\AdminController::class, 'manageEvents'])->name('admin.evenements');

// Employe routes
Route::resource('employes', EmployeController::class);



