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

Route::get('/', 'ManifestController@index');

Route::post('manifests', 'ManifestController@store')->name('manifests.store');
Route::get('manifests', 'ManifestController@index');

Route::post('manifests-vehicle', 'ManifestController@vehicle')->name('manifests.vehicle');
Route::get('manifests-vehicle', 'ManifestController@index');

Route::post('manifests-driver', 'ManifestController@driver')->name('manifests.driver');
Route::get('manifests-driver', 'ManifestController@index');

Route::post('manifests-route', 'ManifestController@route')->name('manifests.route');
Route::get('manifests-route', 'ManifestController@index');

Route::post('manifests-customer', 'ManifestController@customer')->name('manifests.customer');
Route::get('manifests-customer', 'ManifestController@index');

Route::post('manifests-empty', 'ManifestController@empty')->name('manifests.empty');
Route::get('manifests-empty', 'ManifestController@index');