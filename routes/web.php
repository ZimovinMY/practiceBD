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

Route::GET('/', 'MainController@main');
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

/*Route::name('user.')->group(function(){
    Route::view('/private','private')->middleware('auth')->name('private');
    Route::get('/login',function(){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    //Route::post('/login',[]);

    //Route::get('/logout')->name('logout');

    Route::get('/registration',function(){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    //Route::post('/registration',[]);
}); /*
