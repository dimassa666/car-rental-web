@extends('layout/aplikasi')

@section('konten')

    <x-mainnavbar></x-mainnavbar>
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('main/images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Cepat &amp; Mudah Sewa Mobil</h1>
                        <p style="font-size: 18px;">"Temukan Mobilitas yang Tak Tertandingi dengan Penawaran Terbaik Kami!
                            <br>Pesan Sekarang dan Nikmati Perjalanan Anda dengan Kendaraan Impian Anda."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form method="GET" action="{{ route('kendaraan') }}"
                                class="request-form ftco-animate bg-primary">
                                <h2>Sesuaikan Kendaraan</h2>
                                <div class="form-group">
                                    <label for="" class="label">Merk mobil</label>
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Inova, Alphard, Fortuner, dll.">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_mobil" class="label">Jenis mobil</label>
                                    <select name="jenis" class="form-control" id="jenis_mobil">
                                        <option value="">Jenis</option>
                                        <option class="text-dark" value="suv"
                                            {{ request('jenis') == 'suv' ? 'selected' : '' }}>SUV
                                        </option>
                                        <option class="text-dark" value="mpv"
                                            {{ request('jenis') == 'mpv' ? 'selected' : '' }}>MPV
                                        </option>
                                        <option class="text-dark" value="sedan"
                                            {{ request('jenis') == 'sedan' ? 'selected' : '' }}>Sedan
                                        </option>
                                        <option class="text-dark" value="sport"
                                            {{ request('jenis') == 'sport' ? 'selected' : '' }}>Sport
                                        </option>
                                        <option class="text-dark" value="convertible"
                                            {{ request('jenis') == 'convertible' ? 'selected' : '' }}>Convertible</option>
                                        <option class="text-dark" value="elektrik"
                                            {{ request('jenis') == 'elektrik' ? 'selected' : '' }}>
                                            Elektrik</option>
                                        <option class="text-dark" value="lcgc"
                                            {{ request('jenis') == 'lcgc' ? 'selected' : '' }}>LCGC
                                        </option>
                                        <option class="text-dark" value="minibus"
                                            {{ request('jenis') == 'minibus' ? 'selected' : '' }}>
                                            Minibus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_mobil" class="label">Transmisi</label>
                                    <select name="transmisi" class="form-control" id="jenis_mobil">
                                        <option value="">Jenis</option>
                                        <option class="text-dark" value="otomatis"
                                            {{ request('transmisi') == 'otomatis' ? 'selected' : '' }}>Otomatis
                                        </option>
                                        <option class="text-dark" value="manual"
                                            {{ request('transmisi') == 'manual' ? 'selected' : '' }}>Manual
                                        </option>
                                    </select>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Harga Min</label>
                                        <input type="text" class="form-control" name="harga_min"
                                            placeholder="Harga Terendah">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Harga Max</label>
                                        <input type="text" class="form-control" name="harga_max"
                                            placeholder="Harga Tertinggi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Cari" class="btn btn-secondary py-3 px-4">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">Pilihan Terbaik untuk Menyewa Mobil Impian Anda</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Temukan Penawaran Terbaik</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pesan Mobil Pilihan Anda</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Tentukan Lokasi Penjemputan Anda</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><a href="/kendaraan" class="btn btn-primary py-3 px-4">Lihat Daftar Kendaraan</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Penawaran Untuk Anda</span>
                    <h2 class="mb-2">"Kendaraan Unggulan"</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($limaKendaraan as $item)
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url({{ asset('storage/' . $item->foto) }});">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="/kendaraan/{{ $item->kendaraan_id }}"
                                                class="text-uppercase">{{ $item->tipe . ' ' . $item->tahun_produksi }}</a>
                                        </h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat text-capitalize">{{ $item->merk }}</span>
                                            <p class="price ml-auto">
                                                Rp{{ number_format($item->harga_sewa, 0, ',', '.') }}
                                                <span>/hari</span>
                                            </p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="/kendaraan/{{ $item->kendaraan_id }}"
                                                class="btn btn-secondary py-2 mr-1">Detail</a>
                                            <a href="/pesanan/buat/{{ $item->kendaraan_id }}"
                                                class="btn btn-primary py-2 ml-1">Pesan</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url(main/images/about.jpg);">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">Tentang LuckyRental</span>
                        <h2 class="mb-4">Selamat Datang Di LuckyRental</h2>

                        <p>Sejak didirikan pada tahun 2024, LuckyRental telah tumbuh menjadi pilihan terkemuka dalam layanan
                            penyewaan mobil di Indonesia. Dengan layanan yang terpercaya dan berkomitmen untuk memenuhi
                            kebutuhan pelanggan, kami telah melayani ribuan pelanggan yang puas dari berbagai latar belakang
                            dan keperluan. Kami menyediakan beragam kendaraan berkualitas tinggi yang siap mengantarkan Anda
                            ke destinasi Anda dengan nyaman dan aman.</p>
                        <p><a href="/about" class="btn btn-secondary py-3 px-4">Selengkapnya</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Kepuasan Pelanggan</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Saya sangat puas dengan layanan LuckyRental. Armada mobil yang
                                        mereka
                                        miliki sangat lengkap dan dalam kondisi prima. Proses pemesanan juga sangat mudah
                                        dan transparan. Sangat direkomendasikan!".</p>
                                    <p class="name">Robin Venorta</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_2.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4"> "LuckyRental memberikan pengalaman penyewaan mobil yang
                                        menyenangkan.
                                        Harga yang ditawarkan sangat kompetitif, dan staf mereka sangat ramah dan membantu.
                                        Mobil yang saya sewa dalam kondisi bersih dan nyaman. Saya pasti akan menggunakan
                                        layanan mereka lagi di masa mendatang."</p>
                                    <p class="name">Jenni Aurellia</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_3.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Saya baru pertama kali menggunakan layanan penyewaan mobil, dan saya
                                        sangat senang dengan LuckyRental. Prosesnya cepat dan tanpa hambatan. Mobil yang
                                        saya
                                        sewa dalam kondisi prima dan pengembalian juga sangat mudah. Terima kasih banyak!"
                                    </p>
                                    <p class="name">Alexander Nathanael</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(main/images/person_4.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">"Pengalaman saya menggunakan LuckyRental sangat memuaskan. Staf
                                        mereka
                                        sangat profesional dan membantu, dan armada mobil yang mereka miliki dalam kondisi
                                        prima. Proses pengembalian juga sangat cepat dan mudah. Saya akan merekomendasikan
                                        LuckyRental kepada teman dan keluarga saya."</p>
                                    <p class="name">Piter Bourgh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="17">0</strong>
                            <span>Tahun <br>Pengalaman</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="{{ $totalKendaraan }}">0</strong>
                            <span>Total <br>Kendaraan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="2543">0</strong>
                            <span>Kepuasan <br>Pelanggan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="3">0</strong>
                            <span>Total <br>Cabang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-mainfooter></x-mainfooter>
@endsection
