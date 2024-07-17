@extends('layouts.user.index')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-4 text-center">Checkout Tiket <b>{{ $tiket->nama_tiket }} ({{ $tiket->tribun }})</b></h2>
                <h3 class="mb-4 text-center">{{ $tiket->jadwal_pertandingan->club1->nama }} VS
                    {{ $tiket->jadwal_pertandingan->club2->nama }}</h3>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>Kuota Tersisa:</strong> {{ $tiket->kuota }}</p>
                        <p><strong>Jadwal Tanding:</strong>
                            {{ \Carbon\Carbon::parse($tiket->jadwal_pertandingan->tanggal_tanding)->translatedFormat('d F Y \p\u\k\u\l H:i') }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Stadion:</strong> {{ $tiket->jadwal_pertandingan->stadion->nama }}</p>
                        <p><strong>Alamat Stadion:</strong> {{ $tiket->jadwal_pertandingan->stadion->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form id="nabungForm" action="/user/transaksi-tiket/{{ $tiket->slug }}/checkout" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ old('nama', Auth::user()->name) }}" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email"
                            value="{{ old('email', Auth::user()->email) }}" name="email" placeholder="Masukkan email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp"
                            value="{{ old('no_hp') }}" placeholder="Masukkan no HP" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                        <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket"
                            value="{{ old('jumlah_tiket') }}" placeholder="Masukkan jumlah tiket" required>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control" id="rupiah"
                                value="{{ number_format($tiket->harga, 0, '.', '.') }}" onkeyup="totalBayar()"
                                placeholder="Masukkan nominal" required>
                            <input type="hidden" name="nominal" id="nominal">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kodeUnik" class="form-label">Kode Unik</label>
                        <input type="text" name="kode_unik" class="form-control" id="kodeUnik" readonly
                            value="{{ old('kode_unik') }}">
                        <i class="" style="font-size: 15px">*Kode unik untuk memudahkan pengecekan transfer </i>
                    </div>
                    <div class="mb-3">
                        <label for="bank" class="form-label">Transfer ke Rekening</label>
                        <div>
                            @foreach ($bank as $key => $item)
                                <div class="form-check bank-option">
                                    <input class="form-check-input" type="radio" name="bank"
                                        id="bank{{ $key }}" value="{{ $item->id }}" required
                                        @checked(old('bank') == $item->id)>
                                    <label class="form-check-label" for="bank{{ $key }}">
                                        <div class="bank-details">
                                            <img src="{{ $item->logo() }}" alt="Logo {{ $item->nama_bank }}">
                                            <div>
                                                <strong>{{ $item->nama_bank }} a.n {{ $item->atas_nama }}</strong><br>
                                                No. Rekening: {{ $item->no_rekening }}
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            <!-- Tambahkan lebih banyak pilihan bank sesuai kebutuhan -->
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div id="viewTotal" style="display: none">
                            <h2>Total :
                                <span id="totalPembayaran"></span>
                            </h2>
                        </div>
                        <button type="submit" class="primary-btn">Beli Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Format rupiah
            var rupiah = document.getElementById("rupiah");
            rupiah.addEventListener("keyup", function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, "Rp. ");
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, "").toString(),
                    split = number_string.split(","),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? "." : "";
                    rupiah += separator + ribuan.join(".");
                }

                rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                return prefix == undefined ? rupiah : rupiah ? rupiah : "";
            }

            // Kode unik
            const kodeUnikInput = document.getElementById('kodeUnik');
            const kodeUnik = Math.floor(100 + Math.random() * 900);
            kodeUnikInput.value = kodeUnik;

            let nominalUtama = '{{ $tiket->harga }}'
            nominalUtama = nominalUtama.replace(/\./g, '');
            console.log('nominalUtama', nominalUtama)
            const total = parseInt(nominalUtama) + parseInt(kodeUnik)
            document.getElementById('viewTotal').style.display = "block"
            document.getElementById('totalPembayaran').innerHTML = rp(total)
            document.getElementById('nominal').value = total
        });


        function totalBayar() {
            let nominal = document.getElementById('rupiah').value
            nominal = nominal.replace(/\./g, '');
            let kodeUnik = document.getElementById('kodeUnik').value;
            console.log('nominal', nominal)
            const total = parseInt(nominal) + parseInt(kodeUnik)
            document.getElementById('viewTotal').style.display = "block"
            document.getElementById('totalPembayaran').innerHTML = rp(total)
            document.getElementById('nominal').value = total
        }

        function rp(angka) {
            var number_string = angka.toString(),
                split = number_string.split("."),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/g);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                rupiah += "." + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return "Rp" + rupiah;
        }
    </script>

    <style>
        .bank-option img {
            width: 50px;
            height: auto;
        }

        .bank-option .bank-details {
            display: flex;
            align-items: center;
        }

        .bank-option .bank-details div {
            margin-left: 10px;
        }
    </style>
@endsection
