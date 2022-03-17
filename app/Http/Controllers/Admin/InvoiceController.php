<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function pdf($index)
    {
        // return $pdf->download('venta-'.$numventa[0]->num_comprobante.'.pdf');
        return '1';
    }
}
