<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;

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

Route::get('/clients',[ClientsController::class,'index']) -> name('clients.index');
Route::post('/clients',[ClientsController::class,'store']) -> name('clients.store');
Route::get('/clients/create',[ClientsController::class,'create'])->name('clients.create');
Route::delete('/clients/{client}',[ClientsController::class,'destroy'])->name('clients.destroy');
Route::put('/clients/{client}',[ClientsController::class,'update'])->name('clients.update');
Route::get('/clients/{client}/edit',[ClientsController::class,'edit'])->name('clients.edit');


Route::get('/employees',[EmployeesController::class,'index']) -> name('employees.index');
Route::post('/employees',[EmployeesController::class,'store']) -> name('employees.store');
Route::get('/employees/create',[EmployeesController::class,'create'])->name('employees.create');


require __DIR__.'/auth.php';
