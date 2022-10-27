<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();
        foreach ($sales as $sale) {
            $sale->invoices = Invoice::where('id', $sale->invoice_id)->first();
            $sale->invoices->customer = Customer::where('id', $sale->invoices->customer_id)->first();
            // dd($sale->invoices);
        }


        return view('report.index', compact(['sales']));
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
        foreach ($sales as $sale) {
            $sale->invoice = Invoice::where('id', $sale->invoice_id)->first();
            $sale->invoice->customer = Customer::where('id', $sale->invoice->customer_id)->first();
            $sale->invoice->transactions = Transaction::where('invoice_id', $sale->invoice->id)->with('product', 'unit')->get();
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

        return view('report.show', compact('sales'));
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
}
