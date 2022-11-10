<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}"> --}}

</head>


<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 8pt;
        }
    </style>

    {{-- <style type="text/css">
        /* body {
                -webkit-column-count: 4 !important;
                column-count: 4 !important;
            } */

            .row {
                --bs-gutter-x: 1.5rem !important;
                --bs-gutter-y: 0 !important;
                display: flex !important;
                flex-wrap: wrap !important;
                margin-left: calc(var(--bs-gutter-x)*-.5) !important;
                margin-right: calc(var(--bs-gutter-x)*-.5) !important;
                margin-top: calc(var(--bs-gutter-y)*-1) !important
            }

            .row>* {
                flex-shrink: 0 !important;
                margin-top: var(--bs-gutter-y) !important;
                max-width: 100% !important; 
                padding-left: calc(var(--bs-gutter-x)*.5) !important;
                padding-right: calc(var(--bs-gutter-x)*.5) !important;
                width: 100% !important
            }

            .col {
                flex: 1 0 0% !important
            }

            .row-cols-auto>* {
                flex: 0 0 auto !important;
                width: auto !important
            }

            .row-cols-1>* {
                flex: 0 0 auto !important;
                width: 100% !important
            }

            .row-cols-2>* {
                flex: 0 0 auto !important;
                width: 50% !important
            }

            .row-cols-3>* {
                flex: 0 0 auto !important;
                width: 33.3333333333% !important
            }

            .row-cols-4>* {
                flex: 0 0 auto !important;
                width: 25% !important
            }

            .row-cols-5>* {
                flex: 0 0 auto !important;
                width: 20% !important
            }

            .row-cols-6>* {
                flex: 0 0 auto !important;
                width: 16.6666666667% !important
            }

            .col-1 {
                flex: 0 0 auto !important;
                width: 8.33333333% !important
            }

            .col-2 {
                flex: 0 0 auto !important;
                width: 16.66666667% !important
            }

            .col-3 {
                flex: 0 0 auto !important;
                width: 25% !important
            }

            .col-4 {
                flex: 0 0 auto !important;
                width: 33.33333333% !important
            }

            .col-5 {
                flex: 0 0 auto !important;
                width: 41.66666667% !important
            }

            .col-6 {
                flex: 0 0 auto !important;
                width: 50% !important
            }

            .col-7 {
                flex: 0 0 auto !important;
                width: 58.33333333% !important
            }

            .col-8 {
                flex: 0 0 auto !important;
                width: 66.66666667% !important
            }

            .col-9 {
                flex: 0 0 auto !important;
                width: 75% !important
            }

            .col-10 {
                flex: 0 0 auto !important;
                width: 83.33333333% !important
            }

            .col-11 {
                flex: 0 0 auto !important;
                width: 91.66666667% !important
            }

            .col-12 {
                flex: 0 0 auto !important;
                width: 100% !important
            }
    </style> --}}

    {{-- <div class="row">
        <div class="col-6 col-6">TEST</div>
        <div class="col-6">RUT: </b>TEST</div>
    </div>
    <div class="row">
        <div class="col-4 col-4">TEST</div>
        <div class="col-4 col-4">TEST</div>
        <div class="col-4">TEST</div>
    </div> --}}
    <table class="table table-borderless table-sm">
        <thead>
            @foreach ($sales as $sale)
                <tr>
                    <td>
                        <img src="assets/images/logo/logo.png" alt="" class="mt-2" style="height: 50px">
                    </td>
                    <td class="w-100">
                        <b>
                            <h5 class="mb-1 text-primary"> PRIMA MANDIRI SERVICE </h5>
                        </b>
                        <p> Jl. Lebak Bulus Raya No. 134 Cilandak - Jakarta Selatan <br> Phone : (021) 7668272,
                            0878.7558.2282 </p>
                    </td>
                    <td></td>
                    <td class="w-25">
                        <h6>{{ $sale->invoice->customer->name }}</h6>
                        <p>Jenis Mobil <br> Plat Nomor <br> Mekanik <br> Tanggal</p>
                    </td>
                    <td class="w-50">
                        <h5 class="text-white">---</h5>
                        <p>: {{ $sale->invoice->customer->type_car }} <br> : {{ $sale->invoice->customer->plat_number }}
                            <br> : {{ $sale->invoice->mechanic }} <br> :
                            {{ $sale->invoice->customer->created_at->format('d/m/Y') }}
                        </p>
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
    <center class="mb-2">
        <h5>FAKTUR PENJUALAN</h5>
    </center>

    <table class="table table-bordered table-sm" id="table1">
        <thead>
            <tr class="table-secondary">
                <th>Id</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                @foreach ($sale->invoice->transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="w-50">{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->quantity }} {{ $transaction->unit->unit }}</td>
                        <td>{{ $transaction->product->price }}</td>
                        <td>{{ $transaction->sub_total }}</td>
                    </tr>
                @endforeach
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
    <table class="table table-borderless table-sm">
        <thead>
            <tr>
                <td>
                    <h6>Transafer ke Rekening<h6>
                            <h6> BCA : 6080355511 </h6>
                            <p>a/n. Ruhyat Maulana</p>
                </td>
                <td>Hormat Kami</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><b> Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan, kecuali ada perjanjian sebelumnya </b></td>
            </tr>
        </thead>
    </table>
</body>


</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script src="assets/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script> --}}
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"> -->
