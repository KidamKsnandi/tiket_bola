<html>

<body>
    <h1>INVOICE ({{ $details['no_invoice'] }})</h1>
    <p>Hai {{ $details['nama'] }}, Selamat transaksi anda di terima</p>
    <br>

    <a href="https://tiket-bola.digma.id/user/tiket-saya/{{ $details['no_invoice'] }}/{{ $details['slug'] }}">Lihat Tiket
        Saya</a>
</body>

</html>
