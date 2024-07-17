@extends('layouts.admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> Admin </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['admin'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/pengguna">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-users fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> User (Konsumen) </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['user'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/pengguna">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-primary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-users fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> Banner </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['banner'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/banner">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-layers-intersect fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> Stadion </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['stadion'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/stadion">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-tree fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> Club </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['club'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/club">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-info rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-article fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> Jadwal Pertandingan </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['jadwal'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/jadwal-pertandingan">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-primary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-alert-circle fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> Tiket </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['tiket'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/jadwal-pertandingan">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-dark rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-credit-card fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold"> Transaksi </h5>
                                <h4 class="fw-semibold mb-3">{{ $jumlah['transaksi'] }}</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <a href="/admin/transaksi">Lihat detail</a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-currency-dollar fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
