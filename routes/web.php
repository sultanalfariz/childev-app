<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*---------------
    Landing Page
---------------*/

// Route::get('/', function () {
//     return view('landingpage.home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

/*---------------
    Authentication
---------------*/
Route::get('/masuk', function () {
    return view('authentication.login');
});

Route::get('/daftar', function () {
    return view('authentication.register');
});

Route::post('/post_daftar', [DaftarController::class, 'daftar']);


/*---------------
    Beranda
---------------*/
Route::get('/dashboard', function () {
    return view('childev.guardian.dashboard.dash');
});

Route::get('/detail_anak', function () {
    return view('childev.guardian.dashboard.child_detail');
});

Route::get('/tambah_data_anak', function () {
    return view('childev.guardian.dashboard.add_child');
});

/*---------------
    Pertumbuhan
---------------*/
Route::get('/pertumbuhan', function () {
    return view('childev.guardian.pertumbuhan.main');
});

Route::get('/tambah_data_pertumbuhan', function () {
    return view('childev.guardian.pertumbuhan.add_pertumbuhan');
});

/*---------------
    Perkembangan
---------------*/
Route::get('/perkembangan', function () {
    return view('childev.guardian.perkembangan.main');
});

Route::get('/cek_perkembangan', function () {
    return view('childev.guardian.perkembangan.cek_perkembangan');
});
