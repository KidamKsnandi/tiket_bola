@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('jadwal-pertandingan.index') }}">Jadwal Pertandingan</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('tiket.index', $id_jadwal) }}">Tiket</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Tiket</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Tiket - <b> {{ $jadwal->club1->nama }} VS {{ $jadwal->club2->nama }}
                            </b>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tiket.store', $id_jadwal) }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="nama_tiket">Nama Tiket:</label>
                                <input type="text" name="nama_tiket" id="nama_tiket" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tribun">Tribun:</label>
                                <select name="tribun" id="tribun" class="form-control" required>
                                    <option value="">-- Pilih Tribun --</option>
                                    <option value="Tribun Utara">Tribun Utara</option>
                                    <option value="Tribun Selatan">Tribun Selatan</option>
                                    <option value="Tribun Timur">Tribun Timur</option>
                                    <option value="Tribun Barat">Tribun Barat</option>
                                    <option value="VIP">VIP</option>
                                    <option value="VVIP">VVIP</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kuota">Kuota:</label>
                                <input type="number" name="kuota" id="kuota" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="harga">Harga:</label>
                                <input type="text" name="harga" id="rupiah" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        });
    </script>
@endsection
