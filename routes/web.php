<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\OrderPizzaController;
use App\Http\Controllers\OrderExtraIngredientController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\RawMaterialsController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\PizzaRawMaterialController;


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

       
    Route::resource('clients', ClientsController::class);
    Route::resource('employees', EmployeesController::class);
    Route::resource('pizzas', PizzasController::class);
    Route::resource('pizza_sizes', PizzaSizeController::class);

    
    Route::resource('order_pizza', OrderPizzaController::class);
    Route::resource('order_extra_ingredient', OrderExtraIngredientController::class);
    Route::resource('suppliers', SuppliersController::class);
    Route::resource('raw_materials', RawMaterialsController::class);
    Route::resource('purchases', PurchasesController::class);
    Route::resource('pizza_raw_material', PizzaRawMaterialController::class);
});



require __DIR__.'/auth.php';
