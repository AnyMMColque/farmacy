<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Exports\InvoicesWeek;
use App\Exports\InvoicesExport;
use App\Exports\InvoicesExportT;
use App\Exports\InvoicesMonth;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function pdf($index)
    {
        // return $pdf->download('venta-'.$numventa[0]->num_comprobante.'.pdf');
        // $order = Order::where('id', $index)->first();
        $invoice = Invoice::where('order_id', $index)->first();
        $products = json_decode($invoice->products);

        $pdf = \PDF::loadView('pdf.pdfInvoice', ['invoice' => $invoice, 'products' => $products]);
        //$pdf ->setPaper('a4','portrait');
        $pdf->setPaper([0, 0, 220.732,  841.89]);

        return $pdf->download('factura-' . $invoice->order_id . '.pdf');

        // return (view('pdf.pdfInvoice'));
    }

    public function exportAll()
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }

    public function exportToday()
    {
        $date = date("Y-m-d", strtotime(now()));
        return Excel::download(new InvoicesExportT, $date . '.xlsx');
    }

    public function exportWeek()
    {
        $from = date("Y-m-d", strtotime(now()."- 7 days"));
        $to = date("Y-m-d", strtotime(now()));

        return Excel::download(new InvoicesWeek, $from . '_' . $to . '.xlsx');
    }
    
    public function exportMonth()
    {
        $from = date("Y-m-d", strtotime(now()."- 1 month"));
        $to = date("Y-m-d", strtotime(now()));

        return Excel::download(new InvoicesMonth, $from . '_' . $to . '.xlsx');
    }
}
