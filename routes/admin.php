<?php

use App\Http\Livewire\Prod;
use App\Http\Livewire\Pharmacy;
use App\Http\Livewire\Admin\Sales;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\Reports;
use App\Http\Livewire\Admin\Branches;
use App\Http\Livewire\Admin\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Customers;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Invent;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\SalesCreate;
use App\Http\Livewire\Admin\Laboratories;
use App\Http\Livewire\Admin\Presentations;
use App\Http\Controllers\Admin\InvoiceController;

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
Route::get('/inventario', Invent::class)->name('admin.inventory');

/* Ruta para imprimir factura */
Route::get('/pdf/{id}', [InvoiceController::class, 'pdf'])->name('pdf.pdfInvoice');

// Reportes excel
Route::get('facturas/export/', [InvoiceController::class, 'exportAll']);
Route::get('facturas/hoy/', [InvoiceController::class, 'exportToday'])->name('today');
Route::get('facturas/semanal/', [InvoiceController::class, 'exportWeek'])->name('week');
Route::get('facturas/mes/', [InvoiceController::class, 'exportMonth'])->name('month');
Route::get('facturas/between/{from}/{to}', [InvoiceController::class, 'betweenDates'])->name('between');
Route::get('reportes/productos/{id}', [InvoiceController::class, 'products']);
Route::get('reportes/stock/{id}', [InvoiceController::class, 'stock']);
Route::get('reportes/expdate/{id}', [InvoiceController::class, 'expdate']);
Route::get('reportes/farmacias/', [InvoiceController::class, 'branches']);
Route::get('reportes/usuarios/', [InvoiceController::class, 'users']);
