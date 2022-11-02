<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Plat No</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Sub_total</th>
            <th>Total</th>
            <!-- <th>Email</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            @foreach ($sale->invoices->transactions as $transaction)
                <tr>
                    <td>{{ $sale->invoices->customer->name }}</td>
                    <td>{{ $sale->invoices->customer->number_plat }}</td>
                    <td>{{ $transaction->product->name }}</td>
                    <td>{{ $transaction->quantity }} </td>
                    <td>{{ $transaction->unit->unit }} </td>
                    <td>{{ $transaction->sub_total }} </td>
                    <td>{{ $total }} </td>
                    {{-- <!-- <td>{{ $sale->email }}</td> --> --}}
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
