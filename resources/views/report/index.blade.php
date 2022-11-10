@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Pemasukan</h3>
    </div>
    <div class="card">
        <div class="card-header">
            {{-- <a href={{ url('export/sales') }} class="btn btn-success rounded-pill">Export to excel</a>
            <a href="#" class="btn btn-danger rounded-pill">Export to pdf</a> --}}
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Plat Nomor</th>
                        <th>Tipe Mobil</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            {{-- @dd($invoice); --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->invoices->customer->name }}</td>
                            <td>{{ $sale->invoices->customer->plat_number }}</td>
                            <td>{{ $sale->invoices->customer->type_car }}</td>
                            <td>{{ $sale->invoices->customer->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a class="btn btn-info" href={{ url('report/detail/' . $sale->id) }}>Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
