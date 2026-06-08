<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DiagramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/overview', [DiagramController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('financial-records', FinanceController::class);
    Route::resource('budgets', BudgetController::class);
    Route::get('/dashboard', [DiagramController::class, 'index'])->name('dashboard');
    Route::get('/diagrams/expenses-by-category', [DiagramController::class, 'expensesByCategory'])->name('diagrams.expenses-by-category');
    Route::get('/diagrams/monthly-income-expenses',[DiagramController::class, 'monthlyIncomeExpenses'])->name('diagrams.monthly-income-expenses');

});

require __DIR__.'/auth.php';
