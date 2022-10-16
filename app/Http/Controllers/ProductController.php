<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Categorie::with('products')->get();
        // dd($product);
        $unit = Unit::get();

        if ($request->ajax()) {

            $output = '';

            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                ->get();
            if ($products) {
                foreach ($products as $pd) {
                    $output .= '
                    <div class="col-6 col-lg-2 col-md-6">
                    <div class="card shadow-sm">
                    <div class="card-content">
                    <img src="' . asset('storage/image/foto_product/' . $pd->image) . '" style="height:15rem"
                                        class="card-img-top img-fluid" alt="{{ $pd->image }}">
                        <div class="card-body">
                            <h5 class="card-title">' . $pd->name . '</h5>
                            <h6 class="card text font-semibold mt-3 mb-1">
                                Stock : ' . $pd->stock . '
                            </h6>
                            <h6 class="card text font-semibold mb-2">
                                Price : Rp. ' . $pd->price . '
                            </h6>
                            <p class="card text mt-3 mb-1">
                                            <a class="collapsed" href="#" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal' . $pd->id . '">
                                                Description
                                            </a>
                                        </p>
                                        ';
                    foreach ($category as $ct) {
                        $output .= '
                                        <div class="modal fade modal-borderless" id="exampleModal' . $pd->id . '"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <img src= "' . asset('storage/image/foto_product/' . $pd->image) . '"
                                                                width="290px;" height="290px" alt="">
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h4 class="mt-5">
                                                                ' . $pd->name . '
                                                            </h4>
                                                            <h5 class="mt-5">
                                                                Rp. ' . $pd->price . '
                                                            </h5>
                                                        </div>
                                                        <h6 class="font-bold mt-4 mb-1">
                                                            Category
                                                        </h6>
                                                        <h6 class="font-semibold mb-4">
                                                            ' . $ct->category . '
                                                        </h6>
                                                        <h6 class="font-bold mt-2 mb-1">
                                                            Stock
                                                        </h6>
                                                        <h6 class="font-semibold mb-4">
                                                            ' . $pd->stock . '
                                                        </h6>
                                                        <h6 class="font-bold mt-2 mb-1">
                                                            Deskripsi
                                                        </h6>
                                                        <p class="font-semibold mb-4">
                                                            ' . $pd->description . '
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete'.$pd->id.'">Delete</button>
                                                            <a href="'. url('/product/show/' . $pd->id) .'" class="btn btn-primary">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal fade" id="modalDelete'.$pd->id.'" tabindex="-1" aria-labelledby="modalHapusBarang"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <i class="fas fa-exclamation-circle mb-2"
                                style="color: #e74a3b; font-size:120px; justify-content:center; display:flex"></i>
                            <h5 class="text-center">Apakah anda yakin ingin menghapus {{ $pd->name }} ?</h5>
                        </div>
                        <div class="modal-footer">
                            <form action='. url('/product/delete/' . $pd->id) .' method="POST">
                                @csrf
                                @method('.'DELETE'.')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yes, Delete it</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                    ';
                    }
                }
                return response()->json($output);
            }
        }

        return view('product.index', compact(['category', 'unit']));
    }

    // public function search(Request $request)
    // {
    //     if ($request->ajax()) {

    //         $output = '';

    //         $products = Product::where('name', 'LIKE', '%' . $request->search . '%')
    //             ->orWhere('description', 'LIKE', '%' . $request->search . '%')
    //             ->get();
    //         if ($products) {
    //             foreach ($products as $pd) {
    //                 $output .=
    //                     '<div class="card-body">
    //                     <img src="' . $pd->image . '" style="height:15rem"
    //                         class="card-img-top img-fluid">
    //                     <h5 class="card-title">' . $pd->name . '</h5>
    //                     <h6 class="card text font-semibold mt-3 mb-1">
    //                         Stock : ' . $pd->stock . '
    //                     </h6>
    //                     <h6 class="card text font-semibold mb-2">
    //                         Price : Rp. ' . $pd->price . '
    //                     </h6>
    //                 </div>';
    //             }
    //             return response()->json($output);
    //         }
    //     }



    //     return view('product.index');
    // }

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
            $request->file('image')->storeAs('public/image/foto_product', $filename);
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
    public function show(Product $product, $id)
    {
        $category = Categorie::with('products')->get();
        $product = Product::where('id', $id)->firstOrFail();
        $unit = Unit::get();


        return view('product.show', compact(['category', 'product', 'unit']));
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
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::where('id', $id)->first();

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

        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        $product->image = $request->file('image')->getClientOriginalName();
        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete('/public/image/foto_product/' . $request->oldImage);
            }
            $request->file('image')->storeAs('/public/image/foto_product', $filename);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->categorie_id = $request->category;
        $product->quantity = $request->qty;
        $product->unit_id = $request->unit;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->update();

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index');
    }
}
