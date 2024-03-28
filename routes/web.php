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

Route::prefix('/')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('', 'loginForm');
            Route::get('login', 'loginForm')->name('loginForm');
            Route::post('login', 'login')->name('login');
            Route::get('reset_password', 'forgotPassword')->name('forgotPassword');
            Route::post('reset_password', 'resetPassword')->name('resetPassword');
            Route::post('logout', 'logout')->name('logout')->middleware('auth')
                ->withoutMiddleware('guest');
        });

        Route::controller(SignUpController::class)->group(function () {
            Route::get('signup', 'signUpForm')->name('signUpForm');
            Route::post('signup', 'signUp')->name('signUp');
        });
    });

    Route::middleware('auth')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('dashboard');
        });

        Route::prefix('income_type')->group(function () {
            Route::controller(IncomeTypeController::class)->group(function () {
                Route::post('create', 'store')->name('incomeTypeStore');

                Route::prefix('{income_type_id}')->group(function () {
                    Route::put('update', 'update')->name('incomeTypeUpdate');
                    Route::delete('delete', 'destroy')->name('incomeTypeDelete');
                });
            });
        });

        Route::prefix('income')->group(function () {
            Route::controller(IncomeController::class)->group(function () {
                Route::get('list', 'list')->name('incomeList');
                Route::get('create', 'create')->name('incomeCreate');
                Route::post('create', 'store')->name('incomeStore');

                Route::prefix('{income_id}')->group(function () {
                    Route::get('edit', 'edit')->name('incomeEdit');
                    Route::put('update', 'update')->name('incomeUpdate');
                    Route::delete('delete', 'destroy')->name('incomeDelete');
                });
            });
        });

        Route::prefix('expense')->group(function () {
            Route::controller(ExpenseController::class)->group(function () {
                Route::get('list', 'list')->name('expenseList');
                Route::get('create', 'create')->name('expenseCreate');
                Route::post('create', 'store')->name('expenseStore');

                Route::prefix('{expense_id}')->group(function () {
                    Route::get('edit', 'edit')->name('expenseEdit');
                    Route::put('update', 'update')->name('expenseUpdate');
                    Route::delete('delete', 'destroy')->name('expenseDelete');
                });
            });
        });

        Route::prefix('expense_type')->group(function () {
            Route::controller(ExpenseTypeController::class)->group(function () {
                Route::get('list', 'list')->name('expenseTypeList');
                Route::get('create', 'create')->name('expenseTypeCreate');
                Route::post('create', 'store')->name('expenseTypeStore');

                Route::prefix('{expense_category_id}')->group(function () {
                    Route::get('edit', 'edit')->name('expenseTypeEdit');
                    Route::put('update', 'update')->name('expenseTypeUpdate');
                    Route::delete('delete', 'destroy')->name('expenseTypeDelete');
                });
            });
        });
    });
});
