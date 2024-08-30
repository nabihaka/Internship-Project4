<?php

use App\Http\Controllers\UserController; // Mengimpor UserController dari namespace App\Http\Controllers
use Illuminate\Support\Facades\Route;    // Mengimpor kelas Route dari Laravel untuk mendefinisikan rute

// Baris ini adalah rute default Laravel yang mengarahkan ke halaman 'welcome'. Baris ini telah dikomentari.
// Route::get('/', function () {
//     return view('welcome');
// });

// Rute untuk halaman utama ('/') yang akan memanggil metode 'loadAllUsers' pada UserController.
Route::get('/',[UserController::class, 'loadAllUsers']);

// Rute untuk menampilkan semua pengguna. Menggunakan metode 'loadAllUsers' dari UserController.
Route::get('/users',[UserController::class, 'loadAllUsers']);

// Rute untuk menampilkan formulir penambahan pengguna baru. Menggunakan metode 'loadAddUserForm' dari UserController.
Route::get('/add/user',[UserController::class, 'loadAddUserForm']);

// Rute POST untuk menambahkan pengguna baru ke dalam database. Menggunakan metode 'AddUser' dari UserController.
// Rute ini diberi nama 'AddUser' untuk memudahkan pengaturan rute di dalam kode.
Route::post('/add/user',[UserController::class, 'AddUser'])->name('AddUser');

// Rute untuk menampilkan formulir pengeditan pengguna berdasarkan ID pengguna. Menggunakan metode 'loadEditForm' dari UserController.
Route::get('/edit/{id}',[UserController::class, 'loadEditForm']);

// Rute untuk menghapus pengguna berdasarkan ID pengguna. Menggunakan metode 'deleteUser' dari UserController.
Route::get('/delete/{id}',[UserController::class, 'deleteUser']);

// Rute POST untuk menyimpan perubahan setelah pengeditan pengguna. Menggunakan metode 'EditUser' dari UserController.
// Rute ini diberi nama 'EditUser' untuk memudahkan pengaturan rute di dalam kode.
Route::post('/edit/user',[UserController::class, 'EditUser'])->name('EditUser');
