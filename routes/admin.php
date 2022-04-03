<?php

use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Branches;
use App\Http\Livewire\Admin\Customers;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Laboratories;
use App\Http\Livewire\Admin\Presentations;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\Reports;
use App\Http\Livewire\Admin\Sales;
use App\Http\Livewire\Admin\SalesCreate;
use App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('admin.dashboard');
Route::get('/productos', Products::class)->name('admin.products');
Route::get('/presentaciones', Presentations::class)->name('admin.presentations');
Route::get('/laboratorios', Laboratories::class)->name('admin.laboratories');
Route::get('/ventas', Sales::class)->name('admin.sales');
Route::get('/ventas/create', SalesCreate::class)->name('admin.sales.create');
Route::get('/clientes', Customers::class)->name('admin.customers');
Route::get('/usuarios', Users::class)->name('admin.users');
Route::get('/reportes', Reports::class)->name('admin.reports');
Route::get('/sucursales', Branches::class)->name('admin.branches');

/* Ruta para imprimir factura */
Route::get('/pdf/{id}', [InvoiceController::class, 'pdf'])->name('pdf.pdfInvoice');

// Reportes excel
Route::get('facturas/export/', [InvoiceController::class, 'exportAll']);
