<!-- resources/views/emails/example.blade.php -->
<html>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            width: 80%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice td {
            border: 1px solid #000;
            padding: 10px;
        }

        .invoice th {
            background-color: #f0f0f0;
            border: 1px solid #000;
            padding: 10px;
        }
    </style>
    <h1>INVOICE ({{ $details['no_invoice'] }})</h1>
    <p>Hai {{ $details['nama'] }}, terima kasih sudah membeli tiket kami</p>
    <p>Harap segera lakukan pembayaran</p>

    <div class="invoice">
        <h2></h2>
        <table>
            <tr>
                <th>Tiket</th>
                <td>{{ $details['tiket'] }}</td>
            </tr>
            <tr>
                <th>Pertandingan</th>
                <td>{{ $details['pertandingan'] }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $details['jumlah'] }}</td>
            </tr>
            <tr>
                <th>total bayar</th>
                <td>{{ $details['total'] }}</td>
            </tr>
        </table>
    </div>
    <br>
    <a href="https://tiket-bola.digma.id/user/invoice/{{ $details['no_invoice'] }}">Klik disini untuk melakukan
        konfirmasi pembayaran</a>
</body>

</html>
