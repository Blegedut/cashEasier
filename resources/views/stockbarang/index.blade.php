@extends('layouts.master')

@section('content')
    {{-- ADD MODAL --}}
    <div class="modal fade modal-borderless" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
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
                                    <label>Product Name</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" name="fname" placeholder="Product Name">
                                </div>
                                <div class="col-md-4">
                                    <label>Category</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <select class="choices form-select">
                                        <option value="accessories">Accessories</option>
                                        <option value="lubricant">Lubricant</option>
                                        <option value="rombo">Rombo</option>
                                        <option value="romboid">Romboid</option>
                                        <option value="trapeze">Trapeze</option>
                                        <option value="traible">Triangle</option>
                                        <option value="polygon">Polygon</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Product photo</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="col-md-4">
                                    <label>Stock</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="number" class="form-control" name="contact" placeholder="Stock">
                                </div>
                                <div class="col-md-4">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" name="password" placeholder="Price">
                                </div>
                                <div class="col-md-4">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text-area" class="form-control" name="password" placeholder="Desc">
                                </div>
                                <div class="col-sm-12 mt-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- ADD MODAL --}}

    {{-- EDIT MODAL --}}
    <div class="modal fade modal-borderless" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <label>Product Name</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" name="fname" placeholder="Product Name">
                                </div>
                                <div class="col-md-4">
                                    <label>Category</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <select class="choices form-select">
                                        <option value="accessories">Accessories</option>
                                        <option value="lubricant">Lubricant</option>
                                        <option value="rombo">Rombo</option>
                                        <option value="romboid">Romboid</option>
                                        <option value="trapeze">Trapeze</option>
                                        <option value="traible">Triangle</option>
                                        <option value="polygon">Polygon</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Product photo</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="col-md-4">
                                    <label>Stock</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="number" class="form-control" name="contact" placeholder="Stock">
                                </div>
                                <div class="col-md-4">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" name="password" placeholder="Price">
                                </div>
                                <div class="col-md-4">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text-area" class="form-control" name="password" placeholder="Desc">
                                </div>
                                <div class="col-sm-12 mt-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- EDIT MODAL --}}

    <div class="page-heading">
        <h3>Product</h3>
    </div>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">+ Add Product</button>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 col-lg-2 col-md-6">
                    <div class="card">
                        <div class="card-content">
                            <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Nama Product</h5>
                                <h6 class="card text font-semibold mt-3 mb-1">
                                    Stock : 123
                                </h6>
                                <h6 class="card text font-semibold mb-2">
                                    Price : Rp. 123000
                                </h6>
                                <p class="card text mt-3 mb-1">
                                    <a class="collapsed" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Description
                                    </a>
                                </p>
                                <div class="modal fade modal-borderless" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <img src="assets/images/samples/helix-hx5.jpeg" width="290px;"
                                                        alt="">
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="mt-5">
                                                        Nama produk
                                                    </h4>
                                                    <h5 class="mt-5">
                                                        Rp. 123.000
                                                    </h5>
                                                </div>
                                                <h6 class="font-bold mt-4 mb-1">
                                                    Category
                                                </h6>
                                                <h6 class="font-semibold mb-4">
                                                    Lubricant
                                                </h6>
                                                <h6 class="font-bold mt-2 mb-1">
                                                    Stock
                                                </h6>
                                                <h6 class="font-semibold mb-4">
                                                    123
                                                </h6>
                                                <h6 class="font-bold mt-2 mb-1">
                                                    Deskripsi
                                                </h6>
                                                <p class="font-semibold mb-4">
                                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor incidunt
                                                    ullam,
                                                    a aut rerum exercitationem esse sit quibusdam consectetur ipsam
                                                    doloremque
                                                    dolore corrupti nesciunt ipsa debitis vitae facere fugiat nemo.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit">Edit</button>
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
                            <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Nama Product</h5>
                                <h6 class="card text font-semibold mt-3 mb-1">
                                    Stock : 123
                                </h6>
                                <h6 class="card text font-semibold mb-2">
                                    Price : Rp. 123000
                                </h6>
                                <p class="card text mt-3 mb-1">
                                    <a class="collapsed" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
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
                            <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Nama Product</h5>
                                <h6 class="card text font-semibold mt-3 mb-1">
                                    Stock : 123
                                </h6>
                                <h6 class="card text font-semibold mb-2">
                                    Price : Rp. 123000
                                </h6>
                                <p class="card text mt-3 mb-1">
                                    <a class="collapsed" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
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
                            <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Nama Product</h5>
                                <h6 class="card text font-semibold mt-3 mb-1">
                                    Stock : 123
                                </h6>
                                <h6 class="card text font-semibold mb-2">
                                    Price : Rp. 123000
                                </h6>
                                <p class="card text mt-3 mb-1">
                                    <a class="collapsed" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
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
                            <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Nama Product</h5>
                                <h6 class="card text font-semibold mt-3 mb-1">
                                    Stock : 123
                                </h6>
                                <h6 class="card text font-semibold mb-2">
                                    Price : Rp. 123000
                                </h6>
                                <p class="card text mt-3 mb-1">
                                    <a class="collapsed" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
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
                            <img src="assets/images/samples/helix-hx5.jpeg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Nama Product</h5>
                                <h6 class="card text font-semibold mt-3 mb-1">
                                    Stock : 123
                                </h6>
                                <h6 class="card text font-semibold mb-2">
                                    Price : Rp. 123000
                                </h6>
                                <p class="card text mt-3 mb-1">
                                    <a class="collapsed" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Description
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
