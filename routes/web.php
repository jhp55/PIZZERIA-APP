<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\PizzaSizeController;

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
Route::delete('/employees/{employee}',[EmployeesController::class,'destroy'])->name('employees.destroy');
Route::put('/employees/{employee}',[EmployeesController::class,'update'])->name('employees.update');
Route::get('/employees/{employee}/edit',[EmployeesController::class,'edit'])->name('employees.edit');

Route::get('/pizzas',[pizzasController::class,'index']) -> name('pizzas.index');
Route::post('/pizzas',[pizzasController::class,'store']) -> name('pizzas.store');
Route::get('/pizzas/pizza',[pizzasController::class,'create'])->name('pizzas.create');
Route::delete('/pizzas/{pizza}',[pizzasController::class,'destroy'])->name('pizzas.destroy');
Route::put('/pizzas/{pizza}',[pizzasController::class,'update'])->name('pizzas.update');
Route::get('/pizzas/{pizza}/edit',[pizzasController::class,'edit'])->name('pizzas.edit');

Route::get('/pizza_sizes',[PizzaSizeController::class,'index']) -> name('pizza_sizes.index');
Route::post('/pizza_sizes',[PizzaSizeController::class,'store']) -> name('pizza_sizes.store');
Route::get('/pizza_sizes/pizza_size',[PizzaSizeController::class,'create'])->name('pizza_sizes.create');
Route::delete('/pizza_sizes/{pizza_size}',[PizzaSizeController::class,'destroy'])->name('pizza_sizes.destroy');
Route::put('/pizza_sizes/{pizza_size}',[PizzaSizeController::class,'update'])->name('pizza_sizes.update');
Route::get('/pizza_sizes/{pizza_size}/edit',[PizzaSizeController::class,'edit'])->name('pizza_sizes.edit');

require __DIR__.'/auth.php';
