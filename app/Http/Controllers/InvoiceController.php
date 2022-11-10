<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ExtraPrice;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
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
        $invoices = Transaction::with('product', 'invoice')->first();
        // dd($invoices);


        return view('invoice.index');
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
        $customer = Customer::create([
            'name' => $request->name,
            'plat_number' => $request->no_plat,
            'type_car' => $request->type_car
        ]);

        $extra = ExtraPrice::create([
            'service' => $request->service,
            'steam' => $request->steam
        ]);

        $invoice = Invoice::create([
            'customer_id' => $customer->id,
            'extra_price_id' => $extra->id,
            'mechanic' => $request->mechanic,
            'total' => $request->total
        ]);

        $sales = Sale::create([
            'invoice_id' => $invoice->id
        ]);

        $transactions = Transaction::where('user_id', Auth::user()->id)->where('invoice_id', null)->get();
        foreach ($transactions as $transaction) {
            $transaction->update([
                'invoice_id' => $invoice->id
            ]);
            // dd($transaction);
        }

        // $product = 

        // dd($transaction);

        // $product = Product::where('id', $transaction->id)->get();

        // $product->update([
        //     'stock' => $product->stock - $transaction->quantity
        // ]);

        // dd($invoice,$transaction);

        return redirect('/report/detail/' . $sales->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
