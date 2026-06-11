<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index']);

Route::get('/overview', [DiagramController::class, 'index'])
    ->middleware(['auth', 'locale'])
    ->name('dashboard');

Route::middleware(['auth', 'locale'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('categories', CategoryController::class);

    Route::resource('financial-records', FinanceController::class);

    Route::resource('budgets', BudgetController::class);

    Route::get('/dashboard', [DiagramController::class, 'index'])
        ->name('dashboard');

    Route::get('/diagrams/expenses-by-category', [DiagramController::class, 'expensesByCategory'])
        ->name('diagrams.expenses-by-category');

    Route::get('/diagrams/monthly-income-expenses', [DiagramController::class, 'monthlyIncomeExpenses'])
        ->name('diagrams.monthly-income-expenses');
});

Route::middleware(['auth', 'role:admin', 'locale'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::patch('/admin/users/{user}/block', [AdminController::class, 'block'])
        ->name('admin.users.block');

    Route::patch('/admin/users/{user}/unblock', [AdminController::class, 'unblock'])
        ->name('admin.users.unblock');

    Route::patch('/admin/users/{user}/make-admin', [AdminController::class, 'makeAdmin'])
        ->name('admin.users.make-admin');

    Route::patch('/admin/users/{user}/make-user', [AdminController::class, 'makeUser'])
        ->name('admin.users.make-user');

    Route::get('/admin/financial-records', [AdminController::class, 'financialRecords'])
        ->name('admin.financial-records');
});

Route::get('/language/{locale}', function ($locale) {

    if (!in_array($locale, ['lv', 'en'])) {
        abort(404);
    }

    Cookie::queue('language', $locale, 60 * 24 * 365);

    return redirect()->back();

})->name('language.switch');

require __DIR__.'/auth.php';