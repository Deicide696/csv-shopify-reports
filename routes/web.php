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
Route::post('manifests-vehicle', 'ManifestController@vehicle')->name('manifests.vehicle');
Route::post('manifests-driver', 'ManifestController@driver')->name('manifests.driver');
Route::post('manifests-route', 'ManifestController@route')->name('manifests.route');
Route::post('manifests-customer', 'ManifestController@customer')->name('manifests.customer');