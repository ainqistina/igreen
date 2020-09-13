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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sisa', 'SisaController@create')->name('sisa');
Route::post('/sisa', 'SisaController@store')->name('addsisa');

Route::get('/awam', 'AwamController@create')->name('awam');
Route::post('/awam', 'AwamController@store')->name('addawam');

Route::get('/taman', 'tamanController@create')->name('taman');
Route::post('/taman', 'tamanController@store')->name('addtaman');

Route::get('/jalan', 'jalanController@create')->name('jalan');
Route::post('/jalan', 'jalanController@store')->name('addjalan');

Route::get('/rekod', 'RekodController@create')->name('rekod');
Route::post('/rekod', 'RekodController@store')->name('addrekod');

Route::get('/taman/{id}', 'tamanController@edit')->name('taman.id');
Route::put('/taman/{id}', 'tamanController@update')->name('updateTaman.id');
Route::delete('/taman/{id}', 'tamanController@destroy')->name('deleteTaman.id');

Route::get('/jalan/{id}', 'jalanController@edit')->name('jalan.id');
Route::put('/jalan/{id}', 'jalanController@update')->name('updateJalan.id');
Route::delete('/jalan/{id}', 'jalanController@destroy')->name('deleteJalan.id');
Route::get('/jalantaman/{taman}', 'jalanController@detail');

Route::get('/cariSisa', 'SisaController@index')->name('cariSisa');
Route::get('/downloadPDF/{id}','SisaController@downloadPDF');
Route::get('sisaExport', 'SisaController@sisaExport')->name('sisaExport');

Route::get('/sisa/{id}', 'SisaController@edit')->name('sisa.id');
Route::put('/sisa/{id}', 'SisaController@update')->name('updateSisa.id');
Route::delete('/sisa/{id}', 'SisaController@destroy')->name('deleteSisa.id');

Route::get('/cariAwam', 'AwamController@index')->name('cariAwam');
Route::get('/downloadAwamPDF/{id}','AwamController@downloadAwamPDF');
Route::get('awamExport', 'AwamController@awamExport')->name('awamExport');

Route::get('/awam/{id}', 'AwamController@edit')->name('awam.id');
Route::put('/awam/{id}', 'AwamController@update')->name('updateAwam.id');
Route::delete('/awam/{id}', 'AwamController@destroy')->name('deleteAwam.id');

Route::get('/cariRekod', 'RekodController@index')->name('cariRekod');

Route::get('/rekod/{id}', 'RekodController@edit')->name('rekod.id');
Route::put('/rekod/{id}', 'RekodController@update')->name('updateRekod.id');
Route::delete('/rekod/{id}', 'RekodController@destroy')->name('deleteRekod.id');
