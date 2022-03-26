<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function pdf($index)
    {
        // return $pdf->download('venta-'.$numventa[0]->num_comprobante.'.pdf');
        $order = Order::where('id', $index)->first();
        $products = $order->products;

        $pdf = \PDF::loadView('pdf.pdfInvoice',['order'=>$order, 'products'=>$products]);
       //$pdf ->setPaper('a4','portrait');
        $pdf->setPaper( [0, 0, 220.732,  841.89]);

        return $pdf->download('factura-'.$order->id.'.pdf');

        // return (view('pdf.pdfInvoice'));
    }
}
