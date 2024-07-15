@extends('layouts.user.index')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Detail Tiket Pertandingan <br> {{ $jadwal->club1->nama }} VS {{ $jadwal->club2->nama }}</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/jadwal-tiket">Tiket<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Detail Tiket</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-12">
                    <div class="single-prd-item">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-6 col-md-5 d-flex justify-content-center">
                                <img class="img-fluid" style="max-width: 100px;" src="{{ $jadwal->club1->logo() }}"
                                    alt="">

                            </div>
                            <div class="col-12 col-md-2 d-flex align-items-center justify-content-center my-2 my-md-0">
                                <h2>VS</h2>
                            </div>
                            <div class="col-6 col-md-5 d-flex justify-content-center">
                                <img class="img-fluid" style="max-width: 100px;" src="{{ $jadwal->club2->logo() }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 ">
                    <div class="s_product_text">
                        <h1>{{ $jadwal->keterangan }} - {{ $jadwal->club1->nama }} VS {{ $jadwal->club2->nama }}</h1>

                        <ul class="list">
                            <li><a class="active" href="#"><span>Stadion</span> : {{ $jadwal->stadion->nama }}</a>
                            </li>
                            <li><a href="#"><span>Alamat</span> : {{ $jadwal->stadion->alamat }}</a></li>
                        </ul>

                        <h2 class="mt-4 text-center animate-grow-shrink">
                            {{ \Carbon\Carbon::parse($jadwal->tanggal_tanding)->translatedFormat('d F Y \p\u\k\u\l H:i') }}
                        </h2>
                        <style>
                            .animate-grow-shrink {
                                animation: growShrink 2s infinite;
                            }

                            @keyframes growShrink {

                                0%,
                                100% {
                                    transform: scale(1);
                                }

                                50% {
                                    transform: scale(1.2);
                                }
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <br>
    <hr>
    <br>
    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h3>Daftar Tiket Yang Tersedia di Pertandingan {{ $jadwal->club1->nama }} VS
                            {{ $jadwal->club2->nama }}</h3>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($tiket as $item)
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="/user/transaksi-tiket/{{ $item->slug }}"><img
                                            src="{{ asset('images/tiket.png') }}" alt="" width="100px"></a>
                                    <div class="desc">
                                        <a href="/user/transaksi-tiket/{{ $item->slug }}"
                                            class="title">{{ $item->nama_tiket }} <b>({{ $item->tribun }})</b></a>
                                        <div>
                                            <h6>Tersisa {{ $item->kuota }} Tiket</h6>
                                        </div>
                                        <div class="price">
                                            <h4>Rp{{ number_format($item->harga, 0, '', '.') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->
@endsection
