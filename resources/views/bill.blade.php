<!doctype html>
<html lang="en">

<body>
    <table class="w-full">
        ...
        @foreach ($data['bill'] as $bill)
            <h2>Invoice ID: {{ $bill->id_bill }}</h2>
        @endforeach
        ...
    </table>

    <div class="margin-top">
        <table class="w-full">
            ...
            @foreach ($data['order'] as $order)
                <div>{{ $order->name }}</div>
            @endforeach
            ...
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Nama Pemesan</th>
                <th>Tanggal Order</th>
                <th>Nama Menu</th>
                <th>Kuantitas</th>
                <th>No Meja</th>
                <th>Metode Pembayaran</th>
            </tr>
            @foreach ($data['order'] as $item)
                <!-- Assuming items are accessible like this -->
                <tr class="items">
                    <td>{{ $item->nama_pemesan }}</td>
                    <td>{{ $item->tgl_order }}</td>
                    <td>{{ $item->menu->nama }}</td>  
                    <td>{{ $item->kuantitas }}</td>
                    <td>{{ $item->no_meja }}</td>
                    <td>{{ $item->metode_pembayaran }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        @foreach ($data['bill'] as $bill)
        <div class='wifi'>

            Pass Wifi:  {{ $bill->pass_wifi }}
        </div>
            
        @endforeach
    </div>
    @foreach ($data['order'] as $order)
            <div class="total">
                Total: {{ $order->total_harga }} Rupiah
            </div>
    @endforeach
</body>

</html>
