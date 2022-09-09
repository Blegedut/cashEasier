@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Kasir</h3>
    </div>
    <div class="row">
        <div class="col-6 col-lg-2 col-md-6">
            <div class="card">
                <div class="card-content">
                    <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid" alt="singleminded">
                    <div class="card-body">
                        <h5 class="card-title">Nama Product</h5>
                        <h6 class="card text font-semibold mt-3 mb-1">
                            Stock : 123
                        </h6>
                        <h6 class="card text font-semibold mb-2">
                            Price : Rp. 123000
                        </h6>
                        <p class="card text mt-3 mb-1">
                            <a class="collapsed" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Description
                            </a>
                        </p>
                        <div class="modal fade modal-borderless" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="assets/images/samples/helix-hx5.jpeg" width="290px;" alt="">
                                        </div>
                                        <h4 class="mt-3">
                                            Nama produk
                                        </h4>
                                        <h6 class="font-semibold mt-4 mb-1">
                                            Price :
                                        </h6>
                                        <h6 class="font-semibold mb-4">
                                            Rp. 123.000
                                        </h6>
                                        <h6 class="font-semibold mt-4 mb-1">
                                            Deskripsi :
                                        </h6>
                                        <p class="font-semibold mb-4">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor incidunt ullam,
                                            a aut rerum exercitationem esse sit quibusdam consectetur ipsam doloremque
                                            dolore corrupti nesciunt ipsa debitis vitae facere fugiat nemo.
                                        </p>
                                        <h6 class="mb-1">Jumlah :</h6>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a href={{ url('/checkout') }} class="btn btn-primary">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-2 col-md-6">
            <div class="card">
                <div class="card-content">
                    <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid" alt="singleminded">
                    <div class="card-body">
                        <h5 class="card-title">Nama Product</h5>
                        <h6 class="card text font-semibold mt-3 mb-1">
                            Stock : 123
                        </h6>
                        <h6 class="card text font-semibold mb-2">
                            Price : Rp. 123000
                        </h6>
                        <p class="card text mt-3 mb-1">
                            <a class="collapsed" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Description
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-2 col-md-6">
            <div class="card">
                <div class="card-content">
                    <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid" alt="singleminded">
                    <div class="card-body">
                        <h5 class="card-title">Nama Product</h5>
                        <h6 class="card text font-semibold mt-3 mb-1">
                            Stock : 123
                        </h6>
                        <h6 class="card text font-semibold mb-2">
                            Price : Rp. 123000
                        </h6>
                        <p class="card text mt-3 mb-1">
                            <a class="collapsed" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Description
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-2 col-md-6">
            <div class="card">
                <div class="card-content">
                    <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid" alt="singleminded">
                    <div class="card-body">
                        <h5 class="card-title">Nama Product</h5>
                        <h6 class="card text font-semibold mt-3 mb-1">
                            Stock : 123
                        </h6>
                        <h6 class="card text font-semibold mb-2">
                            Price : Rp. 123000
                        </h6>
                        <p class="card text mt-3 mb-1">
                            <a class="collapsed" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Description
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-2 col-md-6">
            <div class="card">
                <div class="card-content">
                    <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid" alt="singleminded">
                    <div class="card-body">
                        <h5 class="card-title">Nama Product</h5>
                        <h6 class="card text font-semibold mt-3 mb-1">
                            Stock : 123
                        </h6>
                        <h6 class="card text font-semibold mb-2">
                            Price : Rp. 123000
                        </h6>
                        <p class="card text mt-3 mb-1">
                            <a class="collapsed" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Description
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-2 col-md-6">
            <div class="card">
                <div class="card-content">
                    <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid" alt="singleminded">
                    <div class="card-body">
                        <h5 class="card-title">Nama Product</h5>
                        <h6 class="card text font-semibold mt-3 mb-1">
                            Stock : 123
                        </h6>
                        <h6 class="card text font-semibold mb-2">
                            Price : Rp. 123000
                        </h6>
                        <p class="card text mt-3 mb-1">
                            <a class="collapsed" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Description
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
