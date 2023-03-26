<?php

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

Route::GET('/ShowUnitedTable', 'MainController@ShowUnitedTable','ShowUnitedTable');
Route::GET('/GetTableData', 'MainController@GetTableData','GetTableData');
Route::POST('/DeleteDataONE', 'MainController@DeleteDataONE','DeleteDataONE');
Route::POST('/DeleteDataALL', 'MainController@DeleteDataALL','DeleteDataALL');
Route::post('/ChangeData','MainController@ChangeData','ChangeData');
Route::post('/ExportReport','MainController@ExportReport','ExportReport');
Route::post('/ExportReportSelection','MainController@ExportReportSelection','ExportReportSelection');
Route::post('/ExportReportBranches','MainController@ExportReportBranches','ExportReportBranches');
Route::post('/ExportReportBranchesSelection','MainController@ExportReportBranchesSelection','ExportReportBranchesSelection');
Route::get('/GetDownload', 'MainController@GetDownload')->name('GetDownload');



Route::middleware("auth")->group(function(){
    Route::get('/', 'MainController@main')->name('home');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::middleware("guest")->group(function(){
    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login_process', 'AuthController@login')->name('login_process');

    Route::get('/register', 'AuthController@showRegisterForm')->name('register');
    Route::post('/register_process', 'AuthController@register')->name('register_process');

    Route::get('/forgot', 'AuthController@showForgotForm')->name('forgot');
    Route::post('/forgot_process', 'AuthController@forgot')->name('forgot_process');
});





