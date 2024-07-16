@extends('layouts.user.index')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Detail Tiket Saya</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Detail Tiket Saya</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <style>
        .card-img-logo {
            max-height: 100px;
            object-fit: contain;
        }

        .badge-status {
            font-size: 0.9rem;
        }

        .ticket-info {
            margin-bottom: 15px;
        }
    </style>

    <div class="container">
        <h1 class="my-4 text-center">Detail Tiket</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $transaksi->tiket->nama_tiket }} ({{ $transaksi->tiket->tribun }})</h5>
                <div class="card-text d-flex flex-column flex-md-row justify-content-between">
                    <div class="ticket-info">
                        <p>
                            <strong>No. Invoice:</strong> {{ $transaksi->no_invoice }}<br>
                            <strong>Nama Pembeli:</strong> {{ $transaksi->nama }}<br>
                            <strong>Email Pembeli:</strong> {{ $transaksi->email }}<br>
                            <strong>No. Telepon Pembeli:</strong> {{ $transaksi->no_hp }}<br>
                            <strong>Pertandingan:</strong> {{ $transaksi->tiket->jadwal_pertandingan->club1->nama }} VS
                            {{ $transaksi->tiket->jadwal_pertandingan->club2->nama }}<br>
                            <strong>Stadion:</strong> {{ $transaksi->tiket->jadwal_pertandingan->stadion->nama }}<br>
                            <strong>Alamat Stadion:</strong>
                            {{ $transaksi->tiket->jadwal_pertandingan->stadion->alamat }}<br>
                            <strong>Tanggal Tanding:</strong>
                            {{ \Carbon\Carbon::parse($transaksi->tiket->jadwal_pertandingan->tanggal_tanding)->translatedFormat('d F Y \p\u\k\u\l H:i') }}<br>
                            <strong>Jumlah Tiket:</strong> {{ $transaksi->jumlah }}<br>
                            <strong>Status Tiket:</strong>
                            @if ($transaksi->status == 1)
                                <span class="badge badge-warning badge-status">Pending</span>
                            @elseif ($transaksi->status == 2)
                                <span class="badge badge-info badge-status">Diproses</span>
                            @elseif ($transaksi->status == 3)
                                <span class="badge badge-success badge-status">Berhasil</span>
                            @elseif ($transaksi->status == 4)
                                <span class="badge badge-danger badge-status">Gagal</span>
                            @endif
                        </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ $transaksi->tiket->jadwal_pertandingan->club1->logo() }}"
                            alt="{{ $transaksi->tiket->jadwal_pertandingan->club1->nama }}"
                            class="img-fluid card-img-logo mx-2">
                        <span class="mx-2">VS</span>
                        <img src="{{ $transaksi->tiket->jadwal_pertandingan->club2->logo() }}"
                            alt="{{ $transaksi->tiket->jadwal_pertandingan->club2->nama }}"
                            class="img-fluid card-img-logo mx-2">
                    </div>
                </div>
                <a href="/user/tiket-saya" class="btn btn-secondary mt-3">Kembali ke List Tiket Saya</a>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
