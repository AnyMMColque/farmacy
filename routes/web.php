<?php

use App\Http\Livewire\AboutUs;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Pharmacy;
use App\Http\Livewire\Prod;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', Login::class)->name('login');

Route::get('/', Home::class)->name('home');
Route::get('/farmacias', Pharmacy::class)->name('pharmacies');
Route::get('/productos', Prod::class)->name('products');
Route::get('/contacto', Contact::class)->name('contacts');
Route::get('/somos', AboutUs::class)->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');