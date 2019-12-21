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

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();


Route::post('/contact_desk', 'MailusController@prepMail');

Route::get('/id', 'UserController@unid');
Route::get('/unid', 'UserController@unidid');
Route::get('/synergy-desk', 'HomeController@adminlogin')->name('admin.login')->middleware('access');
Route::post('/synergy-desk/signin', 'UserController@signin')->name('admin.signin');
Route::post('/synergy-desk/logout', 'UserController@logout')->name('admin.logout');
Route::get('/synergy-desk/forgotpass', 'UserController@lostpass')->name('password.request');
Route::post('/synergy-desk/passwordmail', 'UserController@passreset')->name('password.email');
Route::post('/synergy-desk/password/reset/{token}', 'UserController@passwordRectify')->name('password.resetter');
Route::get('/synergy-desk/mailtoken/password/{token}', 'UserController@PasswordReset')->name('email.resetpassword');


//all routes for the admin
Route::group(['middleware'=>'admin'], function () {
    Route::prefix('console')->group(function () {
        Route::get('dashboard', 'ConsoleController@dashboard')->name('admin.dashboard');
        Route::resource('servic', 'ServicController');
        Route::resource('admin', 'AdminController');
        Route::resource('client', 'ClientController');
        Route::resource('synergy', 'SynergyController');
        Route::resource('visits', 'VisitController');
        Route::resource('blog', 'BlogController');
        Route::resource('category', 'CategoryController');
        Route::resource('quote', 'QuoteController');
        Route::resource('project', 'ProjectController');


        Route::get('blog/{blog}/publish', 'BlogController@publish')->name('blog.publish');
        Route::get('blog/{blog}/unpublish', 'BlogController@unpublish')->name('blog.unpublish');

        Route::get('admin/profile/{id}', 'AdminController@profile')->name('admin.profile');

        Route::get('notification/{key}', 'ConsoleController@viewAlert')->name('view.route');

        Route::get('team/assign/{id}', 'TeamController@create')->name('team.create');

        Route::post('team/build/{id}', 'TeamController@store')->name('team.build');

        Route::get('client/assign/{id}', 'ClientController@assign')->name('client.assign');

        Route::post('client/build/{id}', 'ClientController@projectBuild')->name('client.build');



    });
});


//all routes for the front
Route::group(['middleware'=>'hits'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/publications', 'HomeController@blog')->name('home.blog');
    Route::get('/publications/{slug}', 'HomeController@blogShow')->name('home.blog.show');
    Route::get('/publications/tags/{tag}', 'HomeController@blogTag')->name('article.tag');
    Route::get('/services/{url}', 'HomeController@services')->name('home.service');

    Route::get('/place-quote', 'HomeController@quotes')->name('home.quote');
    Route::post('/store-quote', 'QuoteController@store')->name('quote.save');

});












//all routes for clients
Route::group(['middleware'=>'client'], function () {
    Route::prefix('client')->group(function () {

    });
});
