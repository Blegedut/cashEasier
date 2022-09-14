@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <p>"Customer Name"</p>
            <p>"Date"</p>
        </div>
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
                    <tr>
                        <td>1</td>
                        <td>Shell Helix HX-5</td>
                        <td>1</td>
                        <td>gln</td>
                        <td>
                            100.000
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>wiper</td>
                        <td>1</td>
                        <td>pcs</td>
                        <td>
                            50.000
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>kanebo</td>
                        <td>1</td>
                        <td>pcs</td>
                        <td>
                            10.000
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
