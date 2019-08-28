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
	if(Auth::user()){
		$users = App\user::all();
		return view('welcome',compact('users'));
	}
    return view('welcome');
});
Auth::routes();
//	Controller admin
Route::group(['middleware'=>'auth','checkRole:admin'],function(){

Route::get('/siswa', 'SiswaController@index');
Route::post('/siswa/create','SiswaController@create');
Route::get('/siswa/{siswa}/edit','SiswaController@edit');
Route::post('/siswa/{siswa}/update','SiswaController@update');
Route::get('/siswa/{siswa}/delete','SiswaController@delete');
Route::get('/siswa/{siswa}/profile','SiswaController@profile');
Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
Route::get('/siswa/{id}/nilaisiswa','SiswaController@nilaisiswa');
Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');

Route::get('/guru','GuruController@index');
Route::post('/guru/create','GuruController@create');
Route::get('/guru/{guru}/edit','GuruController@edit');
Route::post('/guru/{guru}/update','GuruController@update');
Route::get('/guru/{guru}/delete','GuruController@delete');
});
    //categorys
Route::resource('category','CategoryController');
    //konten
Route::resource('konten','KontenController');

//Controller admin,siswa,guru
Route::group(['middleware'=>'auth','checkRole:admin,siswa,guru'],function(){
Route::get('/home', 'HomeController@index')->name('home');
//siswa
Route::get('/siswa/{id}/nilaisiswa','SiswaController@nilaisiswa');
Route::get('/profilesiswa', 'ProfileController@profilesiswa');
Route::get('/editsiswa/{siswa}','ProfileController@editsiswa');
Route::post('/updatesiswa/{siswa}','ProfileController@updatesiswa');
//guru
Route::get('/myprofile', 'ProfileController@profileguru');
Route::get('/guru/{guru}','ProfileController@editguru');
Route::post('/updateguru/{guru}','ProfileController@updateguru');

//paswword
Route::get('/changePassword','Auth\AuthController@change')->name('change');
Route::post('/changePassword','Auth\AuthController@updatePassword')->name('password.update');

});


Route::get('/logout','AuthController@logout');
