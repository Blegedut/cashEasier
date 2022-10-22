@extends('layouts.master')
{{-- https://www.youtube.com/watch?v=fxyf29q2Orw --}}
@section('content')
    {{-- MODAL ADD --}}
    <div class="modal fade modal-borderless" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        @foreach ($category as $ct)
                                            <option value="{{ $ct->id }}">{{ $ct->category }}</option>
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
                                        @foreach ($unit as $ut)
                                            <option value="{{ $ut->id }}">{{ $ut->unit }}</option>
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
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="button" class="btn btn-secondary  me-1 mb-1"
                                        data-bs-dismiss="modal">Close</button>
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
    @foreach ($category as $ct)
        @foreach ($ct->products as $pd)
            <div class="modal fade" id="modalDelete{{ $pd->id }}" tabindex="-1" aria-labelledby="modalHapusBarang"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <i class="fas fa-exclamation-circle mb-2"
                                style="color: #e74a3b; font-size:120px; justify-content:center; display:flex"></i>
                            <h5 class="text-center">Apakah anda yakin ingin menghapus {{ $pd->name }} ?</h5>
                        </div>
                        <div class="modal-footer">
                            <form action={{ url('/product/delete/' . $pd->id) }} method="POST">
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
                        data-bs-target="#modalAdd">+
                        Add Item</button>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <form class="d-flex" style="align-items: flex-end" role="search">
                        <input class="form-control me-2" id="search" name="search" type="search"
                            placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="mycard row">
                @foreach ($category as $ct)
                    @foreach ($ct->products as $pd)
                        <div class="col-6 col-lg-2 col-md-6">
                            <div class="card shadow-sm">
                                <div class="card-content">
                                    <img src={{ asset('storage/image/foto_product/' . $pd->image) }} style="height:15rem"
                                        class="card-img-top img-fluid" alt="{{ $pd->image }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $pd->name }}</h5>
                                        <h6 class="card text font-semibold mt-3 mb-1">
                                            Stock : {{ $pd->stock }}
                                        </h6>
                                        <h6 class="card text font-semibold mb-2">
                                            Price : Rp. {{ $pd->price }}
                                        </h6>
                                        <p class="card text mt-3 mb-1">
                                            <a class="collapsed" href="#" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $pd->id }}">
                                                Description
                                            </a>
                                        </p>
                                        <div class="modal fade modal-borderless" id="exampleModal{{ $pd->id }}"
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
                                                            <img src={{ asset('storage/image/foto_product/' . $pd->image) }}
                                                                width="290px;" height="290px" alt="">
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h4 class="mt-5">
                                                                {{ $pd->name }}
                                                            </h4>
                                                            <h5 class="mt-5">
                                                                Rp. {{ $pd->price }}
                                                            </h5>
                                                        </div>
                                                        <h6 class="font-bold mt-4 mb-1">
                                                            Category
                                                        </h6>
                                                        <h6 class="font-semibold mb-4">
                                                            {{ $ct->category }}
                                                        </h6>
                                                        <h6 class="font-bold mt-2 mb-1">
                                                            Stock
                                                        </h6>
                                                        <h6 class="font-semibold mb-4">
                                                            {{ $pd->stock }}
                                                        </h6>
                                                        <h6 class="font-bold mt-2 mb-1">
                                                            Deskripsi
                                                        </h6>
                                                        <p class="font-semibold mb-4">
                                                            {{ $pd->description }}
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDelete{{ $pd->id }}">Delete</button>
                                                        <a href='{{ url('/product/show/' . $pd->id) }}'
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
