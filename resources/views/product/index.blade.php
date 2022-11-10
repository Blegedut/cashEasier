@extends('layouts.master')
{{-- https://www.youtube.com/watch?v=fxyf29q2Orw --}}
@section('content')
    {{-- MODAL ADD --}}
    <div class="modal fade modal-borderless" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="exampleModalLabel">Add New Product</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/product/store') }}" method="POST" enctype="multipart/form-data"
                        class="form form-horizontal">
                        @csrf
                        <div class="form-body">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>Product Name</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Product Name"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label>Category</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <select class="choices form-select" name="category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Unit</label>
                                </div>
                                <div class="col-md-5 mb-3 form-group">
                                    <input type="number" class="form-control" name="qty" placeholder="size" required>
                                </div>
                                <div class="col-md-3 mb-3 form-group">
                                    <select class="choices form-select" name="unit">>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Product photo</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input class="form-control" name="image" type="file" id="formFile">
                                </div>
                                <div class="col-md-4">
                                    <label>Stock</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="number" class="form-control" name="stock" placeholder="Stock" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" name="price" placeholder="Price" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <textarea class="form-control" name="description" placeholder="Desc" rows="3" required></textarea>
                                </div>
                                <div class="col-sm-12 mt-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" onclick="return submitProduct();">Submit</button>
                                    <button type="button" class="btn btn-secondary  me-1 mb-1"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL ADD --}}

    {{-- MODAL DELETE --}}
    @foreach ($products as $product)
        <div class="modal fade" id="modalDelete{{ $product->id }}" tabindex="-1" aria-labelledby="modalHapusBarang"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="exampleModalLabel">Delete</h5>
                    </div>
                    <div class="modal-body">
                        <i class="fas fa-exclamation-circle mb-2"
                            style="color: #e74a3b; font-size:120px; justify-content:center; display:flex"></i>
                        <h5 class="text-center">Apakah anda yakin ingin menghapus {{ $product->name }} ?</h5>
                    </div>
                    <div class="modal-footer">
                        <form action={{ url('/product/delete/' . $product->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" onclick="return deleteProduct();">Iya, Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- MODAL DELETE --}}

    <div class="page-heading">
        <h3>Product</h3>
    </div>
    <div class="card shadow">
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-6 col-lg-8 col-md-6">
                    <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal"
                        data-bs-target="#modalAdd"><i class="bi bi-plus"></i><span> Tambah Produk </span></button>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <form class="d-flex" style="align-items: flex-end" role="search">
                        <input class="form-control me-2" id="search" name="search" type="search"
                            placeholder="Search" aria-label="Search">
                        {{-- <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button> --}}
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="mycard row">
                @foreach ($products as $product)
                    <div class="col-6 col-lg-2 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-content">
                                <img src={{ asset('storage/image/foto_product/' . $product->image) }} style="height:15rem"
                                    class="card-img-top img-fluid" alt="{{ $product->image }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{Str::limit( $product->name, 16)}}</h5>
                                    <h6 class="card text font-semibold mt-3 mb-1">
                                        Stock : {{ $product->stock }} {{ $product->unit->unit }}
                                    </h6>
                                    <h6 class="card text font-semibold mb-2">
                                        Price : Rp{{ $product->price }}/{{ $product->unit->unit }}
                                    </h6>
                                    <p class="card text mt-3 mb-1">
                                        <a class="collapsed" href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $product->id }}">
                                            Description
                                        </a>
                                    </p>
                                    <div class="modal fade modal-borderless" id="exampleModal{{ $product->id }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div
                                            class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title white" id="exampleModalLabel">Description</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <img src={{ asset('storage/image/foto_product/' . $product->image) }}
                                                            width="290px;" height="290px" alt="">
                                                    </div>
                                                    <div class="row mt-5">
                                                        <h4 class="col-7">
                                                            {{ $product->name }}
                                                        </h4>
                                                        <h5 class="col-5 d-flex justify-content-end">
                                                            Rp{{ $product->price }}/{{ $product->unit->unit }}
                                                        </h5>
                                                    </div>
                                                    <h6 class="font-bold mt-4 mb-1">
                                                        Category
                                                    </h6>
                                                    <h6 class="font-semibold mb-4">
                                                        {{ $product->category->category }}
                                                    </h6>
                                                    <h6 class="font-bold mt-2 mb-1">
                                                        Stock
                                                    </h6>
                                                    <h6 class="font-semibold mb-4">
                                                        {{ $product->stock }} {{ $product->unit->unit }}
                                                    </h6>
                                                    <h6 class="font-bold mt-2 mb-1">
                                                        Deskripsi
                                                    </h6>
                                                    <p class="font-semibold mb-4">
                                                        {{ $product->description }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalDelete{{ $product->id }}">Delete</button>
                                                    <a href='{{ url('/product/show/' . $product->id) }}'
                                                        class="btn btn-primary">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val();
                // console.log(value);
                $.ajax({
                    type: "get",
                    url: "/product",
                    data: {
                        'search': value
                    },
                    success: function(data) {
                        // console.log(data);
                        $('.mycard').html(data);
                    }
                });
            });
        });
    </script>
@endsection
