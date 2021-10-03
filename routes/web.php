<?php

use App\Http\Controllers\BanksController;
use App\Http\Controllers\Customers_Report;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\Invoices_Report;
use App\Http\Controllers\InvoicesAttachementsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Banks;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::resource('invoices', InvoicesController::class);
Route::resource('banks', BanksController::class);
Route::resource('products', ProductsController::class);

Route::get('/bank/{id}', [InvoicesController::class, 'getproducts']);

Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, 'edit']);
Route::delete('delete_file', [InvoicesDetailsController::class, 'destroy'])->name('delete_file');
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file']);
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'download_file']);

Route::resource('InvoiceAttachments', InvoicesAttachementsController::class);

Route::get('/Status_show/{id}', [InvoicesController::class, 'show'])->name('Status_show');
Route::post('/Status_Update/{id}',  [InvoicesController::class, 'Status_Update'])->name('Status_Update');

Route::get('Invoice_Paid',[InvoicesController::class, 'Invoice_Paid']);
Route::get('Invoice_unPaid',[InvoicesController::class, 'Invoice_unPaid']);
Route::get('Invoice_Partial',[InvoicesController::class, 'Invoice_Partial']);

Route::get('Print_invoice/{id}', [InvoicesController::class, 'Print_invoice']);
Route::resource('Archive', InvoiceAchiveController::class);

Route::resource('invoices_report', Invoices_Report::class);
Route::post('Search_invoices', [Invoices_Report::class, 'Search_invoices']);
Route::get('customers_report', [Invoices_Report::class, 'Search_invoices']);
Route::get('customers_report', [Customers_Report::class, 'index'])->name("customers_report");
Route::post('Search_customers', [Customers_Report::class, 'Search_customers']);
Route::middleware(['auth:sanctum', 'verified', 'CheckStatus'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    
    Route::resource('users', UserController::class);
    
    });
        