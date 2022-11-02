<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Sale;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SalesExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $sales = Sale::get();
        $total = 0;
        foreach ($sales as $sale) {
            $sale->invoices = Invoice::where('id', $sale->invoice_id)->first();
            $sale->invoices->customer = Customer::where('id', $sale->invoices->customer_id)->first();
            $sale->invoices->transactions = Transaction::where('invoice_id', $sale->invoice->id)->with('product', 'unit')->get();
            foreach ($sale->invoices->transactions as $transaction) {
                $total += $transaction->sub_total;
            }
            // dd($sale->invoices);
        }

        return view('exports.sales', compact(['sales', 'total']));
    }
}
