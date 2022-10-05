<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        $category = Categorie::get();
        $unit = Unit::get();

        return view('product.index', compact(['category', 'unit', 'product']));
    }

    public function cashier()
    {
        return view('cashier.index');
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required|file|max:3072',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->categorie_id = $request->category;
        $product->quantity = $request->qty;
        $product->unit_id = $request->unit;
        $product->stock = $request->stock;
        $product->price = $request->price;
        
        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        $product->image = $request->file('image')->getClientOriginalName();
        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('/foto_product', $filename);
        }
        $product->save();

        // dd($product);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
