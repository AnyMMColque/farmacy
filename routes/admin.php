<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Products;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('admin.dashboard');
Route::get('/productos', Products::class)->name('admin.products');