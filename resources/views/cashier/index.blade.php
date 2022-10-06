@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Kasir</h3>
    </div>
    <div class="card shadow">
        {{-- <div class="card-header">
            <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#modalAdd">+
                Add Product</button>
        </div> --}}
        <div class="card-body">
            <div class="row">
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
                                                data-bs-target="#kasirDescModal{{ $pd->id }}">
                                                Detail
                                            </a>
                                        </p>
                                        <div class="modal fade modal-borderless" id="kasirDescModal{{ $pd->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
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
                                                        <h4 class="mt-3">
                                                            {{ $pd->name }}
                                                        </h4>
                                                        <h6 class="font-semibold mt-4 mb-1">
                                                            Price :
                                                        </h6>
                                                        <h6 class="font-semibold mb-4">
                                                            Rp. {{ $pd->price }}
                                                        </h6>
                                                        <h6 class="font-semibold mt-4 mb-1">
                                                            Deskripsi :
                                                        </h6>
                                                        <p class="font-semibold mb-4">
                                                            {{ $pd->description }}
                                                        </p>
                                                        <form action="#" method="POST" enctype="multipart/form-data"
                                                            class="form form-horizontal">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-21">
                                                                        <h6 class="mb-1">Jumlah :</h6>
                                                                        <input type="number" class="form-control"
                                                                            name="quantity">
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-21">
                                                                        <h6 class="mb-1">Unit :</h6>
                                                                        <select class="choices form-select" name="unit">>
                                                                            @foreach ($unit as $ut)
                                                                                <option value="{{ $ut->id }}">
                                                                                    {{ $ut->unit }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>
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
@endsection
