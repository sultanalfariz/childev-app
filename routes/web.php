<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\PertumbuhanController;

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
})->name('masuk');

Route::post('/auth',[AuthController::class, 'auth'])->name('auth');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/daftar', function () {
    return view('authentication.register');
})->name('daftar');

Route::post('/post_daftar', [DaftarController::class, 'daftar']);


/*===================================================================================
    GUARDIAN
===================================================================================*/

/*---------------
    Beranda
---------------*/
// Route::get('/dashboard', function () {
//     return view('childev.guardian.dashboard.dash');
// });

Route::get('/tambah_data_anak',[AnakController::class, 'index']);

Route::post('/add_anak_post',[AnakController::class, 'create'])->name('add_anak_post');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/dashboard-filter',[AuthController::class, 'getDataAnak'])->name('dashboard-filter');

Route::get('/dashboard-perkembangan',[AuthController::class, 'getDataPerkembangan'])->name('dashboard-perkembangan');

Route::get('/dashboard-kesehatan-update',[AuthController::class, 'getDataKesehatanUpdate'])->name('dashboard-kesehatan-update');

Route::get('/dashboard-medis-update',[AuthController::class, 'getDataMedisUpdate'])->name('dashboard-medis-update');


/*---------------
    Pertumbuhan
---------------*/
// Route::get('/pertumbuhan', function () {
//     return view('childev.guardian.pertumbuhan.main');
// });

// Route::get('/tambah_data_pertumbuhan', function () {
//     return view('childev.guardian.pertumbuhan.add_pertumbuhan');
// });

Route::get('/pertumbuhan', [PertumbuhanController::class, 'pertumbuhan'])->name('pertumbuhan');

Route::get('/pertumbuhan-filter',[PertumbuhanController::class, 'getDataAnak'])->name('pertumbuhan-filter');

Route::get('/pertumbuhan-data',[PertumbuhanController::class, 'getDataPertumbuhan'])->name('pertumbuhan-data');

Route::get('/tambah_data_pertumbuhan/{id}',[PertumbuhanController::class, 'index'])->name('tambah_data_pertumbuhan');

/*---------------
    Perkembangan
---------------*/
Route::get('/perkembangan', function () {
    return view('childev.guardian.perkembangan.main');
});

Route::get('/cek_perkembangan', function () {
    return view('childev.guardian.perkembangan.cek_perkembangan');
});


/*---------------
    Catatan Kesehatan
---------------*/
Route::get('/catatan_kesehatan', function () {
    return view('childev.guardian.kesehatan.main');
});

Route::get('/tambah_catatan_kesehatan', function () {
    return view('childev.guardian.kesehatan.add_catatan');
});

/*---------------
    Rekam Medis
---------------*/
Route::get('/rekam_medis', function () {
    return view('childev.guardian.medis.main');
});

/*---------------
    Akun
---------------*/
Route::get('/akun', function () {
    return view('childev.guardian.akun.main');
});


/*===================================================================================
    ADMIN
===================================================================================*/

/*---------------
    Beranda
---------------*/
// Route::get('/dashboard_admin', function () {
//     return view('childev.admin.dashboard.dash');
// });

Route::get('/dashboard_admin', [AuthController::class, 'auth'])->name('dashboard_admin');

Route::get('/buat_akun', function () {
    return view('childev.admin.dashboard.add_user');
});
