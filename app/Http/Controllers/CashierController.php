<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Transaction;

class CashierController extends Controller
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
    public function index(Request $request)
    {
        $products = Product::with('category', 'unit')->get();
        foreach ($products as $product) {
            // $product->category = Categorie::where('id', $product->categorie_id)->first();
            $product->unit = Unit::where('id', $product->unit_id)->first();
        }
        $unit = Unit::get();
        // dd($products);


        // $category = Categorie::with('products')->get();

        $product_carts = Transaction::where('invoice_id', null)->get();

        $total_product_carts = 0;
        foreach ($product_carts as $product_cart) {
            $total_product_carts += $product_cart->quantity;
            $product_cart->quantity;
        }


        if ($request->ajax()) {

            $output = '';

            $search_products = Product::where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                ->get();
            if ($search_products) {
                foreach ($search_products as $pd) {
                    $output .= '
                    <div class="col-6 col-lg-2 col-md-6">
                            <div class="card shadow-sm">
                                <div class="card-content">
                                    <img src=' . asset('storage/image/foto_product/' . $pd->image) . ' style="height:15rem"
                                        class="card-img-top img-fluid" alt="' . $pd->image . '">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $pd->name . '</h5>
                                        <h6 class="card text font-semibold mt-3 mb-1">
                                            Stock : ' . $pd->stock . ' / '.$pd->unit->unit.'
                                        </h6>
                                        <h6 class="card text font-semibold mb-2">
                                            Price : Rp. ' . $pd->price . ' / '.$pd->unit->unit.'
                                        </h6>
                                        <p class="card text mt-3 mb-1">
                                            <a class="collapsed" href="#" data-bs-toggle="modal"
                                                data-bs-target="#kasirDescModal' . $pd->id . '">
                                                Detail
                                            </a>
                                        </p>
                                        <div class="modal fade modal-borderless" id="kasirDescModal' . $pd->id . '"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <img src=' . asset('storage/image/foto_product/' . $pd->image) . '
                                                                width="290px;" alt="">
                                                        </div>
                                                        <h4 class="mt-3">
                                                            ' . $pd->name . '
                                                        </h4>
                                                        <h6 class="font-semibold mt-4 mb-1">
                                                            Price :
                                                        </h6>
                                                        <h6 class="font-semibold mb-4">
                                                            Rp. ' . $pd->price . ' / '.$pd->unit->unit.'
                                                        </h6>
                                                        <h6 class="font-semibold mt-4 mb-1">
                                                            Deskripsi :
                                                        </h6>
                                                        <p class="font-semibold mb-4">
                                                            ' . $pd->description . '
                                                        </p>
                                                        <form action="' . url('/transaction') . '" method="POST"
                                                            enctype="multipart/form-data" class="form form-horizontal">
                                                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-21">
                                                                        <h6 class="mb-1">Jumlah :</h6>
                                                                        <input type="number" class="form-control"
                                                                            name="quantity">
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-21">
                                                                        <h6 class="mb-1">Unit :</h6>
                                                                        <select class="choices form-select" name="unit_id">';
                                                                            foreach ($unit as $ut) {
                                                                            $output .= '
                                                                                <option value="' . $ut->id . '">
                                                                                    ' . $ut->unit . '</option>';
                                                                            }
                                                                            $output .= '
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" class="form-control"
                                                                        value="' . $pd->id . '" name="product_id">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    ';
                }
                return response()->json($output);
            }
        }


        return view('cashier.index', compact(['products', 'unit', 'total_product_carts']));
    }

    public function checkout()
    {
        // $t = Transaction::all();
        // dd($t);

        $transactions = Transaction::where('invoice_id', null)->with('product')->get();
        foreach ($transactions as $transaction) {
            $transaction->unit = Unit::where('id', $transaction->unit_id)->first();
        }
        // dd($transaction);

        $total = 0;
        foreach ($transactions as $transaction) {
            $total += $transaction->sub_total;
            $transaction->sub_total;
        }
        // dd($transactions->sub_total);

        // $cart = Transaction::where('invoice_id', null)->first();

        return view('checkout.index', compact(['transactions', 'total']));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
