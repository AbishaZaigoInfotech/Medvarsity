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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/callback', [App\Http\Controllers\HomeController::class, 'callback'])->name('callback');

/** GOOGLE LOGIN ROUTE **/
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
Route::get('social/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);
/** GOOGLE LOGIN ROUTE **/

/** TOKEN GENERATION ROUTE **/
Route::get('/refreshtoken',[App\Http\Controllers\Auth\TokenGeneratorController::class, 'refreshToken'])->name('auth.refreshtoken');
/** TOKEN GENERATION ROUTE **/

/** CRM FRONTEND SECTION ROUTES **/
Route::group(['prefix' => 'crm'], function(){
    Route::get('index',[App\Http\Controllers\Frontend\CrmSettings\CrmSettingsController::class, 'index'])->name('crm.index');
    Route::get('edit',[App\Http\Controllers\Frontend\CrmSettings\CrmSettingsController::class, 'edit'])->name('crm.edit');
    Route::post('update',[App\Http\Controllers\Frontend\CrmSettings\CrmSettingsController::class, 'update'])->name('crm.update');
});
/** CRM FRONTEND SECTION ROUTES **/

/** CRM BACKEND SECTION ROUTES **/
Route::group(['prefix' => 'crm'], function(){
    Route::get('leads',[App\Http\Controllers\Backend\Crm\CrmController::class, 'getLeads'])->name('crm.lead');
    Route::get('activities',[App\Http\Controllers\Backend\Crm\CrmController::class, 'getActivities'])->name('crm.activity');
    Route::get('users',[App\Http\Controllers\Backend\Crm\CrmController::class, 'getUsers'])->name('crm.user');
});
/** CRM BACKEND SECTION ROUTES **/

/** CONVOX BACKEND SECTION ROUTES **/
Route::group(['prefix' => 'convox'], function(){
    Route::get('call',[App\Http\Controllers\Backend\Convox\ConvoxController::class, 'makeCalls'])->name('convox.call');
});
/** CONVOX BACKEND SECTION ROUTES **/

/** CONVOX FRONTEND SECTION ROUTES **/
Route::group(['prefix' => 'convox'], function(){
    Route::get('index',[App\Http\Controllers\Frontend\ConvoxSettings\ConvoxSettingsController::class, 'index'])->name('convox.index');
    Route::get('edit',[App\Http\Controllers\Frontend\ConvoxSettings\ConvoxSettingsController::class, 'edit'])->name('convox.edit');
    Route::post('update',[App\Http\Controllers\Frontend\ConvoxSettings\ConvoxSettingsController::class, 'update'])->name('convox.update');
});
/** CONVOX FRONTEND SECTION ROUTES **/

/** MAPPING FRONTEND SECTION ROUTES **/
Route::group(['prefix' => 'map'], function(){
    Route::get('index',[App\Http\Controllers\Frontend\CrmConvox\Mapping::class, 'index'])->name('map.index');
    Route::get('create',[App\Http\Controllers\Frontend\CrmConvox\Mapping::class, 'create'])->name('map.create');
    Route::post('store',[App\Http\Controllers\Frontend\CrmConvox\Mapping::class, 'store'])->name('map.store');
    Route::get('{id}/edit',[App\Http\Controllers\Frontend\CrmConvox\Mapping::class, 'edit'])->name('map.edit');
    Route::post('update',[App\Http\Controllers\Frontend\CrmConvox\Mapping::class, 'update'])->name('map.update');
});
/** MAPPING FRONTEND SECTION ROUTES **/