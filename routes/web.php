<?php
//use Auth;
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
Route::model('user', App\User::class);
Route::model('student', App\Student::class);
Route::model('semister', App\Semister::class);

Route::middleware('auth')->group( function () {
    Route::redirect('/','/student');
    Route::redirect('/home','/student');
    Route::get('/student', 'HomeController@home');
    Route::get('/teacher', 'TeacherController@index');
    Route::get('/student/{student}', 'HomeController@index');
    Route::get('/profile/{user}','ProfileController@index')->name('profile');
    Route::get('/semister/{semister}', 'MarksController@get')->name('semister');
    Route::post('/semister/{semister}', 'MarksController@post');
});

Auth::routes();


