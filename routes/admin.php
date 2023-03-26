<?php

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


use Illuminate\Support\Facades\Route;
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
Route::middleware("auth:admin")->group(function() {
    Route::get('/admin', [\App\Http\Controllers\Admin\AuthController::class, 'main'])->name('main');
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});

