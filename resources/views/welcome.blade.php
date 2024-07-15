@extends('layouts.user.index ')

@section('content')
    <div class="">
        <section class="banner-area">
            <div class="container">
                <div class="row fullscreen align-items-center justify-content-start">
                    <div class="col-lg-12">
                        <div class="active-banner-slider owl-carousel">
                            <!-- single-slide -->
                            <div class="row single-slide align-items-center d-flex">
                                <div class="col-lg-5 col-md-6">
                                    <div class="banner-content">
                                        <h1>Banner <br>Tiket Bola 1</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="banner-img">
                                        <img class="img-fluid" src="{{ asset('assets/user/img/banner/banner-bola.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- single-slide -->
                            <div class="row single-slide align-items-center d-flex">
                                <div class="col-lg-5">
                                    <div class="banner-content">
                                        <h1>Banner <br>Tiket Bola 2</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        {{-- <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div> --}}
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="banner-img">
                                        <img class="img-fluid" src="{{ asset('assets/user/img/banner/banner-bola.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- start product Area -->
        <section class="owl-carousel section_gap">
            <!-- single product slide -->
            <div class="single-product-slider">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <div class="section-title">
                                <h1>Tiket Pertandingan Bola</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($jadwal as $item)
                            <div class="col-lg-3 col-md-6">
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
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
        <!-- end product Area -->

    </div>
@endsection
