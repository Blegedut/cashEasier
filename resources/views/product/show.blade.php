@extends('layouts.master')
{{-- https://www.youtube.com/watch?v=fxyf29q2Orw --}}
@section('content')
    <div class="page-heading">
        <h3>Edit Product</h3>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <img src={{ asset('storage/image/foto_product/' . $product->image) }} class="img-fluid"
                                        width="290px;" height="290px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-9 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('product/update/' . $product->id) }}" method="POST"
                                    enctype="multipart/form-data" class="form form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label>Product Name</label>
                                            </div>
                                            <div class="col-md-8 mb-3 form-group">
                                                <input type="text" class="form-control" value="{{ $product->name }}"
                                                    name="name" placeholder="Product Name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Category</label>
                                            </div>
                                            <div class="col-md-8 mb-3 form-group">
                                                <select class="choices form-select" name="category" required>
                                                    {{-- @foreach ($category as $ct) --}}
                                                    <option value="{{ $product->category->id }}" selected>
                                                        {{ $product->category->category }}</option>
                                                    {{-- @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Unit</label>
                                            </div>
                                            <div class="col-md-5 mb-3 form-group">
                                                <input type="number" class="form-control" value="{{ $product->quantity }}"
                                                    name="qty" placeholder="size" required>
                                            </div>
                                            <div class="col-md-3 mb-3 form-group">
                                                <select class="choices form-select" name="unit">>
                                                    {{-- @foreach ($unit as $ut) --}}
                                                        <option value="{{ $product->unit->id }}" selected>
                                                            {{ $product->unit->unit }}</option>
                                                    {{-- @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Product photo</label>
                                            </div>
                                            <div class="col-md-8 mb-3 form-group">
                                                <input class="form-control" name="image" value="{{ $product->image }}"
                                                    type="file" id="formFile">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Stock</label>
                                            </div>
                                            <div class="col-md-8 mb-3 form-group">
                                                <input type="number" class="form-control" value="{{ $product->stock }}"
                                                    name="stock" placeholder="Stock" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8 mb-3 form-group">
                                                <input type="text" class="form-control" value="{{ $product->price }}"
                                                    name="price" placeholder="Price" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 mb-3 form-group">
                                                <input class="form-control" value="{{ $product->description }}"
                                                    name="description" placeholder="Desc" rows="3" required>
                                            </div>
                                            <div class="col-sm-12 mt-4 d-flex justify-content-end">
                                                <a href='{{ url('/product') }}'
                                                    class="btn btn-secondary me-1 mb-1">Kembali</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1" onclick="return editProduct();">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
