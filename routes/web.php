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


//Logic Home redirect by Makajikenduri
Route::get('/', function () {
	if(Auth::user()){
		return redirect()->route('home');
	}
    return view('welcome');
});

// Coba Konten index By Makajikenduri
Route::get('/cobakonten' , function(){
	$kontens = App\Konten::where('category_id', '=' , 4 )->get();
	return view ('cobakonten',compact('kontens'));
})->name('coba.konten');

// Coba Konten show video By Makajikenduri
Route::get('/cobashow/{slug?}' , function($slug = null){
	$konten = App\Konten::where('slug', '=' , $slug )->first();
	// dd($konten);
	return view('cobashow',compact('konten'));
})->name('coba.show');

Route::get('/games' , function(){
	if(Auth::user()){
	$kontens = App\Konten::where('category_id', '=' , 3 )->get();
	
	return view ('siswa.game',compact('kontens'));
	}
	return view('welcome');
})->name('siswa.game');

Route::get('/gameshow/{slug?}' , function($slug = null){
	if(Auth::user()){
		$konten = App\Konten::where('slug', '=' , $slug )->first();
		// dd($konten);
		return view('siswa.gameshow',compact('konten'));
	}
	return view('welcome');
})->name('game.show');

Route::get('/video' , function(){
	if(Auth::user()){
		$kontens = App\Konten::where('category_id', '=' , 2 )->get();
		
		return view ('siswa.video',compact('kontens'));
	}
	return view ('welcome');
})->name('siswa.video');

Route::get('/videoshow/{slug?}' , function($slug = null){
	if(Auth::user()){
	$konten = App\Konten::where('slug', '=' , $slug )->first();
	// dd($konten);
	return view('siswa.videoshow',compact('konten'));
}
	return view('welcome');	
})->name('video.show');

Auth::routes();

//ROUTE CAN BE ACCESS FOR ADMIN ONLY
Route::group(['middleware'=>['auth','checkRole:admin']],function(){
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

	//CATEGORY ROUTE BY MAKAJIXKENDURI
	Route::resource('category','CategoryController');

	//NILAI ROUTE BY MAKAJIXKENDURI
	Route::resource('nilai','NilaiController');

	//KONTEN ROUTE BY MAKAJIXKENDURI
	Route::get('/konten','KontenController@index')->name('konten.index');
	Route::get('/konten/create','KontenController@create')->name('konten.create');
	Route::post('/konten','KontenController@store')->name('konten.store');
	Route::get('/konten/{konten}/edit','KontenController@edit')->name('konten.edit');
	Route::put('/konten/{konten}','KontenController@update')->name('konten.update');
	Route::delete('/konten/{konten}','KontenController@destroy')->name('konten.destroy');
	

	//KUIS ROUTE BY MAKAJIXKENDURI
	Route::resource('examination','ExaminationContoller');
	Route::post('examination/image','ExaminationContoller@KuisImage')->name('image');
	Route::put('examination/{id}/edit2','ExaminationContoller@KuisEditImage')->name('kuis.image.edit');

	//MAPEL ROUTE BY MAKAJIXKENDURI
	Route::resource('mapel','MapelController');

});



//ROUTE CAN BE ACCESS FOR ADMIN,SISWA,GURU
Route::group(['middleware'=>['auth','checkRole:admin,siswa,guru,murid']],function(){
	
	//HOME
	Route::get('/home', 'HomeController@index')->name('home');
	
	//SISWA
	Route::get('/siswa/{id}/nilaisiswa','SiswaController@nilaisiswa');
	Route::get('/profilesiswa', 'ProfileController@profilesiswa')->middleware();
	Route::get('/editsiswa/{siswa}','ProfileController@editsiswa')->middleware();
	Route::post('/updatesiswa/{siswa}','ProfileController@updatesiswa');

	//GURU
	Route::get('/myprofile', 'ProfileController@profileguru');
	Route::get('/guru/{guru}','ProfileController@editguru');
	Route::post('/updateguru/{guru}','ProfileController@updateguru');

	//PASSWORD
	Route::get('/changePassword','Auth\AuthController@change')->name('change');
	Route::put('/changePassword','Auth\AuthController@updatePassword')->name('password.update');

	//KUIS FOR SISWA BY MAKAJIXKENDURI
	Route::get('/kuis','KuisController@index')->name('kuis.index');
	Route::get('soal/{id}','ExaminationContoller@soal')->name('soal');
	Route::post('soal/jawab/{id}','ExaminationContoller@jawab')->name('soal.jawab');

	//KONTEN FOR SISWA BY MAKAJIXKENDURI
	Route::get('/konten/{konten}','KontenController@show')->name('konten.show');

});


Route::get('/logout','AuthController@logout');
