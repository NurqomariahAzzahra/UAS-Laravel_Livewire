<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Members; //Load class Members 
use App\Http\Livewire\Bukus; //Load class Members 
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('layout.v_template');
});
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('member', Members::class)->name('member'); //Tambahkan routing ini
    Route::get('buku', Bukus::class)->name('buku');
    // Route::get('transaksi', Transaksis::class)->name('transaksi'); //Tambahkan routing ini
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/members', function () {
    return view('livewire.members');
})->name('members');

// Route::get('/peminjaman_buku', 'ControllerController@peminjaman_buku')->name('peminjaman_buku');


