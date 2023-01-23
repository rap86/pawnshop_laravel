<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookInterestsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ItemInterestsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CustomerLogsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\TransactionPaymentsController;
use App\Http\Controllers\PtnumberLogsController;
use App\Http\Controllers\PrintsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});


Route::get('/customers/findpreview/{slave}/{master}', [CustomersController::class, 'findpreview'])->name('customers.findpreview');
Route::get('/customers/findcustomer', [CustomersController::class, 'findcustomer'])->name('customers.findcustomer');
Route::get('/customers/search', [CustomersController::class, 'search']);
Route::resource('/customers', CustomersController::class);


Route::resource('/customer_logs', CustomerLogsController::class);
Route::resource('/ptnumber_logs', PtnumberLogsController::class);

Route::get('/transactions/mergerecord', [TransactionsController::class, 'mergerecord']);
Route::get('/dashboard', [TransactionsController::class, 'dashboard'])->name('transactions.dashboard');
Route::get('/transactions/underauction', [TransactionsController::class, 'underauction'])->name('transactions.underauction');
Route::get('/transactions/outside', [TransactionsController::class, 'outside'])->name('transactions.outside');
Route::get('/transactions/granted', [TransactionsController::class, 'granted'])->name('transactions.granted');
Route::get('/transactions/collected', [TransactionsController::class, 'collected'])->name('transactions.collected');
Route::get('/transactions/create/{id}', [TransactionsController::class, 'create']);
Route::resource('/transactions', TransactionsController::class);

Route::resource('/users', UsersController::class);
Route::resource('/books', BooksController::class);
Route::resource('/items', ItemsController::class);
Route::resource('/book_interests', BookInterestsController::class);
Route::resource('/item_interests', ItemInterestsController::class);

Route::put('/transaction_payments/update_ptnumber/{id}', [TransactionPaymentsController::class, 'update_ptnumber'])->name('transaction_payments.update_ptnumber');
Route::get('/transaction_payments/ptsearch', [TransactionPaymentsController::class, 'ptsearch'])->name('transaction_payments.ptsearch');;
Route::resource('/transaction_payments', TransactionPaymentsController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/download_database', [App\Http\Controllers\HomeController::class, 'download_database'])->name('home.download_database');
Route::get('/dbdownload', [App\Http\Controllers\HomeController::class, 'dbdownload'])->name('home.dbdownload');

Route::get('/print_customer_log', [PrintsController::class, 'print_customer_log'])->name('prints.print_customer_log');
Route::get('/print_granted/{book_id}/{status}/{date_from}/{date_to}', [PrintsController::class, 'print_granted'])->name('prints.print_granted');
Route::get('/print_transaction', [PrintsController::class, 'print_transaction'])->name('prints.print_transaction');
