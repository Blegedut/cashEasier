<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Customer;
use App\Models\ExtraPrice;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Transaction;
use App\Models\Unit;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();
        $total = 0;
        foreach ($sales as $sale) {
            $sale->invoices = Invoice::where('id', $sale->invoice_id)->first();
            $sale->invoices->customer = Customer::where('id', $sale->invoices->customer_id)->first();
            // dd($sale->invoices);
        }


        return view('report.index', compact(['sales']));
    }

    public function export() 
    {
        return Excel::download(new SalesExport, 'sale.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale, $id)
    {
        $sales = Sale::where('id', $id)->get();
        $no = 1;
        $total = 0;
        foreach ($sales as $sale) {
            $sale->invoice = Invoice::where('id', $sale->invoice_id)->first();
            $sale->invoice->customer = Customer::where('id', $sale->invoice->customer_id)->first();
            $sale->invoice->extra = ExtraPrice::where('id', $sale->invoice->extra_price_id)->first();
            $sale->invoice->transactions = Transaction::where('invoice_id', $sale->invoice->id)->with('product', 'unit')->get();
            foreach ($sale->invoice->transactions as $transaction) {
                $total += $transaction->sub_total;
            }
            $total += $sale->invoice->extra->service + $sale->invoice->extra->steam;
            // $sale->invoice->transactions->product = Product::where('id', $sale->invoice->transactions->product_id)->first();
            // dd($sales);
        }
        // foreach ($customers as $customer) {
        // $customer->invoice = Invoice::where('id', $customer->id)->first();
        // $customer->invoice->transactions = Transaction::where('invoice_id', $customer->invoice->id)->first();
        // $customer->invoice->transactions->product = Product::where('id', $customer->invoice->transactions->product_id)->first();
        // $customer->invoice->transactions->unit = Unit::where('id', $customer->invoice->transactions->unit_id)->first();
        // dd($customer->invoice);
        // }
        // dd($customers);
        // foreach ($invoices as $invoice) {
        //     $invoice->customer = Customer::where('id', $invoice->customer_id)->first();
        //     dd($invoice);
        // }

        return view('report.show', compact(['sales', 'total', 'no']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function stream_pdf($id)
{
	$sales = Sale::where('id', $id)->get();
        $total = 0;
        foreach ($sales as $sale) {
            $sale->invoice = Invoice::where('id', $sale->invoice_id)->first();
            $sale->invoice->customer = Customer::where('id', $sale->invoice->customer_id)->first();
            $sale->invoice->extra = ExtraPrice::where('id', $sale->invoice->extra_price_id)->first();
            $sale->invoice->transactions = Transaction::where('invoice_id', $sale->invoice->id)->with('product', 'unit')->get();
            foreach ($sale->invoice->transactions as $transaction) {
                $total += $transaction->sub_total;
            }
            $total += $sale->invoice->extra->service + $sale->invoice->extra->steam;
            // $sale->invoice->transactions->product = Product::where('id', $sale->invoice->transactions->product_id)->first();
            // dd($sales);
        }
 
	$pdf = PDF::loadview('report.invoice_pdf',['sales'=>$sales, 'total'=>$total])->setPaper('a4', 'landscape');
	return $pdf->stream('faktur-pdf');
}
}
