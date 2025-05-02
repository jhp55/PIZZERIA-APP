<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\IngredientsController;
use Illuminate\Support\Facades\Route;

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
    Route::resource('ingredients', IngredientsController::class);

    Route::get('test-ingredients', function() {
        $ingredients = \App\Models\Ingredient::all();
        dd($ingredients); 
    });
    
});

require __DIR__.'/auth.php';