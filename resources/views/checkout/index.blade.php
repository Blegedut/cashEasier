@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Checkout</h3>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12 mb-2">

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

            <div class="col-md-9 col-sm-12 card mb-3 p-3 shadow-sm">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="assets/images/samples/helix-hx5.jpeg" class="card-img" alt="..." width="100px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama Product</h5>
                            <h6 class="card text font-semibold mb-2">
                                Rp. 100000
                            </h6>
                            <p class="card text font-semibold mt-5">
                                Jumlah Produk : 1
                            </p>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutEdit">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 card mb-3 p-3 shadow-sm">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="assets/images/samples/helix-hx5.jpeg" class="card-img" alt="..." width="100px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama Product</h5>
                            <h6 class="card text font-semibold mb-2">
                                Rp. 100000
                            </h6>
                            <p class="card text font-semibold mt-5">
                                Jumlah Produk : 1
                            </p>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutEdit">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 card mb-3 p-3 shadow-sm">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="assets/images/samples/helix-hx5.jpeg" class="card-img" alt="..." width="100px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama Product</h5>
                            <h6 class="card text font-semibold mb-2">
                                Rp. 100000
                            </h6>
                            <p class="card text font-semibold mt-5">
                                Jumlah Produk : 1
                            </p>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutEdit">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <div class="card border-0 shadow-lg">
                <div class="card-header" style="background-color: white">Transaksi</div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-8">
                            <p class="card-text"> Shell Helix HX-5 x 3 </p>
                        </div>
                        <div class="col-4">
                            <p class="card-text">300000</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background-color: white">
                    <div class="row">
                        <div class="col-8">
                            Total Harga
                        </div>
                        <div class="col-4">
                            <p style="color: green">300000</p>
                        </div>
                        <button class="btn btn-success mt-2">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
