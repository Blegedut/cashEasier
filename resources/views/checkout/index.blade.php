@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Checkout</h3>
    </div>
    <div class="row">
        {{-- MODAL EDIT --}}
        @foreach ($products as $product)
            <div class="modal fade modal-borderless" id="checkoutEdit{{ $product->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title white" id="exampleModalLabel">Edit</h5>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src={{ asset('storage/image/foto_product/' . $product->product->image) }}
                                    width="290px;" alt="">
                            </div>
                            <form action={{ url('/transaction/update/' . $product->id) }} method="POST"
                                enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12 my-4">
                                            <h6 class="mb-1">Jumlah :</h6>
                                            <input type="number" class="form-control" name="quantity">
                                        </div>
                                        <div class="col-md-5 col-sm-12 my-4">
                                            <h6 class="mb-1">Unit :</h6>
                                            <select class="form-select" disabled="disabled" name="unit_id">>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">
                                                        {{ $unit->unit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" class="form-control" value="{{ $product->id }}"
                                            name="product_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- MODAL EDIT --}}
        <div class="col-6 col-md-8 col-sm-12">
            @foreach ($products as $product)
                <div class="col-md-10 col-sm-12 card mb-3 p-3 shadow-sm">

                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src={{ asset('storage/image/foto_product/' . $product->product->image) }} class="card-img"
                                alt="..." style="height:15rem">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product->name }}</h5>
                                <h6 class="card text font-semibold mb-2">
                                    Rp. {{ $product->product->price }}
                                </h6>
                                <p class="card text font-semibold mt-3">
                                    Jumlah Produk : {{ $product->quantity }} {{ $product->unit->unit }}
                                </p>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#checkoutEdit{{ $product->id }}">
                                    Edit
                                </button>
                                <a class="btn btn-danger" href="#">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-6 col-md-3 col-sm-12">
            {{-- <div class="card"> --}}
            <div class="card border-0 shadow-lg">
                <div class="card-content">

                    <div class="card-header">
                        <p>Transaksi</p>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-5">
                                    <label>Customer name</label>
                                </div>
                                <div class="col-7 form-group">
                                    <input class="form-control form-control-sm" type="text" id="formFile" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    @foreach ($products as $pd)
                        {{-- @dd($pd->sub_total) --}}
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-8">
                                    <p class="card-text"> {{ $pd->product->name }} </p>
                                </div>
                                <div class="col-4">
                                    <p class="card-text">{{ $pd->sub_total }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-8">
                            Total Harga
                        </div>
                        <div class="col-4">
                            <p style="color: green">{{ $total }}</p>
                        </div>
                        <button class="btn btn-success mt-2">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
