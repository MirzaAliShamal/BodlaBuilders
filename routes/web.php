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

require __DIR__.'/auth.php';

Route::get('/', 'HomeController@home')->name('home');
Route::get('/latest-news/{slug?}', 'HomeController@news')->name('news');
Route::get('/latest-blogs/{slug?}', 'HomeController@blogs')->name('blogs');
Route::get('/latest-vlogs', 'HomeController@vlogs')->name('vlogs');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/bodla-pvt', 'HomeController@bodlaPVT')->name('bodla.pvt');
Route::get('/bodla-developers', 'HomeController@bodlaDevelopers')->name('bodla.developers');
Route::get('/calculator', 'HomeController@calculator')->name('calculator');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact-post', 'HomeController@contactPost')->name('contact.post');

Route::get('/get-project-floors', 'HomeController@getProjectFloor')->name('get.project.floors');
Route::get('/get-project-amount', 'HomeController@getProjectAmount')->name('get.project.amount');

// Admin Un Authenticated Routes
Route::get('/admin/login', 'Auth\AuthenticatedSessionController@showAdminLoginForm')->name('admin.login');

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth', 'admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/contact-queries', 'DashboardController@contactQuery')->name('contact.queries');
    Route::get('/registerd-users', 'DashboardController@registerdUsers')->name('registered.users');
    Route::get('/registerd-user-delete', 'DashboardController@registerdUserDelete')->name('registered.user.delete');

    Route::prefix('project')->name('project.')->group(function() {
        Route::get('/list', 'ProjectController@list')->name('list');
        Route::get('/add', 'ProjectController@add')->name('add');
        Route::get('/edit/{id?}', 'ProjectController@edit')->name('edit');
        Route::post('/save/{id?}', 'ProjectController@save')->name('save');
        Route::get('/delete/{id?}', 'ProjectController@delete')->name('delete');
    });

    Route::prefix('project_type')->name('project_type.')->group(function() {
        Route::get('/list', 'ProjectTypeController@list')->name('list');
        Route::get('/add', 'ProjectTypeController@add')->name('add');
        Route::get('/edit/{id?}', 'ProjectTypeController@edit')->name('edit');
        Route::post('/save/{id?}', 'ProjectTypeController@save')->name('save');
        Route::get('/delete/{id?}', 'ProjectTypeController@delete')->name('delete');
    });

    Route::prefix('project_subtype')->name('project_subtype.')->group(function() {
        Route::get('/list', 'ProjectSubTypeController@list')->name('list');
        Route::get('/add', 'ProjectSubTypeController@add')->name('add');
        Route::get('/edit/{id?}', 'ProjectSubTypeController@edit')->name('edit');
        Route::post('/save/{id?}', 'ProjectSubTypeController@save')->name('save');
        Route::get('/delete/{id?}', 'ProjectSubTypeController@delete')->name('delete');
    });

    Route::prefix('floor')->name('floor.')->group(function() {
        Route::get('/list', 'FloorController@list')->name('list');
        Route::get('/add', 'FloorController@add')->name('add');
        Route::get('/edit/{id?}', 'FloorController@edit')->name('edit');
        Route::post('/save/{id?}', 'FloorController@save')->name('save');
        Route::get('/delete/{id?}', 'FloorController@delete')->name('delete');
    });

    Route::prefix('property')->name('property.')->group(function() {
        Route::get('/list', 'PropertyController@list')->name('list');
        Route::get('/add', 'PropertyController@add')->name('add');
        Route::get('/edit/{id?}', 'PropertyController@edit')->name('edit');
        Route::post('/save/{id?}', 'PropertyController@save')->name('save');
        Route::get('/delete/{id?}', 'PropertyController@delete')->name('delete');
        Route::get('/get-types', 'PropertyController@getTypes')->name('get.types');
        Route::get('/get-subtypes', 'PropertyController@getSubTypes')->name('get.subtypes');
    });

    Route::prefix('dha')->name('dha.')->group(function() {
        Route::get('/list', 'DHAPropertyController@list')->name('list');
        Route::get('/add', 'DHAPropertyController@add')->name('add');
        Route::get('/edit/{id?}', 'DHAPropertyController@edit')->name('edit');
        Route::post('/save/{id?}', 'DHAPropertyController@save')->name('save');
        Route::get('/delete/{id?}', 'DHAPropertyController@delete')->name('delete');
    });

    Route::prefix('bodla-pvt-team')->name('pvt.team.')->group(function() {
        Route::get('/list', 'BodlaPvtTeamController@list')->name('list');
        Route::get('/add', 'BodlaPvtTeamController@add')->name('add');
        Route::get('/edit/{id?}', 'BodlaPvtTeamController@edit')->name('edit');
        Route::post('/save/{id?}', 'BodlaPvtTeamController@save')->name('save');
        Route::get('/delete/{id?}', 'BodlaPvtTeamController@delete')->name('delete');
    });

    Route::prefix('bodla-developer-team')->name('developer.team.')->group(function() {
        Route::get('/list', 'BodlaDeveloperTeamController@list')->name('list');
        Route::get('/add', 'BodlaDeveloperTeamController@add')->name('add');
        Route::get('/edit/{id?}', 'BodlaDeveloperTeamController@edit')->name('edit');
        Route::post('/save/{id?}', 'BodlaDeveloperTeamController@save')->name('save');
        Route::get('/delete/{id?}', 'BodlaDeveloperTeamController@delete')->name('delete');
    });

    Route::prefix('news')->name('news.')->group(function() {
        Route::get('/list', 'NewsController@list')->name('list');
        Route::get('/add', 'NewsController@add')->name('add');
        Route::get('/edit/{id?}', 'NewsController@edit')->name('edit');
        Route::post('/save/{id?}', 'NewsController@save')->name('save');
        Route::get('/delete/{id?}', 'NewsController@delete')->name('delete');
    });

    Route::prefix('blog')->name('blog.')->group(function() {
        Route::get('/list', 'BlogController@list')->name('list');
        Route::get('/add', 'BlogController@add')->name('add');
        Route::get('/edit/{id?}', 'BlogController@edit')->name('edit');
        Route::post('/save/{id?}', 'BlogController@save')->name('save');
        Route::get('/delete/{id?}', 'BlogController@delete')->name('delete');
    });

    Route::prefix('vlog')->name('vlog.')->group(function() {
        Route::get('/list', 'VlogController@list')->name('list');
        Route::get('/add', 'VlogController@add')->name('add');
        Route::get('/edit/{id?}', 'VlogController@edit')->name('edit');
        Route::post('/save/{id?}', 'VlogController@save')->name('save');
        Route::get('/delete/{id?}', 'VlogController@delete')->name('delete');
    });

    Route::prefix('gallery')->name('gallery.')->group(function() {
        Route::get('/list', 'GalleryController@list')->name('list');
        Route::get('/add', 'GalleryController@add')->name('add');
        Route::get('/edit/{id?}', 'GalleryController@edit')->name('edit');
        Route::post('/save/{id?}', 'GalleryController@save')->name('save');
        Route::get('/delete/{id?}', 'GalleryController@delete')->name('delete');
    });

    Route::prefix('map')->name('map.')->group(function() {
        Route::get('/list', 'MapController@list')->name('list');
        Route::get('/add', 'MapController@add')->name('add');
        Route::get('/edit/{id?}', 'MapController@edit')->name('edit');
        Route::post('/save/{id?}', 'MapController@save')->name('save');
        Route::get('/delete/{id?}', 'MapController@delete')->name('delete');
    });
});
