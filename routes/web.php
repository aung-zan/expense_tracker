<?php

use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginForm')->name('loginForm');
    Route::post('/login', 'login')->name('login');
    Route::get('/signup', 'signupForm')->name('signupForm');
    Route::post('/signup', 'signup')->name('signup');
    Route::get('/forgot_password', 'forgotPassword')->name('forgotPassword');
    // Route::get('/login', 'loginForm');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', '')->name('dashboard');
});

Route::prefix('income')->group(function () {
    Route::controller(IncomeController::class)->group(function () {
        Route::get('list', 'list')->name('incomeList');
        Route::get('create', 'create')->name('incomeCreate');
        Route::post('create', 'store')->name('incomeStore');
        Route::get('edit', 'edit')->name('incomeEdit');
        Route::patch('update', 'update')->name('incomeUpdate');
        Route::delete('delete', 'delete')->name('incomeDelete');
    });
});

Route::prefix('expense')->group(function () {
    Route::controller(ExpenseController::class)->group(function () {
        Route::get('list', 'list')->name('expenseList');
        Route::get('create', 'create')->name('expenseCreate');
        Route::post('create', 'store')->name('expenseStore');
        Route::get('edit', 'edit')->name('expenseEdit');
        Route::patch('update', 'update')->name('expenseUpdate');
        Route::delete('delete', 'delete')->name('expenseDelete');
    });
});

Route::prefix('expense_category')->group(function () {
    Route::controller(ExpenseCategoryController::class)->group(function () {
        Route::get('list', 'list')->name('expenseCategoryList');
        Route::get('create', 'create')->name('expenseCategoryCreate');
        Route::post('create', 'store')->name('expenseCategoryStore');
        Route::get('edit', 'edit')->name('expenseCategoryEdit');
        Route::patch('update', 'update')->name('expenseCategoryUpdate');
        Route::delete('delete', 'delete')->name('expenseCategoryDelete');
    });
});
