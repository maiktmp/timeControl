<?php

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
})->name('home')->middleware('auth', 'web');

Route::view('/login',
    'login'
)->middleware('guest')
    ->name('login');

Route::post('login/auth',
    'Auth\LoginController@authenticate')
    ->name('login.auth');

Route::get(
    '/logout',
    'Auth\LoginController@logout'
)->name('logout');

/*
 **********************************
 *          Groups
 * *******************************
 */
Route::get(
    '/groups',
    'GroupController@index'
)->name('group_index');

Route::view(
    'group/create',
    'group.create'
)->name("group_create");

Route::post(
    'group/create',
    'GroupController@createPost'
)->name("group_create_post");

Route::get(
    '/group/{groupId}/update',
    'GroupController@update'
)->name('group_update');