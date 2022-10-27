@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Checkout</h3>
    </div>
    <div class="row">
        {{-- MODAL EDIT --}}
        @foreach ($transactions as $transaction)
            <div class="modal fade modal-borderless" id="checkoutEdit{{ $transaction->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title white" id="exampleModalLabel">Add to cart</h5>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src={{ asset('storage/image/foto_product/' . $transaction->product->image) }}
                                    width="290px;" alt="">
                            </div>
                            <div class="d-flex justify-content-between">
                                <h4 class="mt-5">
                                    {{ $transaction->product->name }}
                                </h4>
                                <h5 class="mt-5">
                                    Rp{{ $transaction->product->price }}/{{ $transaction->unit->unit }}
                                </h5>
                            </div>
                            <h6 class="font-semibold mt-4 mb-1">
                                Deskripsi :
                            </h6>
                            <p class="font-semibold mb-4">
                                {{ $transaction->product->description }}
                            </p>
                            <form action="{{ url('/transaction/update/' . $transaction->id) }}" method="POST"
                                enctype="multipart/form-data" class="form form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-21">
                                            <h6 class="mb-1">Jumlah :</h6>
                                            <input type="number" class="form-control" name="quantity" required>
                                        </div>
                                        <div class="col-md-6 col-sm-21">
                                            <h6 class="mb-1">Unit :</h6>
                                            {{-- @dd($transactions) --}}
                                            <select class="choices form-select" name="unit_id">>
                                                {{-- @foreach ($unit as $ut) --}}
                                                <option value="{{ $transaction->unit->id }}">
                                                    {{ $transaction->unit->unit }}</option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- MODAL EDIT --}}

        {{-- MODAL DELETE --}}
        @foreach ($transactions as $transaction)
            <div class="modal fade" id="modalDelete{{ $transaction->id }}" tabindex="-1" aria-labelledby="modalHapusBarang"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title white" id="exampleModalLabel">Delete</h5>
                        </div>
                        <div class="modal-body">
                            <i class="fas fa-exclamation-circle mb-2"
                                style="color: #e74a3b; font-size:120px; justify-content:center; display:flex"></i>
                            <h5 class="text-center">Apakah anda yakin ingin menghapus {{ $transaction->product->name }} ?
                            </h5>
                        </div>
                        <div class="modal-footer">
                            <form action={{ url('/transaction/delete/' . $transaction->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Yes, Delete it</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- MODAL DELETE --}}
        <div class="col-6 col-md-8 col-sm-12">
            @foreach ($transactions as $transaction)
                <div class="col-md-10 col-sm-12 card mb-3 p-3 shadow-sm">

                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <img src={{ asset('storage/image/foto_product/' . $transaction->product->image) }}
                                class="card-img" alt="..." style="height:15rem">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $transaction->product->name }}</h5>
                                <h6 class="card text font-semibold mb-2">
                                    Rp. {{ $transaction->product->price }}
                                </h6>
                                <p class="card text font-semibold mt-3">
                                    Jumlah Produk : {{ $transaction->quantity }} {{ $transaction->unit->unit }}
                                </p>
                            </div>
                            {{-- <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-warning mx-3" data-bs-toggle="modal"
                                    data-bs-target="#checkoutEdit{{ $transaction->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete{{ $transaction->id }}">Delete</button>
                            </div> --}}
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <div class="d-flex align-items-stretch">
                                <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                                    data-bs-target="#checkoutEdit{{ $transaction->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete{{ $transaction->id }}">Delete</button>
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
                        <form action="{{ url('/invoice/store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-5">
                                    <label>Customer name</label>
                                </div>
                                <div class="col-7 form-group">
                                    <input class="form-control form-control-sm" type="text" name="name" id="formFile"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label>Nomor Plat</label>
                                </div>
                                <div class="col-7 form-group">
                                    <input class="form-control form-control-sm" type="text" name="no_plat"
                                        id="formFile" required>
                                </div>
                            </div>
                    </div>
                    @foreach ($transactions as $transaction)
                        {{-- @dd($transaction->sub_total) --}}
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-8">
                                    <p class="card-text"> {{ $transaction->product->name }} </p>
                                </div>
                                <div class="col-4">
                                    <p class="card-text">{{ $transaction->sub_total }}</p>
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
                            <p class="form-control-static" style="color: green" id="staticInput">
                                {{ $total }}
                            </p>
                            <input class="form-control form-control-sm" type="hidden" name="total"
                                value="{{ $total }}">
                        </div>
                        <button class="btn btn-success mt-2" type="submit">Bayar Sekarang</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
