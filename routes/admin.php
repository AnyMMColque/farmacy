<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Customers;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Laboratories;
use App\Http\Livewire\Admin\Presentations;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\Reports;
use App\Http\Livewire\Admin\Sales;
use App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('admin.dashboard');
Route::get('/productos', Products::class)->name('admin.products');
Route::get('/presentations', Presentations::class)->name('admin.presentations');
Route::get('/laboratories', Laboratories::class)->name('admin.laboratories');
Route::get('/sales', Sales::class)->name('admin.sales');
Route::get('/customers', Customers::class)->name('admin.customers');
Route::get('/users', Users::class)->name('admin.users');
Route::get('/reports', Reports::class)->name('admin.reports');