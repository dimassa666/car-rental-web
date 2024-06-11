@extends('layout/aplikasi')

@section('konten')
    <x-mainnavbar></x-mainnavbar>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('main/images/bg_3.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Car Details <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread text-uppercase">{{ $kendaraan->merk }} {{ $kendaraan->tipe }}</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded"
                            style="background-image: url('{{ asset('storage/' . $kendaraan->foto) }}');">
                        </div>
                        <div class="text text-center">
                            <span class="subheading">{{ $kendaraan->merk }}</span>
                            <h2 class="text-uppercase">{{ $kendaraan->tipe }}</h2>
                            <p class="text-uppercase">{{ $kendaraan->kategori }} | {{ $kendaraan->jenis }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Transmisi
                                        <span class="text-capitalize">{{ $kendaraan->transmisi }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-car"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Tahun Produksi
                                        <span>{{ $kendaraan->tahun_produksi }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-handshake"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Harga Sewa
                                        <span>Rp{{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}/hari</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-rent"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Status
                                        <span class="text-capitalize">{{ $kendaraan->status }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <a href="/pesanan/buat/{{ $kendaraan->kendaraan_id }}" class="btn btn-primary btn-lg">
                        <h3 class="text-white mx-1 my-1">
                            PESAN SEKARANG!
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Pilih kendaraan</span>
                    <h2 class="mb-2">Kendaraan Terkait</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedCars as $car)
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end"
                                style="background-image: url('{{ asset('storage/' . $car->foto) }}');">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="/car-single/{{ $car->id }}"
                                        class="text-uppercase">{{ $car->merk }}
                                        {{ $car->tipe }}</a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat text-capitalize">{{ $car->merk }}</span>
                                    <p class="price ml-auto">Rp{{ number_format($car->harga_sewa, 0, ',', '.') }}
                                        <span>/hari</span>
                                    </p>
                                </div>
                                <p class="d-flex mb-0 d-block"><a href="/pesanan/{{ $car->kendaraan_id }}"
                                        class="btn btn-primary py-2 mr-1">Pesan!</a> <a
                                        href="/kendaraan/{{ $car->kendaraan_id }}"
                                        class="btn btn-secondary py-2 ml-1">Detail</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
