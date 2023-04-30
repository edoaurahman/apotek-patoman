<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => redirect('dashboard'));
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('home');
Route::get('/login', [AdminController::class, 'index'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login.perform');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/obat', [ObatController::class, 'index'])->name('obat');
Route::get('/obat/tambah-obat', [ObatController::class, 'create'])->name('obat.create');
Route::post('/obat/tambah-obat', [ObatController::class, 'store'])->name('obat.store');
Route::get('/obat/edit-obat/{kode}', [ObatController::class, 'edit'])->name('obat.edit');
Route::post('/obat/edit-obat/', [ObatController::class, 'update'])->name('obat.update');
Route::delete('/obat/delete-obat/{id}', [ObatController::class, 'destroy'])->name('obat.delete');
Route::get('/obat/kadaluarsa', [ObatController::class, 'obatKadaluarsa'])->name('obat.kadaluarsa');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/pilih-obat/', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::get('/transaksi/pilih-obat/{id}', [TransaksiController::class, 'pilihObat'])->name('transaksi.pilihObat');
Route::post('/transaksi/pilih-obat', [TransaksiController::class, 'tambahObat'])->name('transaksi.tambahObat');
Route::post('/transaksi/bayar', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');
Route::delete('/transaksi/hapus-obat', [TransaksiController::class, 'hapusObat'])->name('transaksi.hapusObat');
Route::delete('/transaksi/batal/{id}', [TransaksiController::class, 'batal'])->name('transaksi.batal');

Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
Route::get('/transaksi/faktur/{id}', [TransaksiController::class, 'faktur'])->name('transaksi.faktur');


Route::get('/laporan',[AdminController::class, 'laporan'])->name('laporan');
Route::get('/laporan/viewPDF',[PDFController::class, 'viewPDF'])->name('laporan.viewPDF');