<?php

Route::get('/register','AuthController@register')->name('register');
Route::post('/register','AuthController@postregister')->name('postregister');
Route::get('/','AuthController@index')->name('login');
Route::post('/','AuthController@login')->name('postlogin');
Route::get('/insta','DashboardController@instagram');
Route::get('/test','DashboardController@test');
Route::post('/test','DashboardController@test')->name('test');
Route::get('/mandiri','DashboardController@mandiri');
Route::get('/coba','DashboardController@editdata');
Route::get('/tanggal','DashboardController@tanggal');
Route::post('/tanggal','DashboardController@postanggal')->name('post');

    Route::group([
        'prefix'        => 'admin',
        'middleware'    => 'auth'

    ], function () {
        Route::get('/{id}/laporan','DashboardController@laporan')->name('laporan');
        Route::get('/tesdata','DashboardController@getData');
        Route::post('/fetchdata','DashboardController@fetchdata')->name('fetch');
        Route::get('/delete','DashboardController@deletedata')->name('delete');
        Route::post('/newdata','DashboardController@insertdata')->name('addnew');
        Route::post('/hitung','DashboardController@rasio')->name('hitung');
        Route::get('/fetch','DashboardController@fetchRasio');
        Route::post('/fetch','DashboardController@fetchRasio')->name('fetchRasio');
        Route::get('/test','DashboardController@test');
        Route::get('/email','DashboardController@getValid');
        Route::get('/datavalid','DashboardController@getValid')->name('datavalid');
        Route::get('/data','DashboardController@indexdata')->name('data');
        Route::get('/logout','AuthController@logout')->name('logout');
        Route::resource('dashboard','DashboardController');

    });


