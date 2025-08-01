<?php

use App\Http\Controllers\FprintController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kontroler;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginKontrol;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\TBUser;
use App\Models\tb_pegawai;
use App\Models\Presensi;
use App\Models\User;
use App\Models\Pendidikan;
use App\Models\Pekerja;
use App\Models\Kantor;
use App\Models\Fprint;
use App\Models\Divisi;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;


// ---------------------------------------------------------------------

Route::get('/', function () {
    return view('login');
});

Route::get('/mainmenu', function(){
    return view('mainmenu');
});

//Login
Route::get('/dashboard', [LoginKontrol::class, 'dashboard']); 
Route::get('/login','App\Http\Controllers\LoginKontrol@index')->name('login');
Route::post('customLogin', [LoginKontrol::class,'customLogin'])->name('login.custom'); 
Route::get('registration', [LoginKontrol::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginKontrol::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginKontrol::class, 'signOut'])->name('signout');
Auth::routes();
//

//home login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Pegawai
Route::get('/pegawai', 'App\Http\Controllers\Kontroler@indexPegawai');
//Insert tb_pegawai
Route::get('pegawai/tambahpgw','App\Http\Controllers\Kontroler@create');
Route::post('/pegawai/store','App\Http\Controllers\Kontroler@store');
//update(edit)
Route::get('/editpgw/{id}',[Kontroler::class, 'edit'])->name('edit');
Route::put('/pegawai/{id}',[Kontroler::class, 'update']);
//Delete
Route::get('/pegawai/destroy/{id}', 'App\Http\Controllers\Kontroler@destroy');
//export PDF
Route::get('/exportpdf',[Kontroler::class, 'exportpdf'])->name('exportpdf');


//Fprint
Route::get('/fprint', 'App\Http\Controllers\FprintController@index');

Route::get('fprint/tambahfprint','App\Http\Controllers\FprintController@create');
Route::post('/fprint/store','App\Http\Controllers\FprintController@store');

Route::get('/editfprint/{id}',[FprintController::class, 'edit'])->name('edit');
Route::put('/fprint/{id}',[FprintController::class, 'update']);

Route::get('/fprint/destroy/{id}', 'App\Http\Controllers\FprintController@destroy');

Route::get('/exportpdf1',[FprintController::class, 'exportpdf1'])->name('exportpdf1');


//Pekerja
Route::get('/pekerja', 'App\Http\Controllers\PekerjaController@index');

Route::get('pekerja/tambahpkj','App\Http\Controllers\PekerjaController@create');
Route::post('/pekerja/store','App\Http\Controllers\PekerjaController@store');

Route::get('/editpkj/{id}',[PekerjaController::class, 'edit'])->name('edit');
Route::put('/pekerja/{id}',[PekerjaController::class, 'update']);

Route::get('/pekerja/destroy/{id}', 'App\Http\Controllers\PekerjaController@destroy');

Route::get('/exportpdf2',[PekerjaController::class, 'exportpdf2'])->name('exportpdf2');

//Pendidikan
Route::get('/pendidikan', 'App\Http\Controllers\PendidikanController@index');

Route::get('pendidikan/tambahpdk','App\Http\Controllers\PendidikanController@create');
Route::post('/pendidikan/store','App\Http\Controllers\PendidikanController@store');

Route::get('/editpdk/{id}',[PendidikanController::class, 'edit'])->name('edit');
Route::put('/pendidikan/{id}',[PendidikanController::class, 'update']);

Route::get('/pendidikan/destroy/{id}', 'App\Http\Controllers\PendidikanController@destroy');

Route::get('/exportpdf3',[PendidikanController::class, 'exportpdf3'])->name('exportpdf3');


//Absensi
Route::get('/absensi', 'App\Http\Controllers\AbsensiController@index');

Route::get('absensi/tambahabsensi','App\Http\Controllers\AbsensiController@create');
Route::post('/absensi/store','App\Http\Controllers\AbsensiController@store');

Route::get('/editabsensi/{id}',[AbsensiController::class, 'edit'])->name('edit');
Route::put('/absensi/{id}',[AbsensiController::class, 'update']);

Route::get('/absensi/destroy/{id}', 'App\Http\Controllers\AbsensiController@destroy');

Route::get('/exportpdf4',[AbsensiController::class, 'exportpdf4'])->name('exportpdf4');


//Divisi
Route::get('/divisi', 'App\Http\Controllers\DivisiController@index');

Route::get('divisi/tambahdvs','App\Http\Controllers\DivisiController@create');
Route::post('/divisi/store','App\Http\Controllers\DivisiController@store');

Route::get('/editdvs/{id}',[DivisiController::class, 'edit'])->name('edit');
Route::put('/divisi/{id}',[DivisiController::class, 'update']);

Route::get('/divisi/destroy/{id}', 'App\Http\Controllers\DivisiController@destroy');

Route::get('/exportpdf5',[DivisiController::class, 'exportpdf5'])->name('exportpdf5');


//Kantor
Route::get('/kantor', 'App\Http\Controllers\KantorController@index');

Route::get('kantor/tambahkantor','App\Http\Controllers\KantorController@create');
Route::post('/kantor/store','App\Http\Controllers\KantorController@store');

Route::get('/editkantor/{id}',[KantorController::class, 'edit'])->name('edit');
Route::put('/kantor/{id}',[KantorController::class, 'update']);

Route::get('/kantor/destroy/{id}', 'App\Http\Controllers\KantorController@destroy');

Route::get('/exportpdf6',[KantorController::class, 'exportpdf6'])->name('exportpdf6');


//Presensi
Route::get('/presensi', 'App\Http\Controllers\PresensiController@index');

Route::get('presensi/tambahpresensi','App\Http\Controllers\PresensiController@create');
Route::post('/presensi/store','App\Http\Controllers\PresensiController@store');

Route::get('/editpresensi/{id}',[PresensiController::class, 'edit'])->name('edit');
Route::put('/presensi/{id}',[PresensiController::class, 'update']);

Route::get('/presensi/destroy/{id}', 'App\Http\Controllers\PresensiController@destroy');

Route::get('/exportpdf7',[PresensiController::class, 'exportpdf7'])->name('exportpdf7');






