@extends('layouts.user.index')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Tiket Pertandingan Bola</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/jadwal-tiket">Tiket</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Best Seller -->
    <div class="container">
        @if ($jadwal != '[]')
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    @foreach ($jadwal as $item)
                        @if (now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') < $item->tanggal_tanding)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <div class="col-6 col-md-5 d-flex justify-content-center">
                                            <img class="img-fluid" style="max-width: 100px;"
                                                src="{{ $item->club1->logo() }}" alt="">
                                        </div>
                                        <div
                                            class="col-12 col-md-2 d-flex align-items-center justify-content-center my-2 my-md-0">
                                            <h2>VS</h2>
                                        </div>
                                        <div class="col-6 col-md-5 d-flex justify-content-center">
                                            <img class="img-fluid" style="max-width: 100px;"
                                                src="{{ $item->club2->logo() }}" alt="">
                                        </div>
                                    </div>

                                    <div class="product-details">
                                        <h6>{{ $item->keterangan }} - {{ $item->club1->nama }} VS {{ $item->club2->nama }}
                                        </h6>
                                        <div class="price">
                                            <h6>Stadion {{ $item->stadion->nama }} ({{ $item->stadion->alamat }})</h6>
                                            {{-- <h6 class="l-through">Rp.300.00o</h6> --}}
                                        </div>
                                        <div class="mt-4">
                                            <h6>{{ \Carbon\Carbon::parse($item->tanggal_tanding)->translatedFormat('d F Y \p\u\k\u\l H:i') }}
                                            </h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="/jadwal-tiket/{{ $item->slug }}/tiket" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">Lihat Detail</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @else
            <h3 class="mt-3">
                <div class="text-center alert alert-danger">Tiket Pertandingan tidak ditemukan!</div>
            </h3>
        @endif
    </div>
    <!-- End Best Seller -->
@endsection
