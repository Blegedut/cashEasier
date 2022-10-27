@extends('layouts.master')
@section('content')
    <div class="card">
        @foreach ($sales as $sale)
            <div class="card-header">
                {{-- @dd($invoice); --}}
                <p>{{ $sale->invoice->customer->name }}</p>
                <p>{{ $sale->invoice->customer->plat_number }}</p>
                <p>{{ $sale->invoice->customer->created_at }}</p>
            </div>
        @endforeach
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Price</th>
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
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-success rounded-pill">Export to excel</a>
            </div>
        </div>
    </div>
@endsection
