@extends('layouts.user.index')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Tiket Saya</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Tiket Saya</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <div class="container">
        <h1 class="my-4 text-center">List Tiket</h1>
        <div class="row">
            @foreach ($transaksi as $transaksi)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Tiket {{ $transaksi->tiket->nama_tiket }}
                                ({{ $transaksi->tiket->tribun }})
                            </h5>
                            <p class="card-text">
                                <strong>Pertandingan:</strong> {{ $transaksi->tiket->jadwal_pertandingan->club1->nama }} VS
                                {{ $transaksi->tiket->jadwal_pertandingan->club2->nama }}<br>
                                <strong>Stadion:</strong> {{ $transaksi->tiket->jadwal_pertandingan->stadion->nama }} -
                                {{ $transaksi->tiket->jadwal_pertandingan->stadion->alamat }}<br>
                                <strong>Tanggal Tanding:</strong>
                                {{ \Carbon\Carbon::parse($transaksi->tiket->jadwal_pertandingan->tanggal_tanding)->translatedFormat('d F Y \p\u\k\u\l H:i') }}<br>
                                <strong>Jumlah:</strong> {{ $transaksi->jumlah }}<br>
                                <strong>Status:</strong>
                                @if ($transaksi->status == 1)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($transaksi->status == 2)
                                    <span class="badge badge-info">Diproses</span>
                                @elseif ($transaksi->status == 3)
                                    <span class="badge badge-success">Berhasil</span>
                                @elseif ($transaksi->status == 4)
                                    <span class="badge badge-danger">Gagal</span>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            @if ($transaksi->status == 1)
                                @if (now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') > $transaksi->countdown_date)
                                    <a href="/user/invoice/{{ $transaksi->no_invoice }}"
                                        class="btn btn-danger w-100">Konfirmasi
                                        Pembayaran <br> (Waktu pembayaran telah habis!)
                                    </a>
                                @else
                                    <a href="/user/invoice/{{ $transaksi->no_invoice }}"
                                        class="btn btn-success w-100">Konfirmasi
                                        Pembayaran
                                    </a>
                                @endif
                            @elseif ($transaksi->status == 2)
                                <button class="btn btn-info w-100 ">Sedang Diproses</button>
                            @elseif ($transaksi->status == 3)
                                <a href="/user/tiket-saya/{{ $transaksi->no_invoice }}/{{ $transaksi->tiket->slug }}"
                                    class="btn btn-primary w-100">Detail Tiket</a>
                            @elseif ($transaksi->status == 4)
                                <button class="btn btn-danger w-100">Ditolak</button>
                                <p>pesan dari admin : {{ $transaksi->keterangan ?? '-' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
