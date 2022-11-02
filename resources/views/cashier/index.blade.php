@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Kasir</h3>
    </div>
    <div class="card shadow">
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-6 col-lg-8 col-md-6">
                    <a href='{{ url('/cashier/checkout') }}' class="btn btn-primary">
                        Cart
                        {{-- @foreach ($product_carts as $pc) --}}
                        <span class="badge bg-transparent">{{ $total_product_carts }}</span>
                        {{-- @endforeach --}}
                    </a>
                </div>
                <div class="col-6 col-lg-4 col-md-6 d-flex justify-content-end">
                    <form class="d-flex" action="#">
                        <input class="form-control me-2" id="search" name="search" placeholder="Search"
                            aria-label="Search">
                        {{-- <button class="btn btn-success" type="submit">Search</button> --}}

                        @foreach ($products as $product)
                                <a class="btn btn-success collapsed" href="#" data-bs-toggle="modal"
                                    data-bs-target="#kasirDescModal{{ $product->id }}">
                                    Cari
                                </a>
                        @endforeach
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
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <h6 class="card text font-semibold mt-3 mb-1">
                                        Stock : {{ $product->stock }} {{ $product->unit->unit }}
                                    </h6>
                                    <h6 class="card text font-semibold mb-2">
                                        Price : Rp. {{ $product->price }}/{{ $product->unit->unit }}
                                    </h6>
                                    <p class="card text mt-3 mb-1">
                                        <a class="collapsed" href="#" data-bs-toggle="modal"
                                            data-bs-target="#kasirDescModal{{ $product->id }}">
                                            Add to cart
                                        </a>
                                    </p>
                                    <div class="modal fade modal-borderless" id="kasirDescModal{{ $product->id }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title white" id="exampleModalLabel">Add to cart
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <img src={{ asset('storage/image/foto_product/' . $product->image) }}
                                                            width="290px;" alt="">
                                                    </div>
                                                    <h4 class="mt-3">
                                                        {{ $product->name }}
                                                    </h4>
                                                    <h6 class="font-semibold mt-4 mb-1">
                                                        Price :
                                                    </h6>
                                                    <h6 class="font-semibold mb-4">
                                                        Rp. {{ $product->price }}/{{$product->unit->unit}}
                                                    </h6>
                                                    <h6 class="font-semibold mt-4 mb-1">
                                                        Deskripsi :
                                                    </h6>
                                                    <p class="font-semibold mb-4">
                                                        {{ $product->description }}
                                                    </p>
                                                    <form action="{{ url('/transaction') }}" method="POST"
                                                        enctype="multipart/form-data" class="form form-horizontal">
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
                                                                    <select class="choices form-select" name="unit_id">>
                                                                        @foreach ($unit as $ut)
                                                                            <option value="{{ $ut->id }}">
                                                                                {{ $ut->unit }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" class="form-control"
                                                                    value="{{ $product->id }}" name="product_id">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                                </form>
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
                    url: "/cashier",
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
