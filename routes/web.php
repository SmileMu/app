
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/a', function () {
    return view('auth.login');
});

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('invoices', 'InvoicesController');
//
//Route::resource('sections', 'SectionsController');
//
//Route::resource('products', 'ProductsController');
//
//Route::resource('InvoiceAttachments', 'InvoiceAttachmentsController');
//
////Route::resource('InvoicesDetails', 'InvoicesDetailsController');
//
//Route::get('/section/{id}', 'InvoicesController@getproducts');
//
//Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@edit');
//
//Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');
//
//Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');
//
//Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');
//
//Route::get('/edit_invoice/{id}', 'InvoicesController@edit');
//
//Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');
//
//Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');
//
//Route::resource('Archive', 'InvoiceAchiveController');
//
//Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');
//
//Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');
//
//Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');
//
//Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');
//
//Route::get('export_invoices', 'InvoicesController@export');
//
Route::group(['middleware' => ['auth']], function() {

//Route::resource('roles','RoleController');

Route::resource('users','UserController');


    ########################################## Expenses route ##########################################
    Route::group(['prefix' => 'expenses' , 'middleware' => 'can:expense'], function () {
        Route::get('/', 'ExpensesController@index')->name('expenses');
        Route::get('create', 'ExpensesController@create')->name('expenses.create');
        Route::post('store', 'ExpensesController@store')->name('expenses.store');
        Route::get('edit/{id}', 'ExpensesController@edit')->name('expenses.edit');
        Route::post('update', 'ExpensesController@update')->name('expenses.update');
        Route::post('delete', 'ExpensesController@destroy')->name('expenses.delete');
        Route::get('outcame', 'ExpensesController@outcame')->name('expenses.outcame');

    });
    #########################################  end Expenses route #######################################

    ######################################## inistitution type routes  ########################################
    Route::group(['prefix' => 'types'], function () {
        Route::get('/', 'TypeController@index')->name('types');
        Route::get('create', 'TypeController@create')->name('types.create');
        Route::get('print', 'TypeController@print')->name('types.print');
        Route::post('store', 'TypeController@store')->name('types.store');
        Route::get('edit/{id}', 'TypeController@edit')->name('types.edit');
        Route::post('update', 'TypeController@update')->name('types.update');
        Route::get('delete/{id}', 'TypeController@destroy')->name('types.delete');

    });
    ######################################## end inistitution type routes  ########################################

    ######################################## inistitution setions routes  ########################################
    Route::group(['prefix' => 'setions'], function () {
        Route::get('/', 'SectiontController@index')->name('setions');
        Route::get('create', 'SectiontController@create')->name('setions.create');
        Route::get('print', 'SectiontController@print')->name('setions.print');
        Route::post('store', 'SectiontController@store')->name('setions.store');
        Route::get('edit/{id}', 'SectiontController@edit')->name('setions.edit');
        Route::post('update', 'SectiontController@update')->name('setions.update');
        Route::get('delete/{id}', 'SectiontController@destroy')->name('setions.delete');

    });
    ######################################## end inistitution setions routes  ########################################


    ######################################## inistitution  routes  ########################################
    Route::group(['prefix' => 'institutions'], function () {
        Route::get('/', 'InstitutionController@index')->name('institutions');
        Route::get('create', 'InstitutionController@create')->name('institutions.create');
        Route::get('print', 'InstitutionController@print')->name('institutions.print');
        Route::post('store', 'InstitutionController@store')->name('institutions.store');
        Route::get('edit/{id}', 'InstitutionController@edit')->name('institutions.edit');
        Route::post('update', 'InstitutionController@update')->name('institutions.update');
        Route::get('delete/{id}', 'InstitutionController@destroy')->name('institutions.delete');

    });
    ######################################## end inistitution  routes  ########################################





    ######################################## employee routes  ########################################
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', 'EmployeeController@index')->name('employees');
        Route::get('create', 'EmployeeController@create')->name('employees.create');
        Route::get('print', 'EmployeeController@print')->name('employees.print');
        Route::post('store', 'EmployeeController@store')->name('employees.store');
        Route::get('edit/{id}', 'EmployeeController@edit')->name('employees.edit');
        Route::post('update', 'EmployeeController@update')->name('employees.update');
        Route::get('delete/{id}', 'EmployeeController@destroy')->name('employees.delete');

    });
    ######################################## end employee routes  ########################################






});
//
//Route::get('invoices_report', 'Invoices_Report@index');
//
//Route::post('Search_invoices', 'Invoices_Report@Search_invoices');
//
//Route::get('customers_report', 'Customers_Report@index')->name("customers_report");
//
//Route::post('Search_customers', 'Customers_Report@Search_customers');
//
Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('unreadNotifications_count', 'InvoicesController@unreadNotifications_count')->name('unreadNotifications_count');

Route::get('unreadNotifications', 'InvoicesController@unreadNotifications')->name('unreadNotifications');


Route::get('/{page}', 'AdminController@index');
