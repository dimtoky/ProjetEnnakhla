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
    return view('main');
})->name('main')->middleware('guest');;

//Auth::routes();
  // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
   // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
|--------------------------------------------------------------------------
| Routes Utilisateurs Connectés
|--------------------------------------------------------------------------
 */
Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'MenuController@logright');

Route::get('newUser', 'addUserController@create');

Route::post('newUser', 'addUserController@store');

Route::get('account', 'ClientController@getprofile');

Route::get('lClient','ClientController@getclients');

Route::post('modifyUser', 'ClientController@modifyclient');

Route::post('deleteUser', 'ClientController@deleteclient');

Route::get('lClient/{id}','ClientController@getclient');

Route::post('upload', 'UploadController@store');

Route::post('modifypassword', 'ClientController@modifypassword');

Route::post('getftpac', 'ClientController@getftp'); 

Route::get('addfiles','UploadController@create');
   
Route::get('validatef/{fname}','validationFilesController@create');

Route::post('validatef','validationFilesController@store');

Route::post('deleteValidation','validationFilesController@delete');

Route::get('contact', 'contactController@create');

Route::post('sendcontact', 'contactController@send');

});
/*
|--------------------------------------------------------------------------
 */






