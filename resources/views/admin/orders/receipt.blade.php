<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pesanan #{{ $order->order_number }}</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; font-size: 12px; color: #333; margin: 0; padding: 10px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 1px dashed #333; padding-bottom: 10px; }
        .header h1 { font-size: 18px; margin: 0 0 5px 0; }
        .header p { margin: 0; font-size: 10px; }
        .info { margin-bottom: 15px; font-size: 11px; }
        .info table { width: 100%; }
        .info table td { padding: 2px 0; }
        .items { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .items th, .items td { text-align: left; padding: 5px 0; border-bottom: 1px dashed #eee; font-size: 11px; }
        .items th { border-bottom: 1px dashed #333; font-weight: bold; }
        .total-section { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .total-section td { padding: 5px 0; font-size: 12px; }
        .total-row { font-weight: bold; border-top: 1px dashed #333; }
        .footer { text-align: center; margin-top: 30px; font-size: 10px; border-top: 1px dashed #333; padding-top: 10px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laundry Cepat</h1>
        <p>Gang Nunyai No. 123, Kota Bandar Lampung</p>
        <p>Telp: 0812-3456-7890</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td><strong>No. Order</strong></td>
                <td>: #{{ $order->order_number }}</td>
            </tr>
            <tr>
                <td><strong>Pelanggan</strong></td>
                <td>: {{ $order->user->name ?? 'Pelanggan' }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal</strong></td>
                <td>: {{ $order->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <td><strong>Status Bayar</strong></td>
                <td>: {{ strtoupper($order->payment_status) }}</td>
            </tr>
        </table>
    </div>

    <table class="items">
        <thead>
            <tr>
                <th>Layanan</th>
                <th style="text-align: center;">Qty</th>
                <th style="text-align: right;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->detail as $item)
            <tr>
                <td>{{ $item->layanan->name ?? 'Layanan' }}</td>
                <td style="text-align: center;">{{ $item->jumlah }} {{ $item->layanan->unit_type ?? 'unit' }}</td>
                <td style="text-align: right;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="total-section">
        <tr class="total-row">
            <td style="text-align: right; width: 60%;"><strong>TOTAL</strong></td>
            <td style="text-align: right;"><strong>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div class="footer">
        <p>Terima kasih telah menggunakan layanan kami!</p>
        <p>-- Harap simpan struk ini sebagai bukti --</p>
    </div>

</body>
</html>