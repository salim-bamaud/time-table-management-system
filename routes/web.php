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

################################### this route is just for testing #####################
Route::get('/test', [App\Http\Controllers\ForTraining::class, 'show_courses'])->name('show.courses');


################################### Rooms routes #######################
Route::prefix('rooms')->group(function () {
    Route::get('create','App\Http\Controllers\RoomsController@create')->name('rooms.create');;
    Route::post('store','App\Http\Controllers\RoomsController@store')->name('rooms.store');
    Route::get('show','App\Http\Controllers\RoomsController@show')->name('rooms.show');
    Route::get('edit/{id}','App\Http\Controllers\RoomsController@edit')->name('rooms.edit');
    Route::post('update/{id}','App\Http\Controllers\RoomsController@update')->name('rooms.update');
    Route::get('delete/{id}','App\Http\Controllers\RoomsController@delete')->name('rooms.delete');

});
################################## end Rooms routes #################### 
################################### Departments routes #######################
Route::prefix('departments')->group(function () {
    Route::get('create','App\Http\Controllers\DepartmentsController@create')->name('departments.create');;
    Route::post('store','App\Http\Controllers\DepartmentsController@store')->name('departments.store');
    Route::get('show','App\Http\Controllers\DepartmentsController@show')->name('departments.show');
    Route::get('edit/{id}','App\Http\Controllers\DepartmentsController@edit')->name('departments.edit');
    Route::post('update/{id}','App\Http\Controllers\DepartmentsController@update')->name('departments.update');
    Route::get('delete/{id}','App\Http\Controllers\DepartmentsController@delete')->name('departments.delete');

});
################################## end Departments routes #################### 
################################### Levels routes #######################
Route::prefix('levels')->group(function () {
    Route::get('create','App\Http\Controllers\LevelsController@create')->name('levels.create');;
    Route::post('store','App\Http\Controllers\LevelsController@store')->name('levels.store');
    Route::get('show','App\Http\Controllers\LevelsController@show')->name('levels.show');
    Route::get('edit/{id}','App\Http\Controllers\LevelsController@edit')->name('levels.edit');
    Route::post('update/{id}','App\Http\Controllers\LevelsController@update')->name('levels.update');
    Route::get('delete/{id}','App\Http\Controllers\LevelsController@delete')->name('levels.delete');

});
################################## end Levels routes ####################
################################### Lecturers routes #######################
Route::prefix('lecturers')->group(function () {
    Route::get('create','App\Http\Controllers\LecturersController@create')->name('lecturers.create');;
    Route::post('store','App\Http\Controllers\LecturersController@store')->name('lecturers.store');
    Route::get('show','App\Http\Controllers\LecturersController@show')->name('lecturers.show');
    Route::get('edit/{id}','App\Http\Controllers\LecturersController@edit')->name('lecturers.edit');
    Route::post('update/{id}','App\Http\Controllers\LecturersController@update')->name('lecturers.update');
    Route::get('delete/{id}','App\Http\Controllers\LecturersController@delete')->name('lecturers.delete');

});
################################## end Lecturers routes #################### 
################################### Courses routes #######################
Route::prefix('courses')->group(function () {
    Route::get('create','App\Http\Controllers\CoursesController@create')->name('courses.create');;
    Route::post('store','App\Http\Controllers\CoursesController@store')->name('courses.store');
    Route::get('show','App\Http\Controllers\CoursesController@show')->name('courses.show');
    Route::get('edit/{id}','App\Http\Controllers\CoursesController@edit')->name('courses.edit');
    Route::post('update/{id}','App\Http\Controllers\CoursesController@update')->name('courses.update');
    Route::get('delete/{id}','App\Http\Controllers\CoursesController@delete')->name('courses.delete');

});
################################## end Courses routes #################### 
