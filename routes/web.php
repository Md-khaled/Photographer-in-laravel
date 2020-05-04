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

Route::get('/hh', function () {
    //echo('sfdsfdsf');
   // return view('welcome');
    return view('photographer.home.land');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/sreach-by-location/{id}', 'HomeController@searchByLocation')->name('sreach-by-location');
/* Start admins route*/
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin','disablepreventback']],function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('/manage-photos', 'PhotoController');
    Route::resource('/manage-contactinfo', 'ContactInfoController');
    Route::get('profile', 'ContactInfoController@profile')->name('profile.index');
    Route::patch('profile/update/{id}', 'ContactInfoController@profileUpdate')->name('profile.update');
    Route::patch('profile/aboutMe/{id}', 'ContactInfoController@aboutMe')->name('profile.aboutMe');
    Route::patch('profile/changePassword/{id}', 'ContactInfoController@changePassword')->name('profile.changePassword');
    Route::resource('/manage-price', 'PriceController');
    Route::resource('/manage-district', 'DistrictController');
    Route::resource('/manage-users', 'ManageUserController');
    Route::resource('/manage-order', 'OrderController');
});
/* End admins route*/
/*Start user route*/
Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'User'], function() {
    Route::resource('/photographer', 'PhotographerController');
    Route::get('collection/{id}', 'PhotographerController@collection')->name('collection.show');
    Route::resource('/contact', 'ContactController');
    Route::get('/services', 'ContactController@services')->name('services.create');
    Route::get('/faq', 'ContactController@query')->name('faq.create');
    Route::group(['middleware'=>['auth']], function() {
    Route::post('review/{id}', 'PhotographerController@review_product')->name('ratings.show');
    Route::resource('/chat', 'ChatController');
    Route::post('chat_message/{id}', 'ChatController@chat_message')->name('chat_message.store');
    Route::get('chat_to_user/{id}', 'ChatController@chat_to_user')->name('chat_to_user.show');

});
});
