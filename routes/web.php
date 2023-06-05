<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnakController;

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

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/dashboard-filter',[AuthController::class, 'getDataAnak'])->name('dashboard-filter');



/*---------------
    Beranda
---------------*/
// Route::get('/dashboard', function () {
//     return view('childev.guardian.dashboard.dash');
// });

Route::get('/detail_anak', function () {
    return view('childev.guardian.dashboard.child_detail');
});

Route::get('/tambah_data_anak',[AnakController::class, 'index']);

Route::post('/add_anak_post',[AnakController::class, 'create'])->name('add_anak_post');

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


