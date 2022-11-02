@extends('layouts.master')
@section('content')
    <div class="card">
        @foreach ($sales as $sale)
            <div class="card-header">
                <div class="row">
                    <div class="col-7">
                        {{-- @dd($invoice); --}}
                        <h4>{{ $sale->invoice->customer->name }}</h4>
                        <div class="row mb-0">
                            <div class="col-2">
                                <p>Jenis Mobil</p>
                            </div>
                            <div class="col-5">
                                <p>: {{ $sale->invoice->customer->type_car }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p>Plat Nomor</p>
                            </div>
                            <div class="col-10">
                                <p>: {{ $sale->invoice->customer->plat_number }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p>Mekanik</p>
                            </div>
                            <div class="col-10">
                                <p>: {{ $sale->invoice->mechanic }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <p>Tanggal</p>
                            </div>
                            <div class="col-10">
                                <p>: {{ $sale->invoice->customer->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <img src="" alt="logo bengkel">
                        <h3>PRIMA MANDIRI SERVICE</h3>
                        <P class="mb-0">Jl. Lebak Bulus Raya No. 134 Cilandak - Jakarta Selatan</P>
                        <P>Phone : (021) 7668272, 0878.7558.2282</P>
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        @foreach ($sale->invoice->transactions as $transaction)
                            <tr>
                                {{-- @dd($transaction); --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->product->name }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>{{ $transaction->unit->unit }}</td>
                                <td>{{ $transaction->sub_total }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @if ($sale->invoice->extra->service != null)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Jasa</td>
                                <td>{{ $sale->invoice->extra->service }}</td>
                            </tr>
                        @endif
                        @if ($sale->invoice->extra->steam != null)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Steam</td>
                                <td>{{ $sale->invoice->extra->steam }}</td>
                            </tr>
                        @endif
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="table-info">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td class="text-success">{{ $total }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- @dd($sales) --}}
            @foreach ($sales as $sale)
                <div class="d-flex justify-content-end">
                    <a href={{ url('/report/invoice/pdf/' . $sale->id) }} class="btn btn-danger rounded-pill">Print PDF</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
