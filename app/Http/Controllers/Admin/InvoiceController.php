<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Invoice;
use App\Exports\StockExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\InvoicesWeek;
use App\Exports\InvoicesMonth;
use App\Exports\BranchesExport;
use App\Exports\InvoicesExport;
use App\Exports\ProductsExport;
use App\Exports\InventoryExport;
use App\Exports\InvoicesBetween;
use App\Exports\InvoicesExportT;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Livewire\Admin\Branches;

class InvoiceController extends Controller
{
    // Factura
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

    public function betweenDates($from, $to)
    {
        $export = new InvoicesBetween($from, $to);

        return Excel::download($export, $from . '_' . $to . '.xlsx');
    }

    public function products($id)
    {
        $products = new ProductsExport($id);

        // return Excel::download($products, 'productos.xlsx');
        return ($products)->download('productos.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function stock($id)
    {
        $products = new StockExport($id);

        // return Excel::download($products, 'productos_stock.xlsx');
        return (new StockExport($id))->download('productos_stock.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function expdate($id)
    {
        return (new InventoryExport($id))->download('productos_a_vencer.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    /* PDF de farmacias */
    public function branches()
    {
        return (new BranchesExport())->download('Lista de farmacias.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    /* PDF de usuarios */
    public function users()
    {
        return (new UsersExport())->download('Lista de usuarios.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
