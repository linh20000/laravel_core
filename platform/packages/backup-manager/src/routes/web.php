<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'web'], function () {
    Route::get('backup', '\Tungnt\BackupManager\app\Http\Controllers\BackupHomeController@index')->name('backup.index');
    Route::post('createBackup', '\Tungnt\BackupManager\app\Http\Controllers\BackupHomeController@createBackup')->name('backup.create');
    Route::get('backupDownload', '\Tungnt\BackupManager\app\Http\Controllers\BackupHomeController@download')->name('backup.download');
    Route::get('backupDelete', '\Tungnt\BackupManager\app\Http\Controllers\BackupHomeController@delete')->name('backup.delete');
});
