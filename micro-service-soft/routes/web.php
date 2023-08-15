<?php

use App\Http\Controllers\DepositeController;
use App\Http\Controllers\LoanapplicationController;
use App\Http\Controllers\LoanProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\microsoft\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WithdrawnController;

use App\Http\Controllers\BranchController;
use App\Http\Controllers\Expense_categoryController;
use App\Http\Controllers\Expense_ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminController::class, 'dash']);



//admin

Route::resource("deposite", DepositeController::class);
Route::resource("withdrawn", WithdrawnController::class);
Route::resource("report", ReportController::class);


//ajax call
Route::post('/getmember', [WithdrawnController::class, 'getmember'])->name('getmember');

//nasim
Route::get('/loanform', [LoanapplicationController::class, 'getPro'])->name('loanform');
Route::get('/pending_loan', [LoanapplicationController::class, 'pending'])->name('pendingloan');
Route::get('/approved_loan', [LoanapplicationController::class, 'approved'])->name('approvedloan');
// Route::get('/calculator', [LoanapplicationController::class, 'loanCalculator'])->name('loanCalculator');

Route::get('/calculator', function () {
    return view('loanApplication.loanCalculator');
});
Route::post('/calculate_loan', [LoanapplicationController::class, 'loanCalculate'])->name('loanCalculate');
Route::resource('loans', LoanapplicationController::class);
Route::resource('loan_products', LoanProductController::class);

// rubel
Route::resource("branch", BranchController::class);
Route::resource("member", MemberController::class)->names('member');
Route::resource("user", UserController::class)->names('user');
Route::resource("expense", ExpenseController::class)->names('expense');
Route::resource("expense_category", Expense_categoryController::class)->names('expense_category');

// report generate

route::get('/expensereport/filter', [Expense_ReportController::class, 'filter'])->name('exp.filter');
