<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');

    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');

    Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');

    Route::put('/employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');

    Route::delete('/employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    Route::get('/employee/summary', [EmployeeController::class, 'summary'])->name('employee.summary');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
