@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Checkout</h3>
    </div>
    <div class="row">
        <!-- Modal edit-->
        <div class="modal fade modal-borderless" id="checkoutEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="assets/images/samples/helix-hx5.jpeg" width="290px;" alt="">
                        </div>
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <label>Jumlah</label>
                                    </div>
                                    <div class="col-md-8 mb-3 form-group">
                                        <input type="number" class="form-control" name="fname"
                                            placeholder="Product Name">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- EDIT MODAL --}}
        <div class="col-md-8 col-sm-12 mb-2">
            @foreach ($products as $pd)
            @php
                // dd($pd);
            @endphp
                <div class="col-md-9 col-sm-12 card mb-3 p-3 shadow-sm">

                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src={{ asset('storage/image/foto_product/' . $pd->product->image) }} class="card-img"
                                alt="..." style="height:15rem">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pd->product->name }}</h5>
                                <h6 class="card text font-semibold mb-2">
                                    Rp. {{ $pd->product->price }}
                                </h6>
                                <p class="card text font-semibold mt-3">
                                    Jumlah Produk : {{ $pd->quantity }} {{ $pd->unit->unit }}
                                </p>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#checkoutEdit">
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

        <div class="col-md-3 col-sm-12">
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
