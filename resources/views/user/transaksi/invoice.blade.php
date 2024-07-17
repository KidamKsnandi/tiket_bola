@extends('layouts.user.index')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Invoice</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Invoice</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="text-danger" id="countdown" class="mb-4"></h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Nama Pembeli: {{ $transaksi->nama }}</h5>
                        <h5>Email: {{ $transaksi->email }}</h5>
                        <h5>No HP: {{ $transaksi->no_hp }}</h5>
                        <h5>Alamat: {{ $transaksi->alamat }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h5>Tiket yang Dibeli: {{ $transaksi->tiket->nama_tiket }} ({{ $transaksi->tiket->tribun }})</h5>
                        <h5>Pertandingan: {{ $transaksi->tiket->jadwal_pertandingan->club1->nama }} VS
                            {{ $transaksi->tiket->jadwal_pertandingan->club2->nama }}</h5>
                        <h5>Jumlah Tiket:
                            @for ($i = 1; $i <= $transaksi->jumlah; $i++)
                                <img src="{{ asset('images/tiket.png') }}" alt="" width="30px">
                            @endfor
                        </h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <img src="/images/banks/{{ $transaksi->bank->logo }}" alt="Logo Bank" class="img-fluid"
                            style="width: 100px;">
                    </div>
                    <div class="col-md-8">
                        <h5>Total Bayar: Rp. <span
                                id="total_bayar">{{ number_format($transaksi->total_bayar, 0, '', '.') }}</span></h5>
                        <h5>Mohon untuk transfer ke bank berikut:</h5>
                        <h5>Nama Bank: {{ $transaksi->bank->nama_bank }}</h5>
                        <h5>Atas Nama: {{ $transaksi->bank->atas_nama }}</h5>
                        <h5>No Rekening: {{ $transaksi->bank->no_rekening }}</h5>
                    </div>
                </div>
            </div>
            @if (now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') > $transaksi->countdown_date)
                <div class="alert alert-danger text-center">
                    <h5>Waktu pembayaran telah habis. Silakan lakukan transaksi ulang <a
                            href="/user/transaksi-tiket/{{ $transaksi->tiket->slug }}">Disini</a> atau <a
                            href="https://wa.me/6283807464449" class="btn btn-success" target="_blank">
                            Hubungi via WhatsApp
                        </a></h5>
                </div>
            @else
                <div class="card-body">
                    <form id="invoice-form" action="/user/invoice/{{ $transaksi->no_invoice }}/uploadBukti" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_transaksi" value="{{ $transaksi->id }}">
                        <div class="form-group mb-2">
                            <label for="no_invoice">No. Invoice</label>
                            <input type="text" class="form-control" id="no_invoice" value="{{ $transaksi->no_invoice }}"
                                readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="no_invoice">Nominal Yang Harus Dibayar</label>
                            <input type="text" class="form-control" id="no_invoice"
                                value="Rp. {{ number_format($transaksi->total_bayar, '0', '', '.') }}" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label>Upload Bukti Transfer</label>
                            <div class=" mb-3">
                                <input type="file" id="file" name="bukti_bayar"
                                    class=" @error('bukti_bayar') is-invalid @enderror" accept="image/*"
                                    onchange="tampilkanTambah(this,'ptambah')" required>
                            </div>
                            <img id="ptambah" src="" alt="" class="img-fluid rounded"
                                style="width: 200px" />
                            @error('bukti_bayar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <br>
    <br>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the date we're counting down to
            var countDownDate = new Date("{{ $transaksi->countdown_date }}").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="countdown"
                document.getElementById("countdown").innerHTML = hours + "h " +
                    minutes + "m " + seconds + "s ";

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "Waktu pembayaran sudah habis";

                }
            }, 1000);
        });
    </script>

    <script>
        // Tambah the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    <script>
        function tampilkanTambah(gambar, idpreview) {
            var gb = gambar.files;
            for (var i = 0; i < gb.length; i++) {
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var ptambah = document.getElementById(idpreview);
                var reader = new FileReader();

                if (gbPreview.type.match(imageType)) {
                    ptambah.fileTambah = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(ptambah);
                    reader.readAsDataURL(gbPreview);
                } else {
                    alert("file yang anda upload tidak sesuai. Khusus mengunakan image.");
                }

            }
        }
    </script>
@endsection
