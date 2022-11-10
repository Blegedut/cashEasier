<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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
        // 
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
        $product = Product::where('id', $request->product_id)->first();

        $check = Transaction::where('invoice_id', null)->where('product_id', $request->product_id)
            ->where('unit_id', $request->unit_id)
            ->first();

        // dd($request->unit_id);
        if ($product->stock < $request->quantity) {
            return redirect()->back();
        }

        if ($check?->quantity !== null) {
            $product->update([
                'stock' => $product->stock - $request->quantity
            ]);

            $transaction = Transaction::find($check->id)->update([
                $sub_total = $product->price * $request->quantity,
                'quantity' => $check->quantity + $request->quantity,
                'sub_total' => $check->sub_total + $sub_total
            ]);
        } else {
            $product->update([
                'stock' => $product->stock - $request->quantity
            ]);

            Transaction::create([
                'unit_id' => $request->unit_id,
                'user_id' => Auth::user()->id,
                'quantity' => $request->quantity,
                'product_id' => $request->product_id,
                'sub_total' => $product->price * $request->quantity
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction, $id)
    {
        // $product = Product::where('id', $request->product_id)->first();
        $transactions = Transaction::where('id', $id)->with('product')->first();
        // dd($transactions);

        if ($transactions->product->stock < $request->quantity) {
            return redirect()->back();
        } if ($transactions->quantity < $request->quantity) {
            $remains = $request->quantity - $transactions->quantity;
            // dd($transactions->product->stock);
            $transactions->product->update([
                'stock' => $transactions->product->stock - $remains
            ]);
        } if ($transactions->quantity > $request->quantity) {
            $remains = $transactions->quantity - $request->quantity;
            // dd($transactions->product->stock);
            $transactions->product->update([
                'stock' => $transactions->product->stock + $remains
            ]);
        }
        

        $this->validate($request, [
            'quantity' => 'required',
            'unit_id' => 'required'
        ]);

        $sub_total = $transactions->product->price * $request->quantity;

        $transactions->quantity = $request->quantity;
        $transactions->unit_id = $request->unit_id;
        $transactions->sub_total = $sub_total;
        $transactions->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction, $id)
    {
        $transactions = Transaction::find($id);

        $transactions->product->update([
            'stock' => $transactions->product->stock + $transactions->quantity
        ]);

        $transactions->delete();

        return redirect()->route('cashier.checkout');
    }
}
