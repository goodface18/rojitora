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

// Route::get('/', function () {
//     return view('welcome');
// });

//home page

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');


Route::get('/register', function(){
    return view('pages.register');
});




Route::get('/membership','MembersController@membership');

Route::get('/corpInfo', function(){
    return view('pages/corpInfo');
});
Route::get('/using', function(){
    return view('pages/using');
});
Route::get('/question_answer', function(){
    return view('pages/question_answer');
});
// Route::get('/contact', function(){
//     return view('pages/contact');
// });

//forget pasword
Route::get('/forget', 'MembersController@forget')->middleware('guest');
Route::post('/forget', 'MembersController@resetPassword')->middleware('guest');

//register member
Route::post('/register', 'AuthController@register');
Route::get('/memberedit', 'MembersController@edit')->name('memberedit')->middleware('auth');
Route::post('/memberedit', 'MembersController@update')->name('memberedit')->middleware('auth');
Route::get('/memberedit_old', 'MembersController@memberedit_old')->name('memberedit_old');

//Check register
Route::get('/register_check/{member_id}', 'Auth\RegisterController@register_check');


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');

//Manage Luggages
Route::get('/luggage_edit','LuggagesController@edit')->middleware('auth');
Route::post('/luggage_edit','LuggagesController@pageNum_get')->middleware('auth');
Route::get('/luggage_search','LuggagesController@index');
Route::get('/luggage_create','LuggagesController@create')->middleware('auth');
Route::post('/luggage_store','LuggagesController@store')->middleware('auth');
Route::get('/luggage_info','LuggagesController@show')->name('luggage_info');
Route::post('/luggage_info','LuggagesController@show')->name('luggage_info');
Route::get('/luggage_search/info','LuggagesController@search');
Route::post('/luggage_search/info','LuggagesController@search');
Route::post('/luggage_simple_search','LuggagesController@simple_search');
Route::get('/luggage/{id}/delete','LuggagesController@destroy')->name('luggages.destroy')->middleware('auth');
Route::get('/luggage/{id}/edit','LuggagesController@edit_table')->middleware('auth');
Route::post('/luggage/{id}/update','LuggagesController@update')->middleware('auth');
Route::get('/luggage/all_delete', 'LuggagesController@destroy_all')->middleware('auth');
Route::post('/luggage_table/{id}/update', 'LuggagesController@luggageTableUpdate')->middleware('auth');

//Manage Emptytrucks
Route::get('/emptyTruck_edit','EmptycarsController@edit')->middleware('auth');
Route::get('/emptyTruck_search','EmptycarsController@index');
Route::get('/emtpyTruck_create','EmptycarsController@create')->middleware('auth');
Route::post('/emptyTruck_store','EmptycarsController@store')->middleware('auth');
Route::get('/emptyTruck_info','EmptycarsController@show');
Route::post('/emptyTruck_info','EmptycarsController@show_per_num');
// Route::post('/emptyTruck_info_edit','EmptycarsController@show_per_num');

Route::get('/emptyTruck_search/info','EmptycarsController@search');
Route::post('/emptyTruck_search/info','EmptycarsController@search');
Route::post('/simpleTruck_search','EmptycarsController@simpleTruck_search');
Route::get('/emptyTruck_edit', 'EmptycarsController@edit')->middleware('auth');
Route::post('/emptyTruck_edit','EmptycarsController@pageNum_get')->middleware('auth');
Route::get('/emptyTruck/{id}/edit', 'EmptycarsController@edit_table')->middleware('auth');
Route::post('/emptyTruck/{id}/update', 'EmptycarsController@update')->middleware('auth');
Route::get('/emptyTruck/{id}/delete','EmptycarsController@destroy')->middleware('auth');
Route::get('/emptyTruck/all_delete','EmptycarsController@destroy_all')->middleware('auth');
Route::get('/','Auth\LoginController@showLoginForm')->name('login.show');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.show');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.show');
Route::get('/admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.show');
Route::post('admin/login', 'AdminAuth\LoginController@login')->name('admin.login');
Route::post('admin/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/dashboard',"AdminController@index" )->name('admin.dashboard')->middleware('admin');
    Route::get('/home',"AdminController@index" )->name('admin.dashboard')->middleware('admin');
    Route::post('change-password','AdminController@saveResetPassword')->name('change.password');
    Route::get('/employee','UserController@index' )->name('employee.list')->middleware('admin');
    Route::put('/employee/update-employee/{id}','UserController@employeeUpdate' )->name('employee.update')->middleware('admin');
    Route::get('/employee-delete/{id}','UserController@employeeDestroy' )->name('employee.delete')->middleware('admin');
    Route::get('/emptycar','EmptycarsController@emptycarList' )->name('emptycar.list')->middleware('admin');
    Route::get('/emptycar-delete/{id}','EmptycarsController@emptycarDestroy')->name('emptycar.delete')->middleware('admin');
    Route::get('/luggage', 'LuggagesController@luggageList')->name('luggage.list')->middleware('admin');
    Route::get('/luggage-delete/{id}','LuggagesController@luggageDestroy')->name('luggage.delete')->middleware('admin');
    Route::post('/employee/search', 'UserController@adminSearch')->name('employee.search')->middleware('admin');
    Route::get('/employee/search', 'UserController@adminSearch')->name('employee.search')->middleware('admin');
    Route::post('/emptycar/search', 'EmptycarsController@adminSearch')->name('emptycar.search')->middleware('admin');
    Route::get('/emptycar/search', 'EmptycarsController@adminSearch')->name('emptycar.search')->middleware('admin');
    Route::put('/emptycar/update-emptycar/{id}','EmptycarsController@emptycarUpdate' )->name('emptycar.update')->middleware('admin');
    Route::post('/luggage/search', 'LuggagesController@adminSearch')->name('luggage.search')->middleware('admin');
    Route::get('/luggage/search', 'LuggagesController@adminSearch')->name('luggage.search')->middleware('admin');
    Route::put('/luggage/update-luggage/{id}','LuggagesController@luggageUpdate' )->name('luggage.update')->middleware('admin');
});
